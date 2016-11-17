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
        <div class="col-md-8">
            <p>他已参与<span class="bNums"><?= $joinNum ?></span>个竞赛</p>
            <p>已发起<span class="bNums"><?= $mineNum ?></span>个竞赛</p>
            <p>已获得奖励<span class="bNums"><?= $totalReward ?></span>元</p>
        </div>
    </div>
    <div class="row pageInner">
        <div class="row">
            <div class="btn-group switchs">
                <button role="button" class="btn btn-default active" onclick="showMine()" id="showMine">他发起的</button>
                <button role="button" class="btn btn-default" onclick="showJoin()" id="showJoin">他参与的</button>
            </div>
        </div>
        <div class="row" id="mine">
            <?php
            if (count($i_create) == 0) {
                echo "<div class='bNewsItem row' style='text-align: center'>暂无</div>";
            } else {
                foreach ($i_create as $value) {
                    ?>
                    <div class="bNewsItem row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                    <h3><a href="/race/race_detail/<?=$value['id']?>"><?=$value['name']?></a><span class="tag-sm"><?=$value['type']?></span></h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"><p><?=$value['description']?></p></div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 tags"><span class="withIcon"><i
                                            class="icon icon-location"></i><?=$value['province']?> <?=$value['city']?></span>
                                    <span class="withIcon"><i
                                            class="icon icon-time"></i><?=$value['starttime']?></span>
                                    <span class="withIcon"><i
                                            class="icon icon-reward"></i><?=$value['reward']?>分</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>

        </div>
        <div class="row" id="join">
            <?php
            if (count($i_join) == 0) {
                echo "<div class='bNewsItem row' style='text-align: center'>暂无</div>";
            } else {
                foreach ($i_join as $value) {
                    ?>
                    <div class="bNewsItem row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                    <h3><a href="/race/race_detail/<?=$value['id']?>"><?=$value['name']?></a><span class="tag-sm"><?=$value['type']?></span></h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"><p><?=$value['description']?></p></div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 tags"><span class="withIcon"><i
                                            class="icon icon-location"></i><?=$value['province']?> <?=$value['city']?></span>
                                    <span class="withIcon"><i
                                            class="icon icon-time"></i><?=$value['starttime']?></span>
                                    <span class="withIcon"><i
                                            class="icon icon-reward"></i><?=$value['reward']?>分</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>

</div>
