<?php

/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/11/1
 * Time: 15:13
 */
class RaceCollection implements RaceCollectionService
{

    function getRaceList()
    {
        // TODO: Implement getRaceList() method.
        $raceTb = new RaceData();
        $result = $raceTb->getAll();
        return $result;
    }

    function createRace($data)
    {
        // TODO: Implement createRace() method.
        $raceTb = new RaceData();
        $raceTb->insert($data);
    }

    function getUserRace($uid,$type)
    {
        // TODO: Implement getUserRace() method.
        $raceTb = new RaceData();
        switch ($type){
            case RACE_MINE:
                $myRaces = $raceTb->find('createrid',$uid);
                return $myRaces;
                break;
            case RACE_JOIN:
                $myRaces = $raceTb->getMyJoinRace($uid);
                return $myRaces;
                break;
            default:
                break;
        }
    }
}