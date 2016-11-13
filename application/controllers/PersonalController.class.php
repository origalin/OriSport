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
        $this->assign('sportData',$user->getSportData());
    }
    function sleep_analyse(){
        $this->needRender(true);
        $user = new User($_SESSION['id']);
        $this->assign('sleepData',$user->getSleepData());
    }
    function sport_track(){
        $this->needRender(true);
        $user = new User($_SESSION['id']);
        $this->assign('sportTrack',$user->getSportTrack());
    }
    function health_manage(){
        $this->needRender(true);
        $user = new User($_SESSION['id']);
        $this->assign('healthData',$user->getHealthData());
    }
}