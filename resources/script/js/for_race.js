/**
 * Created by lin11 on 2016/10/30.
 */
function showMine() {
    $('#join').hide();
    $('#mine').fadeIn();
    $('#showMine').addClass('active');
    $('#showJoin').removeClass('active');
}
function showJoin() {
    $('#mine').hide();
    $('#join').fadeIn();
    $('#showJoin').addClass('active');
    $('#showMine').removeClass('active');
}
function screenRace() {
    var province = $('#province :selected').text();
    var city = $('#city :selected').text();
    var type = $('#type :selected').text();
    //alert(city+province+type);
    var condition = {
        province: province,
        city: city,
        type: type
    };
    if (province.indexOf('-') != -1) {
        delete condition['province'];
    }
    if (city.indexOf('-') != -1 || city == '') {
        delete condition['city'];
    }
    if (type.indexOf('-') != -1) {
        delete condition['type'];
    }
    $.ajax({
        url: '/race/raceList',
        type: 'get',
        data: condition,
        success: function (data) {
            var raceList = eval(data);
            updateRaceField(raceList);
        },
        error: function () {
            alert('出错了，更改无法保存')
        }
    });
}
function updateRaceField(raceList) {
    $('#raceFieldList').empty();
    for (var i = 0; i < raceList.length; i++) {
        $('#raceFieldList').append('<div class="bNewsItem row">' +
            '<div class="col-md-12">' +
            '<div class="row">' +
            '<div class="col-md-8">' +
            '<h3><a href="/race/race_detail/' + raceList[i]["id"] + '">' + raceList[i]["name"] + '</a><span class="tag-sm">' + raceList[i]["type"] + '</span></h3>' +
            '</div>' +
            '</div>' +
            '<div class="row">' +
            '<div class="col-md-12"><p>' + raceList[i]["description"] + '</p></div>' +
            '</div>' +
            '<div class="row">' +
            '<div class="col-md-12 tags"><span class="withIcon"><i class="icon icon-location"></i>' + raceList[i]["province"] + ' ' + raceList[i]["city"] + '</span>' +
            '<span class="withIcon"><i class="icon icon-time"></i>' + raceList[i]["starttime"] + '</span>' +
            '<span class="withIcon"><i class="icon icon-reward"></i>' + raceList[i]["reward"] + '分</span>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>');
    }
}
function joinRace() {
    $.ajax({
        url: window.location.pathname,
        type: 'post',
        data: {
            type:'join'
        },
        success: function (data) {
            location.reload();
        },
        error: function () {
            alert('出错了，更改无法保存')
        }
    });
}
function leaveRace() {
    $.ajax({
        url: window.location.pathname,
        type: 'post',
        data: {
            type:'leave'
        },
        success: function (data) {
            location.reload();
        },
        error: function () {
            alert('出错了，更改无法保存')
        }
    });
}
function endRace(item) {
    var id = $(item).attr('id');
    $.ajax({
        url: window.location.pathname,
        type: 'post',
        data: {
            type:'end',
            winnerid:id
        },
        success: function (data) {
            location.reload();
        },
        error: function () {
            alert('出错了，更改无法保存')
        }
    });
}
function showMap() {
    if($('#map').css('display')=='none'){

    }
    $('#map').toggle();
}
function handleConfirm() {
    var ids = getSelectedId();
    var data = {
        type:'invite',
        ids:ids
    };
    $.ajax({
        url:window.location.pathname,
        type:'post',
        data:data,
        success:function (data) {
            alert('邀请成功');
            location.reload();
        },
        error:function () {

        }
    });
}
$().ready(function() {
    $("#newRace").validate({
        submitHandler: function(form)
        {
            $(form).ajaxSubmit();
        }
    });
});
$(function () {
    if($('#map').length>0){
        var map = new BMap.Map("map");          // 创建地图实例
        var point = new BMap.Point(116.404, 39.915);  // 创建点坐标
        map.centerAndZoom(point, 15);                 // 初始化地图，设置中心点坐标和地图级别
        var top_left_control = new BMap.ScaleControl({anchor: BMAP_ANCHOR_TOP_LEFT});// 左上角，添加比例尺
        var top_left_navigation = new BMap.NavigationControl();  //左上角，添加默认缩放平移控件
        map.addControl(top_left_control);
        map.addControl(top_left_navigation);
        var myGeo = new BMap.Geocoder();
// 将地址解析结果显示在地图上，并调整地图视野
        myGeo.getPoint(address, function (point) {
            if (point) {
                map.centerAndZoom(point, 16);
                map.addOverlay(new BMap.Marker(point));
            }
        }, city);
    }
    if($('#endRace').length>0){
        var trs = '';
        for(var i = 0;i<joiners.length;i++){
            trs+='<tr><td id="'+joiners[i].id+'" onclick="endRace(this)">'+joiners[i].name+'</td></tr>';
        }
        var settings = {
            trigger : 'click',
            width : 300,
            multi : false,
            closeable : true,
            style : '',
            padding : true,
            title : '选择优胜者',
            content : '<div><table class="table table-hover"><thead></thead><tbody>'+trs+'</tbody></table></div>'
        };
        $('#endRace').webuiPopover(
            $.extend({}, settings));
    }
    if($('#winner').length>0){
        $('#winner').find('a').attr('href','/people/his_data/'+winner.id);
        $('#winner').find('a').text(winner.name);
    }
});