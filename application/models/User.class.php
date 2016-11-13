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

    function getSportTrack()
    {
        // TODO: Implement getSportTrack() method.
        $sportTrackTb = new SportTrack();
        $result = array();
        $result['totalTime'] = 0;
        $result['slowTime'] = 0;
        $result['fastTime'] = 0;
        $result['rideTime'] = 0;
        $result['trackTb'] = $sportTrackTb->find('uid',$this->id);
        $trackOfWeek = $sportTrackTb->getTrackOfWeek($this->id);
        foreach($trackOfWeek as $value){
            $result['totalTime'] +=$value['length'];
            switch ($value['type']){
                case 'slow':
                    $result['slowTime']+=$value['length'];
                    break;
                case 'fast':
                    $result['fastTime']+=$value['length'];
                    break;
                case 'ride':
                    $result['rideTime']+=$value['length'];
                    break;
                default:
                    break;
            }
        }
        $point = $result['slowTime']+$result['fastTime']+$result['rideTime'];
        $pointTb = array(400,1200);
        $evaluationTb = array(SPORT_LACK,SPORT_FIT,SPORT_MUCH);
        $result['evaluation'] = $evaluationTb[0];
        for($i = 0;$i<count($pointTb);$i++){
            if($point>=$pointTb[$i]){
                $result['evaluation']=$evaluationTb[$i+1];
            }
        }
        return $result;
    }

    function getSleepData()
    {
        // TODO: Implement getSleepData() method.
        $sleepDataTb = new SleepData();
        $lastSleep = $sleepDataTb->getLastSleep($this->id);
        $result = array();
        $result['sleepTb'] = $sleepDataTb->find('uid',$this->id);
        $result['lastTime'] = $lastSleep['length'];
        $result['lastDeepTime'] = $lastSleep['deeplength'];
        $point = $result['lastTime'];
        $pointTb = array(390,600);
        $evaluationTb = array(SLEEP_LACK,SLEEP_FIT,SLEEP_MUCH);
        $result['evaluation'] = $evaluationTb[0];
        for($i = 0;$i<count($pointTb);$i++){
            if($point>=$pointTb[$i]){
                $result['evaluation'] = $evaluationTb[$i+1];
            }
        }
        return $result;
    }

    function getSportData()
    {
        // TODO: Implement getSportData() method.
        $sportDataTb = new SportData();
        $result = $sportDataTb->find('uid',$this->id)[0];
        $createDay = (new UserData())->findById($this->id)['createday'];
        $days = (strtotime(date(FORMAT_DATE))-strtotime($createDay))/(60*60*24);
        $result['days'] = $days;
        $points = $result['totaldistance']+$result['calorie'];
        $pointsTb = array(30000,100000);
        $titleTb = array(TITLE_NEWMAN,TITLE_OLDHAND,TITLE_EXPERT);
        $result['title'] = $titleTb[0];
        for($i = 0;$i<count($pointsTb);$i++){
            if ($points>=$pointsTb[$i]){
                $result['title'] = $titleTb[$i+1];
            }
        }
        return $result;
    }

    function upLoadRingData($data)
    {
        // TODO: Implement upLoadRingData() method.
        $sleepDataTb = new SleepData();
        $sportTrackTb = new SportTrack();
        $sportDataTb = new SportData();
        $ringDataTb = new RingData();
        $userDataTb = new UserData();
        $lastRecord = $ringDataTb->getLastDataOfUser($this->id);


        $newSportData = array();
        $originSportData = $sportDataTb->find('uid',$this->id)[0];
        $newSportData['uid'] = $this->id;


        switch ($data['mode']){
            case 'sleep':
                if($lastRecord['mode']=='sleep'){
                    $lastSleep = $sleepDataTb->getLastDataOfUser($this->id);
                    $newSleepTime = (strtotime($data['time'])-strtotime($lastRecord['time']))/60;
                    $newLevel = ($lastSleep['level']*$lastSleep['length']+$data['level']*10*$newSleepTime)/($lastSleep['length']+$newSleepTime);
                    $newLength = $newSleepTime+$lastSleep['length'];
                    $toUpdate = array();
                    $toUpdate['level'] = $newLevel;
                    $toUpdate['length'] = $newLength;
                    if($data['level']<1){
                        $toUpdate['deeplength'] = $lastSleep['deeplength']+$newSleepTime;
                    }
                    $sleepDataTb->update($lastSleep['id'],$toUpdate);
                }else{
                    $toInsert = array();
                    $toInsert['uid'] = $this->id;
                    $toInsert['date'] = date(FORMAT_DATE);
                    $toInsert['level'] = 0;
                    $toInsert['length'] = 0;
                    $toInsert['deeplength'] = 0;
                    $sleepDataTb->insert($toInsert);
                }
                break;
            case 'sit':
                break;
            case 'slow':
                if($lastRecord['mode']=='slow'){
                    $userData = $userDataTb->findById($this->id);
                    $lastSport = $sportTrackTb->getLastDataOfUser($this->id);
                    $lonA = $lastRecord['locationx'];
                    $latA = $lastRecord['loactiony'];
                    $lonB = $data['locationx'];
                    $latB = $data['locationy'];
                    $C =  sin($latA)*sin($latB) + cos($latA)*cos($latB)*cos($lonA-$lonB);
                    $R = R_OF_EARTH;
                    $distance = $R*acos($C)*pi()/180;
                    $newDistance = $lastSport['distance']+ $distance;
                    $newRunTime = (strtotime($data['time'])-strtotime($lastRecord['time']))/60;
                    $newLength = $lastSport['length']+ $newRunTime;
                    $newRate = ($lastSport['heartrate']*$lastSport['length']+$data['heartrate']*$newRunTime)/($lastSport['length']+$newRunTime);
                    $addCalorie = $userData['weight']*$distance/1000*1.036;
                    $newCalorie = $lastSport['calorie']+$addCalorie;
                    $toUpdate = array();
                    $toUpdate['distance'] = $newDistance;
                    $toUpdate['length'] = $newLength;
                    $toUpdate['heartrate'] = $newRate;
                    $toUpdate['calorie'] = $newCalorie;
                    $sportTrackTb->update($lastSport['id'],$toUpdate);

                    $newSportData['totalsteps'] = $originSportData['totalsteps']+$data['path'];
                    $newSportData['totaldistance'] = $originSportData['totaldistance']+$distance;
                    $newSportData['calorie'] = $originSportData['calorie']+$addCalorie;
                }else{
                    $toInsert = array();
                    $toInsert['uid'] = $this->id;
                    $toInsert['time'] =date(FORMAT_TIME);
                    $toInsert['length'] = 0;
                    $toInsert['distance'] = 0;
                    $toInsert['calorie'] = 0;
                    $toInsert['heartrate'] = 0;
                    $toInsert['type'] = 'slow';
                    $sportTrackTb->insert($toInsert);
                }

                break;
            case 'fast':
                if($lastRecord['mode']=='fast'){
                    $userData = $userDataTb->findById($this->id);
                    $lastSport = $sportTrackTb->getLastDataOfUser($this->id);
                    $distance = $userData['step_length']*0.01*$data['path'];
                    $newDistance = $lastSport['distance']+ $distance;
                    $newRunTime = (strtotime($data['time'])-strtotime($lastRecord['time']))/60;
                    $newLength = $lastSport['length']+ $newRunTime;
                    $newRate = ($lastSport['heartrate']*$lastSport['length']+$data['heartrate']*$newRunTime)/($lastSport['length']+$newRunTime);
                    $addCalorie = $userData['weight']*0.1875*$newRunTime;
                    $newCalorie = $lastSport['calorie']+$addCalorie;
                    $toUpdate = array();
                    $toUpdate['distance'] = $newDistance;
                    $toUpdate['length'] = $newLength;
                    $toUpdate['heartrate'] = $newRate;
                    $toUpdate['calorie'] = $newCalorie;
                    $sportTrackTb->update($lastSport['id'],$toUpdate);

                    $newSportData['totalsteps'] = $originSportData['totalsteps']+$data['path'];
                    $newSportData['totaldistance'] = $originSportData['totaldistance']+$distance;
                    $newSportData['calorie'] = $originSportData['calorie']+$addCalorie;
                }else{
                    $toInsert = array();
                    $toInsert['uid'] = $this->id;
                    $toInsert['time'] =date(FORMAT_TIME);
                    $toInsert['length'] = 0;
                    $toInsert['distance'] = 0;
                    $toInsert['calorie'] = 0;
                    $toInsert['heartrate'] = 0;
                    $toInsert['type'] = 'fast';
                    $sportTrackTb->insert($toInsert);
                }
                break;
            case 'ride':
                if($lastRecord['mode']=='ride'){
                    $userData = $userDataTb->findById($this->id);
                    $lastSport = $sportTrackTb->getLastDataOfUser($this->id);
                    $lonA = $lastRecord['locationx'];
                    $latA = $lastRecord['loactiony'];
                    $lonB = $data['locationx'];
                    $latB = $data['locationy'];
                    $C =  sin($latA)*sin($latB) + cos($latA)*cos($latB)*cos($lonA-$lonB);
                    $R = R_OF_EARTH;
                    $distance = $R*acos($C)*pi()/180;
                    $newDistance = $lastSport['distance']+ $distance;
                    $newRunTime = (strtotime($data['time'])-strtotime($lastRecord['time']))/60;
                    $newLength = $lastSport['length']+ $newRunTime;
                    $newRate = ($lastSport['heartrate']*$lastSport['length']+$data['heartrate']*$newRunTime)/($lastSport['length']+$newRunTime);
                    $addCalorie = $userData['weight']*1.05*$distance/1000;
                    $newCalorie = $lastSport['calorie']+$addCalorie;
                    $toUpdate = array();
                    $toUpdate['distance'] = $newDistance;
                    $toUpdate['length'] = $newLength;
                    $toUpdate['heartrate'] = $newRate;
                    $toUpdate['calorie'] = $newCalorie;
                    $sportTrackTb->update($lastSport['id'],$toUpdate);

                    $newSportData['totaldistance'] = $originSportData['totaldistance']+$distance;
                    $newSportData['calorie'] = $originSportData['calorie']+$addCalorie;
                }else{
                    $toInsert = array();
                    $toInsert['uid'] = $this->id;
                    $toInsert['time'] =date(FORMAT_TIME);
                    $toInsert['length'] = 0;
                    $toInsert['distance'] = 0;
                    $toInsert['calorie'] = 0;
                    $toInsert['heartrate'] = 0;
                    $toInsert['type'] = 'slow';
                    $sportTrackTb->insert($toInsert);
                }
                break;
            case 'traffic':
                break;
            default:
                break;
        }
        $sportDataTb->update($originSportData['id'],$newSportData);
    }

    function getHealthData()
    {
        // TODO: Implement getHealthData() method.
        $sportData = $this->getSportTrack();
        $sleepData = $this->getSleepData();
        $good = '优良';
        $bad = '欠佳';
        $result = array();
        switch ($sportData['evaluation']){
            case SPORT_FIT:
                $sportPoint = 33;
                $result['sport'] = $good;
                break;
            default:
                $sportPoint=22;
                $result['sport'] = $bad;
                break;
        }
        switch ($sleepData['evaluation']){
            case SLEEP_FIT:
                $sleepPoint = 33;
                $result['sleep'] = $good;
                break;
            default:
                $sleepPoint = 22;
                $result['sleep'] = $bad;
                break;
        }
        $userData = $this->getUserData();
        $bodyPoint = 33-(abs($userData['height']-110-$userData['weight']));
        $bodyPoint = $bodyPoint<0?0:$bodyPoint;
        if($bodyPoint<22){
            $result['body'] = $bad;
        }else{
            $result['body'] = $good;
        }
        $point = $sportPoint+$sleepPoint+$bodyPoint;
        $result['point'] = $point;
        $pointTb = array(77,99);
        $evaluationTb = array(HEALTH_BAD,HEALTH_MIDDLE,HEALTH_GOOD);
        $result['evaluation'] = $evaluationTb[0];
        for($i = 0;$i<count($pointTb);$i++){
            if($point>=$pointTb[$i]){
                $result['evaluation'] = $evaluationTb[$i+1];
            }
        }
        return $result;

    }
}