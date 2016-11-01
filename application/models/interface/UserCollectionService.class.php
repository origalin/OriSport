<?php

/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/10/31
 * Time: 16:03
 */
interface UserCollectionService
{
    function loginVerify($username, $password);

    function registration($username, $password);

    function getUserData();

    function updateUserData($userDataPo);

    function getAccessPrivilege();

    function searchUsers($key);
}