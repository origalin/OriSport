<?php

/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/10/29
 * Time: 15:11
 */
class In_clubController extends Controller
{
    function clubs($data){
        if($_SERVER['REQUEST_METHOD']=='GET'){
            $clubId = $data[0];
            $club = new Club($clubId);
            $user = new User($_SESSION['id']);
            $level = $user->getAccessPrivilege($this->_controller,$this->_action,$clubId);
            $generator = new ClubGenerator($level);
            $this->assign('generator',$generator);
            $this->assign('clubData',$club->getDetail());
            $this->assign('members',$club->getMember());
            $this->assign('chat',$club->getChat());
            $this->assign('pub',$club->getPub());
            $this->needRender(true);
        }elseif($_SERVER['REQUEST_METHOD'] == 'POST'){
            $clubId = $data[0];
            $type = $_POST['type'];
            $club = new Club($clubId);
            switch ($type){
                case 'join':
                    $club->join($_SESSION['id']);
                    break;
                case 'leave':
                    $club->leave($_SESSION['id']);
                    break;
                case 'invite':
                    $club->invite($_SESSION['id'],$_POST['ids']);
                    break;
                default:
                    break;
            }
        }
    }
    function chats($data){
        $clubId = $data[0];
        $club = new Club($clubId);
        $newChat = array();
        $newChat['createrid'] = $_SESSION['id'];
        $newChat['contex'] = $_POST['contex'];
        $club->addChat($newChat);
    }
    function pubs($data){
        $clubId = $data[0];
        $club = new Club($clubId);
        $club->addPub($_POST);
    }
}