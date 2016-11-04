<?php

/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/11/1
 * Time: 15:14
 */
interface ClubCollectionService
{
    function getClubList();
    function createClub($data);
}