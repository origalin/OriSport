<?php

/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/11/1
 * Time: 15:12
 */
class MessageCollection implements MessageCollectionService
{

    function createMessage($data)
    {
        // TODO: Implement createMessage() method.
        $messageTb = new MessageData();
        $messageTb->insert($data);
    }

    function getMessages($uid)
    {
        // TODO: Implement getMessages() method.
        $messageTb = new MessageData();
        return $messageTb->find('recriverid',$uid);
    }
}