<?php

/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/11/1
 * Time: 15:14
 */
class ClubCollection implements ClubCollectionService
{

    function getClubList()
    {
        // TODO: Implement getClubList() method.
        $clubTb = new ClubData();
        return $clubTb->getAll();
    }

    function createClub($data)
    {
        // TODO: Implement createClub() method.
        $clubTb = new ClubData();
        $clubTb->insert($data);
    }
}