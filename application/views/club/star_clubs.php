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
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="height: 200px;">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="" alt="...">
                    <div class="carousel-caption">
                    </div>
                </div>
                <div class="item">
                    <img src="" alt="...">
                    <div class="carousel-caption">
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="row pageInner">
        <div class="row switchs">
            <div class="col-md-10 filter">
                <span>筛选：</span>
                <select class="province cxselect cxselect-sm form-control"
                        data-first-title="-选择省-" title="province" id="province" onchange="screenClub()"></select>
                <select class="city cxselect cxselect-sm form-control"
                        data-first-title="-选择市-" title="city" id="city" onchange="screenClub()"></select>
                <select class="cxselect cxselect-sm form-control" id="type" onchange="screenClub()">
                    <option value="1" style="color: #b6b6b6" disabled selected>-选择类型-</option>
                    <?php
                    foreach($clubTypes as $value){
                        ?>
                        <option><?=$value?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row" id="clubList">

        </div>
    </div>
</div>
