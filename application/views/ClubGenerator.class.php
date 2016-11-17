<?php

/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/11/17
 * Time: 16:21
 */
class ClubGenerator extends ViewGenerator
{
    function __construct($level)
    {
        parent::__construct($level);
    }

    function generateJoinZone()
    {
        $resultTb = array();
        $resultTb[LEVEL_USER] = '<button class="btn btn-sm btn-success">加入俱乐部</button>';
        $resultTb[LEVEL_INSIDER] = '<button class="btn btn-sm btn-success searchStarter">邀请成员</button>';
        return $this->getResult($resultTb);
    }

    function generatePubZone()
    {
        $resultTb = array();
        $resultTb[LEVEL_USER] = '';
        $resultTb[LEVEL_OWNER] = '<div class="row pageInner-sm"><button class="btn btn-sm btn-success" data-toggle="modal" data-target="#nPublicModal">添加公告</button></div>';
        return $this->getResult($resultTb);
    }
    function generateChatZone()
    {
        $resultTb = array();
        $resultTb[LEVEL_USER] = '<div class="col-md-12"><p>加入俱乐部后才可发言</p></div>';
        $resultTb[LEVEL_INSIDER] = '<div class="form-group"><textarea id="textPanel" rows="4" placeholder="请留言" class="form-control">'.
        '</textarea></div><button class="btn btn-success pull-right">提交</button>';
        return $this->getResult($resultTb);
    }
}