<?php

/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/10/29
 * Time: 15:04
 */
class ClubController extends Controller
{
    function my_clubs(){
        $clubCollection = new ClubCollection();
        $this->assign('userJoined',$clubCollection->getUserJoinedClub($_SESSION['id']));
        $this->assign('userCreated',$clubCollection->getUserCreatedClub($_SESSION['id']));
        $this->assign('activities',$clubCollection->getClubActivity($_SESSION['id']));
        $this->needRender(true);
    }
    function new_club(){
        $this->needRender(true);
    }
    function star_clubs(){
        $this->needRender(true);
    }
}