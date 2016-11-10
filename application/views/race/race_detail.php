<?php
/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/10/14
 * Time: 8:51
 */
?>

<div class="col-md-10 inPage">
    <div class="row pageInner">
            <button onclick="history.go(-1);" class="btn btn-success">返回</button>
    </div>
    <div class="row pageInner">
        <h2><?=$raceData['name']?></h2>
        <p><?=$raceData['province']?> <?=$raceData['city']?></p>
        <p><?=$raceData['description']?></p>
        <p>开始时间：<?=$raceData['starttime']?></p>
        <p>参与者：<a><?=$raceData['creatername']?>(发起人)</a></p>
        <button class="btn btn-success searchStarter">邀请参赛者</button>
    </div>
    <div class="row pageInner">
        <h4>奖励：<?=$raceData['reward']?>分</h4>
        <p>线下比赛，请按照<a href="">origalin</a>的指示进行</p>
    </div>
</div>



