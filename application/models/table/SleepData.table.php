<?php

/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/11/2
 * Time: 21:11
 */
class SleepData extends Table
{
    function __construct()
    {
        parent::__construct("sleepdata");
    }
    function getLastDataOfUser($uid){
        $sql = sprintf("select * from sleepdata WHERE uid = '%s' ORDER BY date DESC LIMIT 0,1",$uid);
        $result = $this->query($sql);
        if(count($result)==0){
            return array('id'=>'','uid'=>'','date'=>'','length'=>'','level'=>'','deeplength'=>'');
        }else{
            return $result[0];
        }
    }
    function getLastSleep($uid){
        $sql = sprintf("select * from sleepdata WHERE uid = '%s' ORDER BY date DESC LIMIT 0,1",$uid);
        return $this->query($sql)[0];
    }
    function getSleepOfWeek($uid){
        $sql = sprintf("select * from sleepdata WHERE uid = '%s' AND date > '%s' AND length <> 0",$uid,date(FORMAT_DATE,strtotime('-7 day')));
        return $this->query($sql);
    }
    function find($name, $value , $page=1)
    {
        $results = $this->db->query("select * from " . $this->tableName . " where ".$name." =  '" . $value. "' and length <> 0 ORDER by date DESC LIMIT 0,".$page*100);
        return array_reverse($this->generateResult($results));
    }
}