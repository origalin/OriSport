<?php

/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/10/29
 * Time: 15:19
 */
class UserController extends Controller
{
    function user_message(){
        $this->needRender(true);
    }
    function user_data(){
        $this->needRender(true);
    }
}