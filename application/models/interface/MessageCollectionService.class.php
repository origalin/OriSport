<?php

/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/11/1
 * Time: 15:12
 */
interface MessageCollectionService
{
    function createMessage($data);
    function getMessages($uid);
}