<?php
/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/10/13
 * Time: 23:37
 */
?>
<div class="col-md-10 inPage">
    <div class="row pageInner">
        <div class="btn-group">
            <button role="button" class="btn btn-default active" id="showSystem" onclick="showSystem()">系统消息</button>
            <button role="button" class="btn btn-default" id="showUser" onclick="showUser()">用户消息</button>
        </div>
    </div>
    <div class="row pageInner">
        <div class="" id="system">
            <?php
            if (count($messages['bySystem']) == 0) {
                echo "<div class='row' style='text-align: center'>暂无</div>";
            } else {
                foreach ($messages['bySystem'] as $value) {
                    ?>
                    <div class="row newsItem">
                        <div class="row">
                            <div class="col-md-6">
                                <h4><span>图</span><?=$value['title']?></h4>
                            </div>
                            <div class="col-md-6">
                                <h5>from:<a href="/people/his_data/<?=$value['senderid']?>"><?=$value['sendername']?></a><span class="pull-right"><?=$value['time']?></span></h5>
                            </div>
                        </div>
                        <div class="collapse collapseDiv row">
                            <div class="col-md-11 col-xs-11">
                                <h5><?=$value['contex']?></h5>
                            </div>
                            <div class="col-md-1 col-xs-1">
                                <button class="glyphicon glyphicon-remove iconButton"></button>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
        <div class="" id="user">
            <?php
            if (count($messages['byUser']) == 0) {
                echo "<div class='row' style='text-align: center'>暂无</div>";
            }else {
                foreach ($messages['byUser'] as $value) {
                    ?>
                    <div class="row newsItem">
                        <div class="row">
                            <div class="col-md-6">
                                <h4><span>图</span><?=$value['title']?></h4>
                            </div>
                            <div class="col-md-6">
                                <h5>from:<a href="/people/his_data/<?=$value['senderid']?>"><?=$value['sendername']?></a><span class="pull-right"><?=$value['time']?></span></h5>
                            </div>
                        </div>
                        <div class="collapse collapseDiv row">
                            <div class="col-md-11 col-xs-11">
                                <h5><?=$value['contex']?></h5>
                            </div>
                            <div class="col-md-1 col-xs-1">
                                <button class="glyphicon glyphicon-remove iconButton"></button>
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

