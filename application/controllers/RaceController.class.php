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
        $this->needRender(true);
    }
    function race_detail($data){
        $raceId = $data[0];
        $race = new Race($raceId);
        $user = new User($_SESSION['id']);
        $raceData = $race->getDetail();
        $this->assign('raceData',$raceData);

        $accessPrivilege = $user->getAccessPrivilege($this->_controller,$this->_action,$raceId);
        $this->assign('accessPrivilege',$accessPrivilege);


        $this->needRender(true);
    }
    function race_field(){
        $this->needRender(true);
    }
}