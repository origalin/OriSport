<?php

/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/10/28
 * Time: 16:57
 */
class Controller
{
    protected $_controller;
    protected $_action;
    protected $_view;
    protected $needRender = false;

    // 构造函数，初始化属性，并实例化对应模型
    function __construct($controller, $action)
    {
        $this->_controller = $controller;
        $this->_action = $action;
        $this->_view = new View($controller, $action);
        //$this->checkLogin();
    }

    // 分配变量
    function assign($name, $value)
    {
        $this->_view->assign($name, $value);
    }
    //设置是否渲染
    function needRender($need){
        $this->needRender=$need;
    }
    //设置是否验证登录
    function checkLogin(){
        if($_SESSION['username']==null){
            @header("location:/errors/nologin");
        }
    }

    // 渲染视图
    function __destruct()
    {
        if($this->needRender){
            $this->_view->render();
        }

    }
}