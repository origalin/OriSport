<?php

/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/10/29
 * Time: 14:28
 */
class PersonalController extends Controller
{
    function sport_data(){
        $this->needRender(true);
        $user = new User($_SESSION['id']);
        $this->assign('title','运动汇总');
        $this->assign('sportData',$user->getSportData());
    }
    function sleep_analyse(){
        $this->needRender(true);
        $user = new User($_SESSION['id']);
        $this->assign('title','睡眠分析');
        $this->assign('sleepData',$user->getSleepData());
    }
    function sport_track(){
        $this->needRender(true);
        $user = new User($_SESSION['id']);
        $this->assign('title','运动追踪');
        $this->assign('sportTrack',$user->getSportTrack());
    }
    function health_manage(){
        $this->needRender(true);
        $user = new User($_SESSION['id']);
        $this->assign('title','健康评分');
        $this->assign('healthData',$user->getHealthData());
    }
}