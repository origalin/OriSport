<?php

/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/10/29
 * Time: 14:40
 */
class RaceController extends Controller
{
    function my_races(){
        $raceCollection = new RaceCollection();
        $myRaces = $raceCollection->getUserRace($_SESSION['id']);
        $myRacesNum = $raceCollection->getRaceNum($_SESSION['id']);
        $myReward = $raceCollection->getRaceReward($_SESSION['id']);
        $this->assign(RACE_MINE,$myRaces[RACE_MINE]);
        $this->assign(RACE_JOIN,$myRaces[RACE_JOIN]);
        $this->assign('totalReward',$myReward);
        $this->assign('joinNum',$myRacesNum[RACE_JOIN]);
        $this->assign('mineNum',$myRacesNum[RACE_MINE]);
        $this->needRender(true);
    }
    function new_race(){
        $this->assign('raceTypes',json_decode(TYPE_OF_RACE));
        $this->needRender(true);
    }
    function race_detail($data){
        $raceId = $data[0];
        $race = new Race($raceId);
        $user = new User($_SESSION['id']);
        $raceData = $race->getDetail();
        $this->assign('raceData',$raceData);

        $level = $user->getAccessPrivilege($this->_controller,$this->_action,$raceId);
        $generator = new RaceNotStartGenerator($level);
        switch ($raceData){
            case RACE_NOTSTART:
                $generator = new RaceNotStartGenerator($level);
                break;
            case RACE_RUNNING:
                $generator = new RaceRunningGenerator($level);
                break;
            case RACE_ENDED:
                $generator = new RaceEndedGenerator($level);
                break;
            default:
                break;
        }
        $this->assign('generator',$generator);


        $this->needRender(true);
    }
    function race_field(){
        $raceCollection = new RaceCollection();
        $defaultCondition = array();
        $this->assign('raceList',$raceCollection->getRaceList($defaultCondition));
        $this->assign('raceTypes',json_decode(TYPE_OF_RACE));
        $this->needRender(true);
    }
    function raceList(){
        $raceCollection = new RaceCollection();
        if($_SERVER['REQUEST_METHOD']=='GET'){
            $condition = array();
            $condition['page'] = 1;
            $checkList = array('province','city','type');
            foreach ($checkList as $value){
                if (isset($_GET[$value])){
                    $condition[$value] = $_GET[$value];
                }
            }
            $result = $raceCollection->getRaceList($condition);
            echo json_encode($result,JSON_UNESCAPED_UNICODE);
        }elseif ($_SERVER['REQUEST_METHOD']=='POST'){
            $data = $_POST;
            $data['createrid'] = $_SESSION['id'];
            $raceCollection->createRace($data);
            @header("location:".PAGE_AFTERRACE);
        }

    }
}