<?php

/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/10/29
 * Time: 15:19
 */
class UserController extends Controller
{
    function user_message(){
        $messageCollection = new MessageCollection();
        $this->assign('messages',$messageCollection->getMessages($_SESSION['id']));
        $this->needRender(true);
    }
    function user_data(){
        $user = new User($_SESSION['id']);
        $this->assign('userData',$user->getUserData());
        $this->needRender(true);
    }
    function search_result($key){
        $userModel = new UserCollection();
        $results = $userModel->searchUsers($key);
        echo json_encode($results);
    }
}