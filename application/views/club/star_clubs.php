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
        <div class="row">
            <div class="clubFilter">
                <div class="col-md-6 col-xs-8 filter">
                    <span>筛选：</span>
                    <select class="province cxselect cxselect-sm form-control"
                            data-first-title="选择省" title="province"></select>
                    <select class="city cxselect cxselect-sm form-control"
                            data-first-title="选择市" title="city"></select>
                    <select class="type cxselect cxselect-sm form-control"
                            data-first-title="类型" title=""></select>
                </div>
               <script>
                    $.cxSelect.defaults.url = '/scrips/json/cityData.min.json';
                    $('.filter').cxSelect({
                        selects : [ 'province', 'city' ],
                        nodata : 'none'
                    });
                </script>
            </div>
        </div>
        <div class="row clubList">
            <div class="bNewsItem row">
                <div class="col-md-5">
                    <h3><a href="/pages/in_club/">XXX俱乐部</a></h3>
                    <div class="pull-left">山西 太原</div>
                    <div class="pull-right">篮球</div>
                </div>
                <div class="col-md-4">
                </div>
                <div class="col-md-3">
                    <h3>1000人</h3>
                </div>
            </div>
        </div>
    </div>
</div>
