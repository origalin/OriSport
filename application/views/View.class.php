<?php

/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/10/28
 * Time: 16:59
 */
class View
{
    protected $variables = array();
    protected $_controller;
    protected $_action;

    function __construct($controller, $action)
    {
        $this->_controller = $controller;
        $this->_action = $action;
    }

    /** 分配变量 **/
    function assign($name, $value)
    {
        $this->variables[$name] = $value;
    }

    /** 渲染显示 **/
    function render()
    {
        extract($this->variables);
        $defaultHeader = appRoot.'/application/views/header.php';
        $controllerHeader = appRoot.'/application/views/' . $this->_controller . '/header.php';
        $controllerCss = appRoot.'/application/views/' . $this->_controller . '/css.php';
        $defaultNavbar = appRoot.'/application/views/navbar.php';
        $controllerNavbar = appRoot.'/application/views/' . $this->_controller . '/navbar.php';
        $controllerAside =appRoot.'/application/views/' . $this->_controller . '/aside.php';
        $controllerJs =appRoot.'/application/views/' . $this->_controller . '/js.php';
        $defaultFooter = appRoot.'/application/views/footer.php';
        $controllerFooter = appRoot.'/application/views/' . $this->_controller . '/footer.php';
        // 页头文件
        if (file_exists($controllerHeader)) {
            include ($controllerHeader);
        } else {
            include $defaultHeader;
        }
        //css
        if (file_exists($controllerCss)) {
            include ($controllerCss);
        }
        //导航条
        if (file_exists($controllerNavbar)) {
            include ($controllerNavbar);
        } else {
            include ($defaultNavbar);
        }
        //侧边栏
        if (file_exists($controllerAside)) {
            include ($controllerAside);
        }

        // 页内容文件
        include (appRoot.'/application/views/' . $this->_controller . '/' . $this->_action . '.php');

        // 页脚文件
        if (file_exists($controllerFooter)) {
            include ($controllerFooter);
        } else {
            include ($defaultFooter);
        }
        //js
        if (file_exists($controllerJs)) {
            include ($controllerJs);
        }
        //结尾
        include (appRoot.'/application/views/tail.php');
    }
}