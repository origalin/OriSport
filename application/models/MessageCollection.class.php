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
        $accountTb = new Account();
        $messages = $messageTb->find('receiverid',$uid);
        $result = array();
        $result['byUser'] = array();
        $result['bySystem'] = array();
        foreach ($messages as $value){
            if($value['senderid']==0){
                $value['sendername']='系统';
                $result['bySystem'][] = $value;
            }else{
                $value['sendername'] = $accountTb->findById($value['senderid'])['username'];
                $result['byUser'][] = $value;
            }
        }
        return $result;
    }
}