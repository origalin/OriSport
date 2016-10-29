<?php

/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/10/29
 * Time: 14:40
 */
class RaceController extends Controller
{
    function my_races(){
        $this->needRender(true);
    }
    function new_race(){
        $this->needRender(true);
    }
    function race_detail(){
        $this->needRender(true);
    }
    function race_field(){
        $this->needRender(true);
    }
}