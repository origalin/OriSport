<?php

/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/10/29
 * Time: 15:25
 */
class PeopleController extends Controller
{
    function his_data($data){
        $uid = $data[0];
        $user = new User($uid);
        $this->assign('userData',$user->getUserData());
        $this->needRender(true);
    }
    function his_race($data){
        $uid = $data[0];
        $raceCollection = new RaceCollection();
        $myRaces = $raceCollection->getUserRace($uid);
        $myRacesNum = $raceCollection->getRaceNum($uid);
        $myReward = $raceCollection->getRaceReward($uid);
        $this->assign(RACE_MINE,$myRaces[RACE_MINE]);
        $this->assign(RACE_JOIN,$myRaces[RACE_JOIN]);
        $this->assign('totalReward',$myReward);
        $this->assign('joinNum',$myRacesNum[RACE_JOIN]);
        $this->assign('mineNum',$myRacesNum[RACE_MINE]);
        $user = new User($uid);
        $this->assign('userData',$user->getUserData());
        $this->needRender(true);
    }
    function his_club($data){
        $uid = $data[0];
        $clubCollection = new ClubCollection();
        $this->assign('userJoined',$clubCollection->getUserJoinedClub($uid));
        $this->assign('userCreated',$clubCollection->getUserCreatedClub($uid));
        $user = new User($uid);
        $this->assign('userData',$user->getUserData());
        $this->needRender(true);
    }
}