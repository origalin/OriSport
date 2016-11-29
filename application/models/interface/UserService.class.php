<?php

/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/11/1
 * Time: 15:11
 */
interface UserService
{
    function getUserData();

    function getSportTrack();

    function getSleepData();

    function getSportData();

    function updateUserData($data);

    function getAccessPrivilege($controller, $action, $value);

    function upLoadRingData($data);

    function getHealthData();

    function watchHim($uid);

    function unWatch($uid);
}