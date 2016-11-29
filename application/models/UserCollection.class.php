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
        $userTb = new UserData();
        $result = $account->find('username',$username);
        $portrait = $userTb->findById($result[0]['id'])['portrait'];
        if(sizeof($result)>0&&$result[0]["password"]==$password){
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $result[0]['id'];
            $_SESSION['portrait'] = $portrait;
            if($result[0]["role"]=='manager'){
                $_SESSION['role']='manager';
            }else{
                $_SESSION['role']='user';
            }
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
        $newUd['createday'] = $day;
        $userdataTb->insert($newUd);

        $sportdataTb = new SportData();
        $newsd = array();
        $newsd['uid'] = $account['id'];
        $newsd['totalsteps'] = 0;
        $newsd['totaldistance'] = 0;
        $newsd['calorie'] = 0;
        $sportdataTb->insert($newsd);

        $sleepdataTb = new SleepData();
        $newsld = array();
        $newsld['uid'] = $account['id'];
        $newsld['date'] = '1970-01-01';
        $newsld['length'] = 0;
        $newsld['level'] = 0;
        $newsld['deeplength'] = 0;
        $sleepdataTb->insert($newsld);

        $_SESSION['username'] = $username;
        $_SESSION['id'] = $account['id'];
        $this->loginVerify($username,$password);
    }

    function searchUsers($key)
    {
        // TODO: Implement searchUsers() method.
        $userDataTb = new UserData();
        $users = $userDataTb->search('username',$key);
        $results = array();
        foreach ($users as $value){
            $user = array();
            $user['id'] = $value['id'];
            $user['username'] = $value['username'];
            $user['portrait'] = $value['portrait'];
            $user['createday'] = $value['createday'];
            $user['point'] = $value['point'];
            $results[]=$user;
        }
        return $results;
    }

    function deleteUser($uid)
    {
        // TODO: Implement deleteUser() method.
        $accountTb = new Account();
        $accountTb->deleteById($uid);
    }
}