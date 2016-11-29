<?php
/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/10/11
 * Time: 20:36
 */
?>
<div class="col-md-10 inPage">
    <div class="row pageInner">
        <h4>加入OriSport<span class="bNums"><?=$sportData['days']?></span>天以来，</h4>
    </div>
    <div class="row result pageInner">
        <div class="col-md-4">
            <span class="walk disp"></span>
            <p>你共行走了<br><span class="bNums"><?=$sportData['totalsteps']?></span>步<br><?=$sportData['stepword']?></p>
        </div>
        <div class="col-md-4">
            <span class="distance disp"></span>
            <p>你共前进了<br><span class="bNums"><?=$sportData['totaldistance']?></span>米<br><?=$sportData['distanceword']?></p>
        </div>
        <div class="col-md-4">
            <span class="energe disp"></span>
            <p>你共消耗了<br><span class="bNums"><?=$sportData['calorie']?></span>卡路里<br><?=$sportData['calorieword']?></p>
        </div>
    </div>
    <div class="row result pageInner">
        <span class="present disp-lg"></span>
        <p>你的表现达到了<span class="bNums">“<?=$sportData['title']?>”</span>级别</p>
        <p class="tips">*你的表现评分会根据行进距离、卡路里消耗以及个人积分综合计算</p>
    </div>
</div>
