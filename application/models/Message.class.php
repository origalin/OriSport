<?php

/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/11/1
 * Time: 15:13
 */
class Message implements MessageService
{
    private $id;
    function __construct($id)
    {
        $this->id = $id;
    }


    function delete()
    {
        // TODO: Implement delete() method.
        $messageTb = new MessageData();
        $messageTb->deleteById($this->id);
    }

    function markRead()
    {
        // TODO: Implement markRead() method.
        $messageTb = new MessageData();
        $data = array('read'=>1);
        $messageTb->update($this->id,$data);
    }
}