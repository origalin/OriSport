<?php

/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/11/10
 * Time: 20:13
 */
class ActivityOfClub extends Table
{
    function __construct()
    {
        parent::__construct("activityofclub");
    }
    function getActivities($clubs){
        $clubsToIn = implode(',',$clubs);
        $sql = sprintf("select * from activityofclub WHERE clubid in (%s) ORDER BY time DESC LIMIT 20",$clubsToIn);
        return $this->query($sql);
    }
}