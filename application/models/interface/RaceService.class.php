<?php

/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/11/1
 * Time: 15:16
 */
interface RaceService
{
    function getDetail();
    function end($winnerId);
    function join($uid);
    function leave($uid);
    function invite($senderId,$ids);
}