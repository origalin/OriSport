<?php

/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/11/1
 * Time: 15:19
 */
interface ClubService
{
    function getDetail();
    function getChat();
    function getPub();
    function getMember();
    function addChat($data);
    function addPub($data);
    function join($uid);
    function leave($uid);
    function invite($senderId,$ids);
}