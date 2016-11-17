<?php
/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/11/2
 * Time: 20:37
 */
define('LEVEL_USER', 1);
define('LEVEL_INSIDER', 4);
define('LEVEL_OWNER', 7);
define('LEVEL_MANAGER', 10);

define('LEVEL_TABLE',json_encode(array(LEVEL_USER,LEVEL_INSIDER,LEVEL_OWNER,LEVEL_MANAGER)));