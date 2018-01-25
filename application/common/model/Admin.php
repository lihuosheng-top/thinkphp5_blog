<?php
/**
 * Created by PhpStorm.
 * User: huosheng
 * Date: 2018/1/23
 * Time: 17:59
 */
namespace app\common\model;
use  think\Model;
use think\Loader;

class Admin extends Model
{
    protected $pk = "admin_id";//声明主键
    protected $table = "blog_admin";//注意这里需要写完整的就是要带前缀的

    public function login($data)
    {

//        halt($data);
        //1.执行验证,模型处理
        $volidate =Loader::validate('Admin');
        //如果验证不通过
        if(!$volidate->check($data))
        {
//            dump($volidate->getError());
            return ['valid'=>0,'msg'=>$volidate->getError()];
        }
        //2.对比用户名和密码是否正确

        $userInfo = $this->where('admin_username',$data['admin_username'])->where('admin_password',$data['admin_password'])->find();

//        halt($userInfo);
        if(!$userInfo)
        {
            //说明在数据库未匹配到相关的数据
            return ['valid'=>0,'msg'=>'用户或者密码不正确'];
        }

        //3.将用户信息存入到session中
            session('admin.admin_id',$userInfo['admin_id']);
        session('admin.admin_username',$userInfo['admin_username']);
        return ['valid'=>1,'msg'=>'登录成功'];
    }
}
