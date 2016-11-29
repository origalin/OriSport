<?php

/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/11/28
 * Time: 22:21
 */
class RaceGenerator extends ViewGenerator
{
    private $id;
    function __construct($level,$id)
    {
        parent::__construct($level);
        $this->id = $id;
    }
    function generateDeleteZone(){
        $resultTb = array();
        $resultTb[LEVEL_USER] = '';
        $resultTb[LEVEL_OWNER] = '<a href="/race/delete/'.$this->id.'"><button class="btn btn-sm btn-danger pull-right" >删除比赛</button></a>';
        return $this->getResult($resultTb);
    }
}