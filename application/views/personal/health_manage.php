<?php
/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/10/11
 * Time: 20:36
 */
?>
<div class="col-md-10 result inPage">
    <div class="row pageInner">
        <span class="health disp-lg"></span>
        <p>您目前的健康指数为<br><span class="bNums"><?=$healthData['point']?></span></p>
        <p class="tips">*健康指数受睡眠质量、运动质量、体脂率多因素影响</p>
    </div>
    <div class="row pageInner">
        <div class="col-md-4">
            <span class="sleep disp"></span>
            <p>您的睡眠质量<br><span class="bNums"><?=$healthData['sleep']?></span></p>
        </div>
        <div class="col-md-4">
            <span class="sport disp"></span>
            <p>您的运动强度<br><span class="bNums"><?=$healthData['sport']?></span></p>
        </div>
        <div class="col-md-4">
            <span class="body disp"></span>
            <p>您的体脂率<br><span class="bNums"><?=$healthData['body']?></span></p>
        </div>
    </div>

    <div class="row pageInner">
        <span class="conclution-good disp-lg"></span>
        <p class="bNums"><?=$healthData['evaluation']?></p>
    </div>
</div>
