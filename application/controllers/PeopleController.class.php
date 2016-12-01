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
        if($_SERVER['REQUEST_METHOD']=='GET'){
            $user = new User($uid);
            $me = new User($_SESSION['id']);
            $level = $me->getAccessPrivilege($this->_controller,$this->_action,$uid);
            $his_title = $user->getSportData()['title'];
            $this->assign('his_title',$his_title);
            $this->assign('generator',new PeopleGenerator($level));
            $this->assign('userData',$user->getUserData());
            $this->assign('title','他的资料');
            $this->needRender(true);
        }elseif ($_SERVER['REQUEST_METHOD']=='POST'){
            $me = new User($_SESSION['id']);
            switch ($_POST['type']){
                case 'watchHim':
                    $me->watchHim($uid);
                    break;
                case 'unWatch':
                    $me->unWatch($uid);
                    break;
                case 'deleteUser':
                    $userCollection = new UserCollection();
                    $userCollection->deleteUser($uid);
                    break;
                default:
                    break;
            }
        }
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
        $this->assign('title','他的比赛');
        $this->needRender(true);
    }
    function his_club($data){
        $uid = $data[0];
        $clubCollection = new ClubCollection();
        $this->assign('userJoined',$clubCollection->getUserJoinedClub($uid));
        $this->assign('userCreated',$clubCollection->getUserCreatedClub($uid));
        $user = new User($uid);
        $this->assign('userData',$user->getUserData());
        $this->assign('title','他的俱乐部');
        $this->needRender(true);
    }
}