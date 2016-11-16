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
        $this->assign('clubTypes',json_decode(TYPE_OF_CLUB));
        $this->needRender(true);
    }
    function star_clubs(){
        $this->assign('clubTypes',json_decode(TYPE_OF_CLUB));
        $this->needRender(true);
    }
    function clubList(){
        $clubCollection = new ClubCollection();
        if($_SERVER['REQUEST_METHOD']=='GET'){
            $condition = array();
            $condition['page'] = 1;
            $checkList = array('province','city','type');
            foreach ($checkList as $value){
                if (isset($_GET[$value])){
                    $condition[$value] = $_GET[$value];
                }
            }
            $result = $clubCollection->getClubList($condition);
            echo json_encode($result,JSON_UNESCAPED_UNICODE);
        }elseif ($_SERVER['REQUEST_METHOD']=='POST'){
            $data = $_POST;
            $data['managerid'] = $_SESSION['id'];
            $clubCollection->createClub($data);
        }

    }
}