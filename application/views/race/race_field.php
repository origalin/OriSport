<?php
/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/10/11
 * Time: 20:38
 */
?>
<div class="col-md-10 inPage">
    <div class="row pageInner">
        <script type="text/javascript">(function(){document.write(unescape('%3Cdiv id="bdcs"%3E%3C/div%3E'));var bdcs = document.createElement('script');bdcs.type = 'text/javascript';bdcs.async = true;bdcs.src = 'http://znsv.baidu.com/customer_search/api/js?sid=6331899772347957311' + '&plate_url=' + encodeURIComponent(window.location.href) + '&t=' + Math.ceil(new Date()/3600000);var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(bdcs, s);})();</script>
    </div>
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
                    <img src="/resources/img/race_1.png" alt="...">
                    <div class="carousel-caption">
                    </div>
                </div>
                <div class="item">
                    <img src="/resources/img/race_2.png" alt="...">
                    <div class="carousel-caption">
                    </div>
                </div>
                <div class="item">
                    <img src="/resources/img/race_3.png" alt="...">
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
    <div class="pageInner">
        <div class="row switchs">
            <div class="col-md-10 filter">
                <span>筛选：</span>
                <select class="province cxselect cxselect-sm form-control"
                        data-first-title="-选择省-" title="province" id="province" onchange="screenRace()"></select>
                <select class="city cxselect cxselect-sm form-control"
                        data-first-title="-选择市-" title="city" id="city" onchange="screenRace()"></select>
                <select class="cxselect cxselect-sm form-control" id="type" onchange="screenRace()">
                    <option value="1" selected>-全部类型-</option>
                    <?php
                    foreach ($raceTypes as $value) {
                        ?>
                        <option><?= $value ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row" id="raceFieldList">
            <!--            --><?php
            //            if (count($raceList) == 0) {
            //                echo "<div class='bNewsItem row' style='text-align: center'>暂无</div>";
            //            } else {
            //                foreach ($raceList as $value) {
            //                    ?>
            <!--                    <div class="bNewsItem row">-->
            <!--                        <div class="col-md-12">-->
            <!--                            <div class="row">-->
            <!--                                <div class="col-md-8">-->
            <!--                                    <h3><a href="/race/race_detail/--><? //=$value['id']?><!--">-->
            <? //=$value['name']?><!--</a><span class="tag-sm">--><? //=$value['type']?><!--</span></h3>-->
            <!--                                </div>-->
            <!--                            </div>-->
            <!--                            <div class="row">-->
            <!--                                <div class="col-md-12"><p>-->
            <? //=$value['description']?><!--</p></div>-->
            <!--                            </div>-->
            <!--                            <div class="row">-->
            <!--                                <div class="col-md-12 tags"><span class="withIcon"><i-->
            <!--                                            class="icon icon-location"></i>-->
            <? //=$value['province']?><!-- --><? //=$value['city']?><!--</span>-->
            <!--                                    <span class="withIcon"><i-->
            <!--                                            class="icon icon-time"></i>-->
            <? //=$value['starttime']?><!--</span>-->
            <!--                                    <span class="withIcon"><i-->
            <!--                                            class="icon icon-reward"></i>-->
            <? //=$value['reward']?><!--分</span>-->
            <!--                                </div>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                    --><?php
            //                }
            //            }
            //            ?>
        </div>
    </div>
</div>
