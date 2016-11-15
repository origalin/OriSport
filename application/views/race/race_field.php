<?php
/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/10/11
 * Time: 20:38
 */
?>
<div class="col-md-10 inPage">
    <div class="pageInner">
        <div class="row switchs">
            <div class="col-md-10 filter">
                <span>筛选：</span>
                <select class="province cxselect cxselect-sm form-control"
                        data-first-title="-选择省-" title="province" id="province" onchange="screenRace()"></select>
                <select class="city cxselect cxselect-sm form-control"
                        data-first-title="-选择市-" title="city" id="city" onchange="screenRace()"></select>
                <select class="cxselect cxselect-sm form-control" id="type" onchange="screenRace()">
                    <option value="1" style="color: #b6b6b6" disabled selected>-选择类型-</option>
                    <?php
                    foreach($raceTypes as $value){
                        ?>
                        <option><?=$value?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row" id="raceFieldList">
            <?php
            if (count($raceList) == 0) {
                echo "<div class='bNewsItem row' style='text-align: center'>暂无</div>";
            } else {
                foreach ($raceList as $value) {
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
                                <div class="col-md-12 tag-city"><span class="withIcon"><i
                                            class="icon icon-location"></i><?=$value['province']?> <?=$value['city']?></span>
                                    <span class="withIcon"><i
                                            class="icon icon-deadline"></i><?=$value['endtime']?></span>
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
