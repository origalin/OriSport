<?php
/**
 * Created by PhpStorm.
 * User: lin11
 * Date: 2016/10/11
 * Time: 19:36
 */
?>

<div class="col-md-10 inPage">
    <div class="row pageInner">
        <button onclick="history.go(-1);" class="btn btn-success">返回</button>
    </div>
    <div class="row pageInner">
        <div class="col-md-12">

            <form class="form-horizontal">
                <div class="form-group ">
                    <label for="name" class="col-sm-2 control-label">俱乐部名称</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="name"
                               value="">
                    </div>
                </div>
                <div class="form-group ">
                    <label for="name" class="col-sm-2 control-label">俱乐部城市</label>
                    <div class="col-md-4 col-xs-8 select">
                        <select class="province cxselect form-control"
                                data-first-title="选择省" title="province"></select>
                        <select class="city cxselect form-control"
                                data-first-title="选择市" title="city"></select>
                    </div>
                    <script src="/script/js/jquery.cxselect.min.js"></script>
                    <script>
                        $.cxSelect.defaults.url = '/scrips/json/cityData.min.json';
                        $('.select').cxSelect({
                            selects: ['province', 'city'],
                            nodata: 'none'
                        });
                    </script>
                </div>
                <div class="form-group ">
                    <label for="name" class="col-sm-2 control-label">俱乐部类型</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="privacy">
                            <option id="public">线上</option>
                            <option id="private">线下</option>
                        </select>
                    </div>
                </div>
                <div class="form-group ">
                    <label for="name" class="col-sm-2 control-label">俱乐部介绍</label>
                    <div class="col-sm-4">
                        <textarea class="form-control" id="name"></textarea>
                    </div>
                </div>
                <div class="form-group ">
                    <button type="submit" class="btn btn-success pull-right">确定</button>
                </div>
            </form>
        </div>
    </div>
</div>



