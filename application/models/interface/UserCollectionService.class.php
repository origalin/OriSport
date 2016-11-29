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

    function registration($username, $password,$height,$weight,$step_length,$time);

    function searchUsers($key);

    function deleteUser($uid);
}