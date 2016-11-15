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
        move_uploaded_file($_FILES["avatar_file"]["tmp_name"], "runtime/files/" . $_FILES["avatar_file"]["name"]);
        $thumb = PhpThumbFactory::create("runtime/files/" . $_FILES["avatar_file"]["name"]);
        $thumb->crop($x, $y, $height, $width);
        $thumb->rotateImageNDegrees($rotate);
        $thumb->save( 'runtime/files/' . $_FILES["avatar_file"]["name"]);
        $user = new User($_SESSION['id']);
        $data = array('portrait'=>$_FILES["avatar_file"]["name"]);
        $user->updateUserData($data);
        echo '{"result":"http://'.$_SERVER['HTTP_HOST'].'/runtime/files/' . $_FILES["avatar_file"]["name"].'"}';
    }
}