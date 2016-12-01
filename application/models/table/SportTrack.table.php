<?php

/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/11/2
 * Time: 21:11
 */
class SportTrack extends Table
{
    function __construct()
    {
        parent::__construct("sporttrack");
    }
    function getLastDataOfUser($uid){
        $sql = sprintf("select * from sporttrack WHERE uid = '%s' ORDER BY time DESC LIMIT 0,1",$uid);
        return $this->query($sql)[0];
    }
    function getTrackOfWeek($uid){
        $sql = sprintf("select * from sporttrack WHERE uid = '%s' AND time > '%s' AND length <> 0",$uid,date(FORMAT_TIME,strtotime('-7 day')));
        return $this->query($sql);
    }
    function find($name, $value , $page=1)
    {
        $results = $this->db->query("select * from " . $this->tableName . " where ".$name." =  '" . $value. "' and length <> 0 ORDER by time DESC LIMIT 0,".$page*20);
        return $this->generateResult($results);
    }
}