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
        return $clubTb->findById($this->id);
    }

    function getChat()
    {
        // TODO: Implement getChat() method.
        $chatOfClub = new MessageOfClub();
        return $chatOfClub->find('clubid',$this->id);
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
        $chatOfClub = new MessageOfClub();
        $chatOfClub->insert($data);
    }

    function addPub($data)
    {
        // TODO: Implement addPub() method.
        $data["clubid"] = $this->id;
        $pubOfClub = new PublicOfClub();
        $pubOfClub->insert($data);
    }

    function join($uid)
    {
        // TODO: Implement join() method.
        $userInClubTb = new UserInClub();
        $data = array('uid'=>$uid,'clubid'=>$this->id);
        $userInClubTb->insert($data);
    }

    function leave($uid)
    {
        // TODO: Implement leave() method.
        $userInClubTb = new UserInClub();
        $data = array('uid'=>$uid,'clubid'=>$this->id);
        $userInClubTb->delete($data);
    }
}