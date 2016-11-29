<?php

/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/11/2
 * Time: 21:10
 */
class RingData extends Table
{
    function __construct()
    {
        parent::__construct("ringdata");
    }
    function getLastDataOfUser($uid){
        $sql = sprintf("select * from ringdata WHERE uid = '%s' ORDER BY time DESC LIMIT 0,1",$uid);
        if(count($this->query($sql))>0){
            return $this->query($sql)[0];
        }else{
            return array('id'=>'','time'=>'','path'=>'','loactionx'=>'','locationy'=>'','mode'=>'','level'=>'','rate'=>'','uid'=>'');
        }
    }
}