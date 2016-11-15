<?php

/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/11/1
 * Time: 15:14
 */
class ClubCollection implements ClubCollectionService
{

    function getClubList($condition)
    {
        // TODO: Implement getClubList() method.
        $clubTb = new ClubData();
        $result = $clubTb->getClubByCondition($condition);
        return $result;
    }

    function createClub($data)
    {
        // TODO: Implement createClub() method.
        $clubTb = new ClubData();
        $clubTb->insert($data);
    }
    function getUserJoinedClub($uid){
        $userInClubTb = new UserInClub();
        $clubTb = new ClubData();
        $result = array();
        $clubs = $userInClubTb->find('uid',$uid);
        foreach ($clubs as $value){
            $item = array();
            $item['id'] = $value['clubid'];
            $item['name'] = $clubTb->findById($value['clubid'])['name'];
            $result[] = $item;
        }
        return $result;
    }

    function getUserCreatedClub($uid)
    {
        // TODO: Implement getUserCreatedClub() method.
        $clubTb = new ClubData();
        $result = array();
        $clubs = $clubTb->find('managerid',$uid);
        foreach ($clubs as $value){
            $item = array();
            $item['id'] = $value['id'];
            $item['name'] = $value['name'];
            $result[] = $item;
        }
        return $result;
    }

    function getClubActivity($uid)
    {
        // TODO: Implement getClubActivity() method.
        $activityTb = new ActivityOfClub();
        $clubTb = new ClubData();
        $clubs = array_merge($this->getUserCreatedClub($uid),$this->getUserJoinedClub($uid));
        $ids = array();
        foreach ($clubs as $value){
            $ids[] = $value['id'];
        }
        $result = $activityTb->getActivities($ids);

        for($i = 0;$i<count($result);$i++){
            $result[$i]['clubname'] = $clubTb->findById($result[$i]['clubid'])['name'];
        }
        return $result;

    }
}