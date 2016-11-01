<?php

/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/10/31
 * Time: 15:35
 */
class UserCollection implements UserCollectionService
{

    function loginVerify($username, $password)
    {
        // TODO: Implement loginVerify() method.
        $account = new Account();
        $result = $account->find('username',$username);
        if(sizeof($result)>0&&$result[0]["password"]==$password){
            return true;
        }else{
            return false;
        }

    }

    function registration($username, $password)
    {
        // TODO: Implement registration() method.
    }

    function getUserData()
    {
        // TODO: Implement getUserData() method.
    }

    function updateUserData($userDataPo)
    {
        // TODO: Implement updateUserData() method.
    }

    function getAccessPrivilege()
    {
        // TODO: Implement getAccessPrivilege() method.
    }

    function searchUsers($key)
    {
        // TODO: Implement searchUsers() method.
    }
}