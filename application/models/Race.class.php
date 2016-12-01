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
        $userTb = new UserData();
        $raceData =$raceTb->findById($this->id);
        $raceData['joiners'] = $userInRaceTb->find('raceid',$this->id);
        for($i = 0;$i<count($raceData['joiners']);$i++){
            $raceData['joiners'][$i]['username'] = $accountTb->findById($raceData['joiners'][$i]['uid'])['username'];
            $raceData['joiners'][$i]['portrait'] = $userTb->findById($raceData['joiners'][$i]['uid'])['portrait'];
        }
        $raceData['creatername'] = $accountTb->findById($raceData['createrid'])['username'];
        $raceData['createrportrait'] = $userTb->findById($raceData['createrid'])['portrait'];
        if($raceData['winner']!=NULL){
            $raceData['winnername'] = $accountTb->findById($raceData['winner'])['username'];
            $raceData['winnerportrait'] = $userTb->findById($raceData['winner'])['portrait'];
        }else{
            $raceData['winnername']=NULL;
            $raceData['winnerportrait'] = NULL;
        }
        return $raceData;
    }

    function end($winnerId)
    {
        // TODO: Implement end() method.
        $raceTb = new RaceData();
        $data = array('state'=>RACE_ENDED,'winner'=>$winnerId);
        $raceTb->update($this->id,$data);
        $userTb = new UserData();
        $newPoint = $userTb->findById($winnerId)['point']+$this->getDetail()['reward'];
        $userTb->update($winnerId,array('point'=>$newPoint));

        $messageTb = new MessageData();
        $message = array();
        $message['senderid'] = 0;
        $message['receiverid'] = $winnerId;
        $message['title'] = '竞赛结束';
        $message['contex'] = '你赢得了一场比赛：<a href="'.RACE_ROOT.$this->id.'">点击查看</a>，快来看看吧！';
        $message['time'] = date(FORMAT_TIME);
        $messageTb->insert($message);
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