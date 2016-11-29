<?php

/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/11/29
 * Time: 18:03
 */
class PeopleGenerator extends ViewGenerator
{
    function __construct($level)
    {
        parent::__construct($level);
    }
    function generateButton(){
        $resultTb = array();
        $resultTb[LEVEL_USER] = '<p><button class="btn btn-sm btn-success " onclick="watchHim()">关注用户</button></p>';
        $resultTb[LEVEL_INSIDER] = '<p><button class="btn btn-sm btn-danger" onclick="unWatch()">删除关注</button></p>';
        $resultTb[LEVEL_OWNER] = '';
        $resultTb[LEVEL_MANAGER] = '<p><button class="btn btn-sm btn-danger" onclick="deleteUser()">删除用户</button></p>';
        return $this->getResult($resultTb);
    }
}