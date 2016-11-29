<?php
/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/10/11
 * Time: 20:37
 */
?>
<div class="col-md-10 result inPage">
    <div class="row pageInner">
        <div class="row">
            <div class="col-md-6">
                <span class="sleepTime disp"></span>
                <p>你的最近一次睡眠，持续时间<br><span class="bNums"><?= floor($sleepData['lastTime'] / 60) ?></span>小时<span
                        class="bNums"><?= $sleepData['lastTime'] % 60 ?></span>分钟</p>
            </div>
            <div class="col-md-6">
                <span class="deepSleep disp"></span>
                <p>其中深度睡眠时间为<br><span class="bNums"><?= floor($sleepData['lastDeepTime'] / 60) ?></span>小时<span
                        class="bNums"><?= $sleepData['lastDeepTime'] % 60 ?></span>分钟</p>
            </div>
        </div>
        <div class="col-md-12">
            <span class="sleepJudge-good disp-lg"></span>
            <h4><?= $sleepData['evaluation'] ?></h4>
            <p class="tips">*推荐成人每天睡眠时间为7.5小时，深度睡眠时间2小时</p>
        </div>
    </div>
    <div class="row pageInner">
        <div class="row">
            <p>以下是你近期的睡眠状况记录</p>
            <script>
                var sleepTb = [];
                <?php
                foreach ($sleepData['sleepTb'] as $value){
                ?>
                sleepTb.push({
                    date:'<?=$value['date']?>',
                    length:<?=$value['length']?>,
                    deeplength:<?=$value['deeplength']?>,
                    level:<?=$value['level']?>
                });
                <?php
                }
                ?>
            </script>
            <div class="col-md-8 col-md-offset-2 sleepGraph" id="sleepGraph">
                我是图表
            </div>
        </div>
    </div>
</div>
