<div class="col-md-10 inPage">
    <div class="row pageInner">
        <button onclick="window.location.href = document.referrer" class="btn btn-success">返回</button>
    </div>
    <div class="row pageInner">
        <div class="col-md-12">

            <form class="form-horizontal">
                <div class="form-group row">
                    <label for="name" class="col-sm-2 control-label">竞赛名称</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="name"
                               value="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 control-label">竞赛地点</label>
                    <div class="col-md-4 select">
                        <select class="province cxselect form-control"
                                data-first-title="选择省" title="province"></select>
                        <select class="city cxselect form-control"
                                data-first-title="选择市" title="city"></select>
                    </div>
                    <script src="/scrips/js/jquery.cxselect.min.js"></script>
                    <script>
                        $.cxSelect.defaults.url = '/scrips/json/cityData.min.json';
                        $('.select').cxSelect({
                            selects: ['province', 'city'],
                            nodata: 'none'
                        });
                    </script>
                </div>
                <link rel="stylesheet" href="/scrips/css/bootstrap-datetimepicker.css">
                <div class="form-group">
                    <label for="deadline" class="col-sm-2 control-label">开始时间</label>
                    <div class="col-sm-4">
                        <div class='input-group date' id='datetimepicker1'>
                            <input type='text' class="form-control" id="deadline"/> <span
                                class="input-group-addon"> <span
                                    class="glyphicon glyphicon-calendar"></span>
						</span>
                        </div>
                    </div>
                </div>
                <script src='/scrips/js/moment-with-locales.js'></script>
                <script src='/scrips/js/bootstrap-datetimepicker.js'></script>
                <script type="text/javascript">
                    $(function () {
                        $('#datetimepicker1').datetimepicker({
                            format: 'YYYY-MM-DD HH:mm',
                            minDate: new Date(),
                            locale: 'zh-cn'
                        });
                    });
                </script>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 control-label">竞赛类型</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="privacy">
                            <option id="public">线上</option>
                            <option id="private">线下</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 control-label">奖励</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="name"
                               value="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 control-label">补充说明</label>
                    <div class="col-sm-4">
                        <textarea class="form-control" id="name"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <button type="submit" class="btn btn-success pull-right">确定</button>
                </div>
            </form>
        </div>
    </div>
</div>



