<?php
/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/10/17
 * Time: 21:53
 */
?>
<div class="col-md-10 inPage">
    <div class="row pageInner">
        <div class="row">
            <div class="col-md-12">
                <img class="img-thumbnail" src="<?= $userData['portrait'] ?>" alt="Responsive image" width="200px"
                     height="200px">
            </div>
        </div>
        <h2><?= $userData['username'] ?></h2>
        <?=$generator->generateButton()?>
        <p>积分：<?=$userData['point']?></p>
    </div>
    <div id="bodyData" class="row pageInner">
        <div>
            <p>身高：<span class="mayHide"><?= $userData['height'] ?></span></span>cm</p>
        </div>
        <div>
            <p>体重：<span class="mayHide"><?= $userData['weight'] ?></span></span>kg</p>
        </div>
        <div>
            <p>步长：<span class="mayHide"><?= $userData['step_length'] ?></span></span>cm</p>
        </div>
    </div>
    <div class="row pageInner">
        <div>
            <p>地址：<?= $userData['city'] == '' ? '-' : $userData['province'] . ' ' . $userData['city'] ?></p>
        </div>
        <div>
            <p>手机：<span class="mayHide"><?= $userData['phone'] == '' ? '-' : $userData['phone'] ?></span></p>
        </div>
        <div>
            <p>邮箱：<span class="mayHide"><?= $userData['email'] == '' ? '-' : $userData['email'] ?></span></p>
        </div>
        <div>
            <p>爱好：<span class="mayHide"><?= $userData['hobby'] == '' ? '-' : $userData['hobby'] ?></span></p>
        </div>
        <div>
            <span>个人签名：<span
                    class="mayHide"><?= $userData['description'] == '' ? '-' : $userData['description'] ?></span></span>
        </div>
    </div>
</div>
