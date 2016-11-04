<?php

/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/11/1
 * Time: 15:12
 */
class User implements UserService
{
    private $id;
    function __construct($id)
    {
        $this->id = $id;
    }

    function getUserData()
    {
        $userDataTb = new UserData();
        return $userDataTb->findById($this->id);
        // TODO: Implement getUserData() method.
    }

    function updateUserData($data)
    {
        $userDataTb = new UserData();
        $dataId = $userDataTb->find('uid',$this->id)[0]['id'];
        $userDataTb->update($dataId,$data);
        // TODO: Implement updateUserData() method.
    }

    function getAccessPrivilege($controller,$action,$value)
    {
        $accoutTb = new Account();
        if($accoutTb->findById($this->id)['role']=='manager'){
            return LEVEL_MANAGER;
        }else{
            switch ($action){
                case 'race_detail':
                    if($this->isRaceCreater($value)){
                        return LEVEL_OWNER;
                    }elseif ($this->isRaceInsider($value)){
                        return LEVEL_INSIDER;
                    }else{
                        return LEVEL_USER;
                    }
                    break;
                case 'clubs':
                    if($this->isClubManager($value)){
                        return LEVEL_OWNER;
                    }elseif ($this->isClubMember($value)){
                        return LEVEL_INSIDER;
                    }else{
                        return LEVEL_USER;
                    }
                default:
                    break;
            }
        }
        // TODO: Implement getAccessPrivilege() method.
    }
    private function isRaceCreater($raceId){
        $raceTb = new RaceData();
        return ($raceTb->findById($raceId)['createrid']==$this->id);
    }
    private function isClubManager($clubId){
        $clubTb = new ClubData();
        return ($clubTb->findById($clubId)['managerid']==$this->id);
    }
    private function isRaceInsider($raceId){
        $userInRaceTb = new UserInRace();
        $userAndRace = $userInRaceTb->find('raceid',$raceId);
        for($i = 0;$i<count($userAndRace);$i++){
            if($this->id == $userAndRace[$i]['uid']){
                return true;
            }
        }
        return false;
    }
    private function isClubMember($clubId){
        $userInClubTb = new UserInClub();
        $userAndClub = $userInClubTb->find('clubid',$clubId);
        for($i = 0;$i<count($userAndClub);$i++){
            if($this->id == $userAndClub[$i]['uid']){
                return true;
            }
        }
        return false;
    }
}