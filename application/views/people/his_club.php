<?php
/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/10/17
 * Time: 21:54
 */
?>
<div class="col-md-10 inPage">
    <div class="row pageInner">
        <h4 class="">
            他的俱乐部
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
</div>
