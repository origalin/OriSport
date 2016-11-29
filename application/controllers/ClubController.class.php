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
        $this->assign('title','我的俱乐部');
        $this->needRender(true);
    }
    function new_club(){
        $this->assign('clubTypes',json_decode(TYPE_OF_CLUB));
        $this->assign('title','新建俱乐部');
        $this->needRender(true);
    }
    function star_clubs(){
        $this->assign('clubTypes',json_decode(TYPE_OF_CLUB));
        $this->assign('title','明星俱乐部');
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
            @header("location:".PAGE_AFTERCLUB);
        }

    }
    function search_result(){
        $key = $_POST['key'];
        $clubCollection = new ClubCollection();
        echo json_encode($clubCollection->searchClubs($key),JSON_UNESCAPED_UNICODE);
    }
    function delete($data){
        $id = $data[0];
        $clubCollection = new ClubCollection();
        $clubCollection->deleteClub($id);
        @header("location:".PAGE_AFTERCLUB);
    }
}