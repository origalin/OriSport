<?php

/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/11/17
 * Time: 16:27
 */
class ViewGenerator
{
    protected $levelTb;
    protected $currentLevel;
    function __construct($level)
    {
        $this->currentLevel = $level;
        $this->levelTb = json_decode(LEVEL_TABLE);
    }
    protected function getResult($resultTb){
        $index = LEVEL_USER;
        foreach ($this->levelTb as $value){
            if($this->currentLevel>=$value&&isset($resultTb[$value])){
                $index = $value;
            }
        }
        return $resultTb[$index];
    }
}