/**
 * Created by lin11 on 2016/10/30.
 */
$(function () {
    //组件注册
    if($.cxSelect!=undefined){
        $.cxSelect.defaults.url = '/resources/script/json/cityData.min.json';
    }
    if($('.filter')!=undefined){
        $('.filter').cxSelect({
            selects : [ 'province', 'city' ],
            nodata : 'none'
        });
    }
    if($('.select')!=undefined){
        $('.select').cxSelect({
            selects: ['province', 'city'],
            nodata: 'none'
        });
    }
    if($('#datetimepicker1')!=undefined){
        $('#datetimepicker1').datetimepicker({
            format: 'YYYY-MM-DD HH:mm',
            minDate: new Date(),
            locale: 'zh-cn'
        });
    }
});