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
            <p>你共行走了<br><span class="bNums"><?=$sportData['totalsteps']?></span>步<br>超过了99%的用户</p>
        </div>
        <div class="col-md-4">
            <span class="distance disp"></span>
            <p>你共前进了<br><span class="bNums"><?=$sportData['totaldistance']?></span>米<br>相当于xxx到xxx的距离</p>
        </div>
        <div class="col-md-4">
            <span class="energe disp"></span>
            <p>你共消耗了<br><span class="bNums"><?=$sportData['calorie']?></span>卡路里<br>相当于举起一台猫牌压路机</p>
        </div>
    </div>
    <div class="row result pageInner">
        <span class="present disp-lg"></span>
        <p>你的表现达到了<span class="bNums">“健美专家”</span>级别</p>
    </div>
</div>
