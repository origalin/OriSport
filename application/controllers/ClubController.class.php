<?php

/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/10/29
 * Time: 15:04
 */
class ClubController extends Controller
{
    function my_clubs(){
        $this->needRender(true);
    }
    function new_club(){
        $this->needRender(true);
    }
    function star_clubs(){
        $this->needRender(true);
    }
}