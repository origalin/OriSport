<?php

/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/11/1
 * Time: 15:14
 */
class Race implements RaceService
{
    private $id;
    function __construct($id)
    {
        $this->id = $id;
    }

    function getDetail()
    {
        // TODO: Implement getDetail() method.
        $raceTb = new RaceData();
        $userInRaceTb = new UserInRace();
        $accountTb = new Account();
        $raceData =$raceTb->findById($this->id);
        $raceData['joiners'] = $userInRaceTb->find('raceid',$this->id);
        $raceData['creatername'] = $accountTb->findById($raceData['createrid'])['username'];
        return $raceData;
    }

    function end()
    {
        // TODO: Implement end() method.
        $raceTb = new RaceData();
        $data = array('state'=>RACE_ENDED);
        $raceTb->update($this->id,$data);
    }

    function join($uid)
    {
        // TODO: Implement join() method.
        $userInRaceTb = new UserInRace();
        $newRelation = array('uid'=>$uid,'raceid'=>$this->id);
        $userInRaceTb->insert($newRelation);
    }

    function leave($uid)
    {
        // TODO: Implement leave() method.
        $userInRaceTb = new UserInRace();
        $condition = array('uid'=>$uid,'raceid'=>$this->id);
        $userInRaceTb->delete($condition);
    }
}