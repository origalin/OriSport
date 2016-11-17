<?php
/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/10/29
 * Time: 15:08
 */
?>
<div class="col-md-2 inPage-sm">
    <div class="row pageInner-sm">
        <?=$generator->generateJoinZone()?>
    </div>
    <div class="pageInner">
        <p>成员</p>
        <?php
        if (count($members) == 0) {
            echo "<div class='member'>暂无</div>";
        } else {
            foreach ($members as $value) {
                ?>
                <div class="member">
                    <a href="/people/his_data/<?= $value['id'] ?>"><?= $value['username'] ?></a>
                </div>
                <?php
            }
        }
        ?>
    </div>
</div>
<div class="col-md-8 inPage">
    <div class="row pageInner">
        <h2><?= $clubData['name'] ?><span class="tag-sm"><?= $clubData['type'] ?></span></h2>
        <p class="withIcon"><span
                class="icon icon-location"></span><?= $clubData['province'] ?> <?= $clubData['city'] ?></p>
        <p>主席：<a href="/people/his_data/<?= $clubData['managerid'] ?>"><?= $clubData['managername'] ?></a></p>
        <p><?= $clubData['description'] ?></p>
    </div>
    <div class="row pageInner">
        <div class="col-md-12 messageArea">
            <h4>成员留言</h4>
            <?php
            if (count($chat) == 0) {
                echo "<div class='row messageItem' style='text-align: center'>暂无</div>";
            } else {
                foreach ($chat as $value) {
                    ?>
                    <div class="row messageItem">
                        <div class="col-md-12">
                            <p><a href="/people/his_data/<?= $value['createrid'] ?>"><?= $value['creatername'] ?>:</a>
                            </p>
                            <p><?= $value['contex'] ?></p>
                            <p class="withIcon pull-right"><span class="icon icon-time"></span><?= $value['time'] ?>
                            </p>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>

        </div>
        <?=$generator->generateChatZone()?>
    </div>
</div>
<div class="col-md-2 inPage-sm">
    <?=$generator->generatePubZone()?>
    <?php
    if (count($pub) == 0) {
        echo "<div class='pageInner-sm'>暂无</div>";
    } else {
        foreach ($pub as $value) {
            ?>
            <div class="pageInner-sm" onclick="$('#publicModal').modal('toggle')">
                <div class="row">
                    <?=$value['title']?>
                </div>
                <div class="row text">
                    <?=$value['contex']?>
                </div>
                <div class="row">
                    <?=$value['time']?>
                </div>
            </div>
            <?php
        }
    }
    ?>
</div>
<div id="nPublicModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">x
                </button>
                <h2 class="text-left text-primary">新公告</h2>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="publicTitle">标题:</label>
                    <input class="form-control" id="publicTitle"></div>
                <div class="form-group">
                    <textarea id="publicPanel" rows="4" placeholder="请留言" class="form-control"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">取消
                </button>
                <button type="button" class="btn btn-success" id="confirmInvite">确认邀请</button>
            </div>
        </div>
    </div>
</div>
<div id="publicModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">x
                </button>
                <h2 class="text-left text-primary">公告XXXX</h2>
            </div>
            <div class="modal-body">
                djklhflkjadghjgkdghlfkjhldkjahgdlkjafhsajkfhakljgasdfkljvadhfsjhkfjsa
                asdadsdfdfsjagdjskjagdasfshfgakhgshf
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal" id="">关闭</button>
            </div>
        </div>
    </div>
</div>
