<?php
/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/10/11
 * Time: 20:39
 */
?>
<div class="col-md-10 inPage">
    <div class="row pageInner">
        <h4 class="">
            我的俱乐部
            <a class="pull-right" href="/club/new_club">
                <button class="btn btn-success">新建俱乐部</button>
            </a>
        </h4>
        <div class="row myClubList">
            <?php
            if (count($userJoined) + count($userCreated) == 0) {
                echo "<div class='col-md-12' style='text-align: center'>没有任何与您有关的俱乐部</div>";
            } else {
                foreach ($userCreated as $value) {
                    ?>
                    <div class="col-md-4">
                        <div class="smclubItem">
                            <a href="/in_club/clubs/<?= $value['id'] ?>">
                                <h5><span class="clubIcon icon-manager"></span><?= $value['name'] ?></h5>
                            </a>
                        </div>
                    </div>
                    <?php
                }
                foreach ($userJoined as $value) {
                    ?>
                    <div class="col-md-4">
                        <div class="smclubItem">
                            <a href="/in_club/clubs/<?= $value['id'] ?>">

                                <h5><span class="clubIcon icon-member"></span><?= $value['name'] ?></h5>
                            </a>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>

        </div>
    </div>
    <div class="row pageInner">
        <h4>俱乐部动态</h4>
        <div class="row">
            <?php
            if (count($activities) == 0) {
                echo "<div class='row' style='text-align: center'>暂无</div>";
            } else {
                foreach ($activities as $value) {
                    ?>
                    <div class="newsItem row">
                        <div class="col-md-6">
                            <h4><?= $value['clubname'] ?></h4>
                        </div>
                        <div class="col-md-6">
                            <h5><?php
                                switch ($value['type']){
                                    case 'JOIN':
                                        echo "一位新成员加入俱乐部";
                                        break;
                                    case 'LEAVE':
                                        echo "一位成员离开了俱乐部";
                                        break;
                                    case 'PUB':
                                        echo "俱乐部有新公告";
                                        break;
                                    case 'MESSAGE':
                                        echo "俱乐部有新留言";
                                        break;
                                    default:
                                        break;
                                }
                                ?><span class="pull-right"><?= $value['time'] ?></span></h5>

                        </div>
                    </div>
                    <?php
                }
            }
            ?>


        </div>
    </div>

</div>
