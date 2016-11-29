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
    <script>
        var city = '<?=$raceData['city']?>';
        var address = '<?=$raceData['city']?><?=$raceData['location']?>';
    </script>
    <div class="row pageInner">
        <h2><?= $raceData['name'] ?><span class="tag-sm"><?= $raceData['type'] ?></span><?=$anoGenerator->generateDeleteZone()?></h2>
        <p class="withIcon"><span
                class="icon icon-location"></span><?= $raceData['province'] ?> <?= $raceData['city'] ?> <?= $raceData['location'] ?>
        </p>
        <div class="row">
            <div class="col-md-4">
                <div class="map" id="map"></div>
            </div>
            <div class="col-md-6">
                <p><?= $raceData['description'] ?></p>
                <p>开始时间：<?= $raceData['starttime'] ?></p>
                <h4>奖励：<?= $raceData['reward'] ?>分</h4>
            </div>
        </div>


    </div>
    <div class="row pageInner">
        <p>参与者：<a href="/people/his_data/<?= $raceData['createrid'] ?>"><img class="portrait" src="<?=$raceData['createrportrait']?>"><?= $raceData['creatername'] ?></a>(发起人)
            <?php
            foreach ($raceData['joiners'] as $value) {
                ?>
                <a href="/people/his_data/<?= $value['uid'] ?>"><img class="portrait" src="<?=$value['portrait']?>"><?= $value['username'] ?></a>
                <?php
            }
            ?></p>
        <?= $generator->generateJoinZone() ?>
        <?= $generator->generateWinZone() ?>
    </div>
    <script>
        var joiners = [{
            id: '<?=$raceData['createrid']?>',
            name: '<?=$raceData['creatername']?>'
        }<?php
            foreach($raceData['joiners'] as $value){
            ?>
            , {
                id: '<?= $value['uid'] ?>',
                name: '<?= $value['username'] ?>'
            }
            <?php
            }
            ?>
        ];
        var winner = {
            id: '<?=$raceData['winner']?>',
            name:'<?=$raceData['winnername']?>'
        };
    </script>
</div>



