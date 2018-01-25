<?php
/**
 * Created by PhpStorm.
 * User: huosheng
 * Date: 2018/1/23
 * Time: 16:45
 */
namespace  app\admin\controller;


class Entry extends Common
{
    //后台首页
    public function index()
    {

        //加载文档文件
        return $this->fetch();
    }
}