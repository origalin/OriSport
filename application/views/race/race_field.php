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

        <div class="row">
            <div class="col-md-6 filter">
                <span>筛选：</span>
                <select class="province cxselect cxselect-sm form-control"
                        data-first-title="选择省" title="province"></select>
                <select class="city cxselect cxselect-sm form-control"
                        data-first-title="选择市" title="city"></select>
            </div>
            <script src="/scrips/js/jquery.cxselect.min.js"></script>
            <script>
                $.cxSelect.defaults.url = '/scrips/json/cityData.min.json';
                $('.filter').cxSelect({
                    selects : [ 'province', 'city' ],
                    nodata : 'none'
                });
            </script>
        </div>
        <div class="row">
            <div class="bNewsItem row">
                <div class="col-md-5 raceHead">
                    <h2><a href="/pages/race/race_detail">星球杯竞赛</a></h2>
                    <div class="pull-left">山西 太原</div>
                    <div class="pull-right">线下：赛跑</div>
                </div>
                <div class="col-md-4 raceBody">
                    <div></div>
                </div>
                <div class="col-md-3 raceTail">
                    <h2><span>礼
                    </span>1000元</h2>
                </div>
            </div>
            <div class="bNewsItem row">
                <div class="col-md-5 raceHead">
                    <h2><a href="/pages/race/race_detail">星球杯竞赛</a></h2>
                    <div class="pull-left">山西 太原</div>
                    <div class="pull-right">线下：赛跑</div>
                </div>
                <div class="col-md-4 raceBody">
                    <div></div>
                </div>
                <div class="col-md-3 raceTail">
                    <h2><span>礼
                    </span>1000元</h2>
                </div>
            </div>
            <div class="bNewsItem row">
                <div class="col-md-5 raceHead">
                    <h2><a href="/pages/race/race_detail">星球杯竞赛</a></h2>
                    <div class="pull-left">山西 太原</div>
                    <div class="pull-right">线下：赛跑</div>
                </div>
                <div class="col-md-4 raceBody">
                    <div></div>
                </div>
                <div class="col-md-3 raceTail">
                    <h2><span>礼
                    </span>1000元</h2>
                </div>
            </div>
        </div>
    </div>
</div>
