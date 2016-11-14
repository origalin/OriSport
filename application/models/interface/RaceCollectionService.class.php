<?php

/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/11/1
 * Time: 15:13
 */
interface RaceCollectionService
{
    function getRaceList($condition);
    function createRace($data);
    function getUserRace($uid);
    function getRaceNum($uid);
    function getRaceReward($uid);
}