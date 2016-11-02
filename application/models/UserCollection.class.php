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
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $result[0]['id'];
            return true;
        }else{
            return false;
        }

    }

    function registration($username, $password, $height,$weight,$step_length,$day)
    {
        // TODO: Implement registration() method.
        $accountTb = new Account();
        $userdataTb = new UserData();
        $newAc = array();
        $newAc["username"]=$username;
        $newAc["password"]=$password;
        $accountTb->insert($newAc);
        $account = $accountTb->find("username",$username)[0];
        $newUd = array();
        $newUd["id"] = $account["id"];
        $newUd['username'] = $username;
        $newUd['height'] = $height;
        $newUd['weight'] = $weight;
        $newUd['step_length'] = $step_length;
        $newUd['creatday'] = $day;
        $userdataTb->insert($newUd);
    }

    function searchUsers($key)
    {
        // TODO: Implement searchUsers() method.
    }

}