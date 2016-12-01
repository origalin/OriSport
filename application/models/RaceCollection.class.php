<?php

/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/11/1
 * Time: 15:13
 */
class RaceCollection implements RaceCollectionService
{

    function getRaceList($condition)
    {
        // TODO: Implement getRaceList() method.
        $raceTb = new RaceData();
        $result = $raceTb->getRaceBycCondition($condition);
        return $result;
    }

    function createRace($data)
    {
        // TODO: Implement createRace() method.
        $raceTb = new RaceData();
        $userTb = new UserData();
        $newPoint = $userTb->findById($data['createrid'])['point']-$data['reward'];
        if($newPoint<0){
            echo 'lack_of_point';
        }else{
            $userTb->update($data['createrid'],array('point'=>$newPoint));
            $raceTb->insert($data);
        }
    }

    function getUserRace($uid)
    {
        // TODO: Implement getUserRace() method.
        $raceTb = new RaceData();
        $result = array();
        $result[RACE_MINE] = $raceTb->find('createrid',$uid);
        $result[RACE_JOIN]= $raceTb->getMyJoinRace($uid);
        return $result;
    }

    function getRaceNum($uid)
    {
        // TODO: Implement getRaceNum() method.
        $raceTb = new RaceData();
        $result = array();
        $result[RACE_MINE] = count($raceTb->find('createrid',$uid));
        $result[RACE_JOIN]= count($raceTb->getMyJoinRace($uid));
        return $result;
    }
    function getRaceReward($uid){
        $raceTb = new RaceData();
        $myWinRaces = $raceTb->find('winner',$uid);
        $result = 0;
        foreach ($myWinRaces as $value){
            $result+=$value['reward'];
        }
        return $result;
    }

    function searchRaces($key)
    {
        // TODO: Implement searchRace() method.
        $raceTb = new RaceData();
        $result = $raceTb->search('name',$key);
        return $result;
    }

    function updateRace($data)
    {
        // TODO: Implement updateRace() method.
        $id = $data['id'];
        unset($data['id']);
        $raceTb = new RaceData();
        $userTb = new UserData();
        $newPoint = $userTb->findById($data['createrid'])['point']-$data['reward']+$raceTb->findById($id)['reward'];
        if($newPoint<0){
            echo 'lack_of_point';
        }else{
            $userTb->update($data['createrid'],array('point'=>$newPoint));
            $raceTb->update($id,$data);
        }
    }

    function deleteRace($id)
    {
        // TODO: Implement deleteRace() method.
        $raceTb = new RaceData();
        $raceTb->deleteById($id);
    }
}