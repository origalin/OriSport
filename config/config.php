<?php
/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/10/28
 * Time: 16:20
 */
define('DB_ROOT', 'resources/OriSport.db');
define('PORTRAIT_ROOT','runtime/files/');
define('RACE_ROOT','/race/race_detail/');
define('PEOPLE_ROOT','/people/his_data/');
define('CLUB_ROOT','/in_club/clubs/');
define('PAGE_NOTLOGIN', '/errors/nologin');
define('PAGE_LOGINFAIL','/errors/login_fail');
define('PAGE_MANAGER','/manage/user_manage');
define('PAGE_DEFAULE','/personal/sport_data');
define('PAGE_LOGIN','/');
define('PAGE_AFTERRACE','/race/my_races');
define('PAGE_AFTERCLUB','/club/my_clubs');

define('RACE_MINE','i_create');
define('RACE_JOIN','i_join');
define('RACE_HISTORY','history');

define('RACE_NOTSTART','NOTSTART');
define('RACE_RUNNING','RUNNING');
define('RACE_RESULTING','RESULTING');
define('RACE_ENDED','ENDED');

define('FORMAT_DATE','Y-m-d');
define('FORMAT_TIME','Y-m-d H:i:s');

define('R_OF_EARTH',6371004);

define('TYPE_OF_RACE',json_encode(array('短跑','中长跑','马拉松','骑行','其他'),JSON_UNESCAPED_UNICODE));
define('TYPE_OF_CLUB',json_encode(array('跑步','篮球','羽毛球','乒乓球','网球','门球','排球','高尔夫'),JSON_UNESCAPED_UNICODE));