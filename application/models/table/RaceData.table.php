<?php

/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/11/2
 * Time: 21:06
 */
class RaceData extends Table
{
    function __construct()
    {
        parent::__construct("racedata");
    }

    function getMyJoinRace($uid){
        $sql = sprintf("select * from racedata WHERE id in (SELECT raceid FROM userinrace WHERE uid = '%s')",$uid);
        return $this->query($sql);
    }
    function getRaceBycCondition($data){
        $page = 1;
        $where = 'where';
        if(array_key_exists('page',$data)){
            $page = $data['page'];
            unset($data['page']);
        }
        if(count($data)==0){
            $where = '';
        }
        $sql = sprintf("select * from racedata %s %s LIMIT %d,%d",$where,$this->formatWhere($data),($page-1)*20,$page*20);
        return $this->query($sql);
    }
}