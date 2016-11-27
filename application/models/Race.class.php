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
        for($i = 0;$i<count($raceData['joiners']);$i++){
            $raceData['joiners'][$i]['username'] = $accountTb->findById($raceData['joiners'][$i]['uid'])['username'];
        }
        $raceData['creatername'] = $accountTb->findById($raceData['createrid'])['username'];
        if($raceData['winner']!=NULL){
            $raceData['winnername'] = $accountTb->findById($raceData['winner'])['username'];
        }else{
            $raceData['winnername']=NULL;
        }
        return $raceData;
    }

    function end($winnerId)
    {
        // TODO: Implement end() method.
        $raceTb = new RaceData();
        $data = array('state'=>RACE_ENDED,'winner'=>$winnerId);
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
    function invite($senderId,$ids){
        $messageTb = new MessageData();
        foreach ($ids as $value){
            $message = array();
            $message['senderid'] = $senderId;
            $message['receiverid'] = $value;
            $message['title'] = '竞赛邀请';
            $message['contex'] = '我邀请你参加一个比赛：<a href="'.RACE_ROOT.$this->id.'">点击查看</a>，快来参加吧！';
            $message['time'] = date(FORMAT_TIME);
            $messageTb->insert($message);
        }
    }
}