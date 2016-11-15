<?php

/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/11/2
 * Time: 21:07
 */
class ClubData extends Table
{
    function __construct()
    {
        parent::__construct("clubdata");
    }
    function getClubByCondition($data){
        $page = 1;
        $where = 'where';
        if(array_key_exists('page',$data)){
            $page = $data['page'];
            unset($data['page']);
        }
        if(count($data)==0){
            $where = '';
        }
        $sql = sprintf("select * from clubdata %s %s LIMIT %d,%d",$where,$this->formatWhere($data),($page-1)*20,$page*20);
        return $this->query($sql);
    }
}