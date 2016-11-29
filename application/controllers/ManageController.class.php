<?php

/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/10/29
 * Time: 15:22
 */
class ManageController extends Controller
{
    function user_manage(){
        $this->assign('title','用户管理');
        $this->needRender(true);
    }
    function race_manage(){
        $this->assign('title','比赛管理');
        $this->needRender(true);
    }
    function club_manage(){
        $this->assign('title','俱乐部管理');
        $this->needRender(true);
    }
}