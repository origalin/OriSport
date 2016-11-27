<?php

/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/11/1
 * Time: 15:18
 */
class Club implements ClubService
{
    private $id;
    function __construct($id)
    {
        $this->id = $id;
    }

    function getDetail()
    {
        // TODO: Implement getDetail() method.
        $clubTb = new ClubData();
        $accountTb = new Account();
        $result = $clubTb->findById($this->id);
        $result['managername'] = $accountTb->findById($result['managerid'])['username'];
        return $result;
    }

    function getChat()
    {
        // TODO: Implement getChat() method.
        $chatOfClub = new MessageOfClub();
        $accountTb = new Account();
        $result = $chatOfClub->find('clubid',$this->id);
        for($i = 0;$i<count($result);$i++){
            $result[$i]['creatername'] = $accountTb->findById($result[$i]['createrid'])['username'];
        }
        return $result;
    }

    function getPub()
    {
        // TODO: Implement getPub() method.
        $pubOfClub = new PublicOfClub();
        return $pubOfClub->find('clubid',$this->id);
    }

    function addChat($data)
    {
        // TODO: Implement addChat() method.
        $data["clubid"] = $this->id;
        $data['time'] = date(FORMAT_TIME);
        $chatOfClub = new MessageOfClub();
        $chatOfClub->insert($data);
    }

    function addPub($data)
    {
        // TODO: Implement addPub() method.
        $data["clubid"] = $this->id;
        $data['time'] = date(FORMAT_TIME);
        $pubOfClub = new PublicOfClub();
        $pubOfClub->insert($data);
    }

    function join($uid)
    {
        // TODO: Implement join() method.
        $userInClubTb = new UserInClub();
        $data = array('uid'=>$uid,'clubid'=>$this->id);
        $userInClubTb->insert($data);
        $clubTb = new ClubData();
        $oldNum = $clubTb->findById($this->id)['membernum'];
        $numData = array('membernum'=>++$oldNum);
        $clubTb->update($this->id,$numData);
    }

    function leave($uid)
    {
        // TODO: Implement leave() method.
        $userInClubTb = new UserInClub();
        $data = array('uid'=>$uid,'clubid'=>$this->id);
        $userInClubTb->delete($data);
        $clubTb = new ClubData();
        $oldNum = $clubTb->findById($this->id)['membernum'];
        $numData = array('membernum'=>--$oldNum);
        $clubTb->update($this->id,$numData);
    }

    function getMember()
    {
        // TODO: Implement getMember() method.
        $userInClubTb = new UserInClub();
        $accountTb = new Account();
        $result = array();
        $relations = $userInClubTb->find('clubid',$this->id);
        foreach ($relations as $value){
            $item = array();
            $item['id'] = $value['uid'];
            $item['username'] = $accountTb->findById($value['uid'])['username'];
            $result[]=$item;
        }
        return $result;
    }

    function invite($senderId, $ids)
    {
        // TODO: Implement invite() method.
        $messageTb = new MessageData();
        foreach ($ids as $value){
            $message = array();
            $message['senderid'] = $senderId;
            $message['receiverid'] = $value;
            $message['title'] = '俱乐部邀请';
            $message['contex'] = '我邀请你加入我们的俱乐部：<a href="'.CLUB_ROOT.$this->id.'">点击查看</a>，快来加入吧！';
            $message['time'] = date(FORMAT_TIME);
            $messageTb->insert($message);
        }
    }
}