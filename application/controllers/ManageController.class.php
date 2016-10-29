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
        $this->needRender(true);
    }
    function race_manage(){
        $this->needRender(true);
    }
    function club_manage(){
        $this->needRender(true);
    }
}