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
        $sql = sprintf("select * from racedata WHERE id in (SELECT raceid FROM userinrace WHERE uid = '%s')",RACE_ENDED,$uid);
        return $this->query($sql);
    }
}