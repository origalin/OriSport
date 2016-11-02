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

    function updateUserData($data);

    function getAccessPrivilege($controller,$action,$value);
}