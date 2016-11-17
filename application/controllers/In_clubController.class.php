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
        $clubId = $data[0];
        $club = new Club($clubId);
        $user = new User($_SESSION['id']);
        $level = $user->getAccessPrivilege($this->_controller,$this->_action,$clubId);
        echo $level;
        $generator = new ClubGenerator($level);
        $this->assign('generator',$generator);
        $this->assign('clubData',$club->getDetail());
        $this->assign('members',$club->getMember());
        $this->assign('chat',$club->getChat());
        $this->assign('pub',$club->getPub());
        $this->needRender(true);
    }
}