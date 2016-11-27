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
    function search_result(){
        $key  = $_POST['key'];
        $userModel = new UserCollection();
        $results = $userModel->searchUsers($key);
        echo json_encode($results,JSON_UNESCAPED_UNICODE);
    }
    function userdata(){
        $user = new User($_SESSION['id']);
        $data = $_POST;
        $user->updateUserData($data);
    }
    function portrait(){
        $crop = json_decode($_POST['avatar_data']);
        $x = $crop->x;
        $y = $crop->y;
        $height = $crop->height;
        $width = $crop->width;
        $rotate = $crop->rotate;
        require_once appRoot.'/resources/lib/PHPThumb/ThumbLib.inc.php';
        $path = PORTRAIT_ROOT .$_SESSION['id'].'-'. $_FILES["avatar_file"]["name"];
        move_uploaded_file($_FILES["avatar_file"]["tmp_name"], $path);
        $thumb = PhpThumbFactory::create($path);
        $thumb->crop($x, $y, $height, $width);
        $thumb->rotateImageNDegrees($rotate);
        $thumb->resize(200,200);
        $thumb->save($path);
        $user = new User($_SESSION['id']);
        $originPortrait = appRoot.$user->getUserData()['portrait'];
        unlink($originPortrait);
        $data = array('portrait'=>'/'.$path);
        $user->updateUserData($data);
        echo '{"result":"http://'.$_SERVER['HTTP_HOST'].'/'.$path.'"}';
    }
    function message($data){
        $messageId = $data[0];
        $message = new Message($messageId);
        $action = $data[1];
        switch ($action){
            case 'read':
                $message->markRead();
                break;
            case 'delete':
                $message->delete();
                break;
            default:
                break;
        }
    }
}