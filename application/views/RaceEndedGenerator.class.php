<?php

/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/11/17
 * Time: 16:20
 */
class RaceEndedGenerator  extends ViewGenerator implements RaceGeneratorService
{
    function __construct($level)
    {
        parent::__construct($level);
    }

    function generateWinZone()
    {
        // TODO: Implement genarateWinZone() method.
        $resultTb = array();
        $resultTb[LEVEL_USER] = '<p>比赛已结束，冠军为</p>';
        return $this->getResult($resultTb);
    }

    function generateJoinZone()
    {
        // TODO: Implement genarateJoinZone() method.
        $resultTb = array();
        $resultTb[LEVEL_USER] = '';
        return $this->getResult($resultTb);
    }
}