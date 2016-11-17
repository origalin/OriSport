<?php
/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/10/28
 * Time: 15:38
 */
define('appRoot',$_SERVER['DOCUMENT_ROOT']);
include appRoot."/config/config.php";
include appRoot."/config/privilege.php";
include appRoot."/config/words.php";
function loadClass($class)
{
    $frameworks = $class . '.class.php';
    $controllers = 'application/controllers/' . $class . '.class.php';
    $models = 'application/models/' . $class . '.class.php';
    $tables = 'application/models/table/' . $class . '.table.php';
    $interfaces = 'application/models/interface/' . $class . '.class.php';
    $views = 'application/views/' . $class . '.class.php';
    if (file_exists($frameworks)) {
        // 加载框架核心类
        include $frameworks;
    }elseif (file_exists($views)){
        include $views;
    }elseif (file_exists($controllers)) {
        // 加载应用控制器类
        include $controllers;
    } elseif (file_exists($models)) {
        //加载应用模型类
        include $models;
    }elseif (file_exists($tables)) {
        //加载表格类
        include $tables;
    }elseif (file_exists($interfaces)) {
        //加载接口类
        include $interfaces;
    } else {
        /* 错误代码 */
    }
}
function route()
{
    $controllerName = 'sign';
    $action = 'login';

    if (!empty($_GET['url'])) {
        $url = $_GET['url'];
        $urlArray = explode('/', $url);
        // 获取控制器名
        $controllerName = $urlArray[0];

        // 获取动作名
        array_shift($urlArray);
        $action = empty($urlArray[0]) ? 'index' : $urlArray[0];

        //获取URL参数
        array_shift($urlArray);
        $queryString = empty($urlArray) ? array() : $urlArray;
    }

    // 数据为空的处理
    $queryString  = empty($queryString) ? array() : $queryString;

    // 实例化控制器
    $controller = ucfirst($controllerName ). 'Controller';
    $dispatch = new $controller($controllerName, $action);
    // 如果控制器存和动作存在，这调用并传入URL参数
    if ((int)method_exists($controller, $action)) {
        call_user_func_array(array($dispatch, $action), array($queryString));
    } else {
        exit($controller . "控制器不存在");
    }
}
spl_autoload_register("loadClass");
session_start();
route();