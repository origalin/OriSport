<?php

/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/11/17
 * Time: 16:19
 */
class RaceNotStartGenerator extends ViewGenerator implements RaceGeneratorService
{
    function __construct($level)
    {
        parent::__construct($level);
    }
    function generateWinZone()
    {
        // TODO: Implement genarateWinZone() method.
        $resultTb = array();
        $resultTb[LEVEL_USER] = '';
        return $this->getResult($resultTb);
    }

    function generateJoinZone()
    {
        // TODO: Implement genarateJoinZone() method.
        $resultTb = array();
        $resultTb[LEVEL_USER] = '<p><button class="btn btn-success" onclick="joinRace()">加入比赛</button></p>';
        $resultTb[LEVEL_INSIDER] = '<p><button class="btn btn-sm btn-danger" onclick="leaveRace()">已加入,离开比赛？</button></p>';
        $resultTb[LEVEL_OWNER] = '<p><button class="btn btn-success searchStarter">邀请参赛者</button></p>';
        return $this->getResult($resultTb);
    }
}