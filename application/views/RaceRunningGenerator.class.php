<?php

/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/11/17
 * Time: 16:18
 */
class RaceRunningGenerator extends ViewGenerator implements RaceGeneratorService
{
    function __construct($level)
    {
        parent::__construct($level);
    }
    function generateWinZone()
    {
        // TODO: Implement genarateWinZone() method.
        $resultTb = array();
        $resultTb[LEVEL_USER] = '<p>请等待比赛结果</p>';
        $resultTb[LEVEL_OWNER] = '<p><button class="btn btn-success">结束比赛</button>选择冠军以结束比赛</p>';
        return $this->getResult($resultTb);
    }

    function generateJoinZone()
    {
        // TODO: Implement genarateJoinZone() method.
        $resultTb = array();
        $resultTb[LEVEL_USER] = '<p><button class="btn btn-success disabled">加入比赛</button>比赛已开始，不能中途加入</p>';
        $resultTb[LEVEL_INSIDER] = '<h3>比赛已经开始</h3>';
        return $this->getResult($resultTb);
    }
}