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
    if (city.indexOf('-') != -1||city=='') {
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
            '<h3><a href="/race/race_detail/'+raceList[i]["id"]+'">'+raceList[i]["name"]+'</a><span class="tag-sm">'+raceList[i]["type"]+'</span></h3>' +
            '</div>' +
            '</div>' +
            '<div class="row">' +
            '<div class="col-md-12"><p>'+raceList[i]["description"]+'</p></div>' +
            '</div>' +
            '<div class="row">' +
            '<div class="col-md-12 tag-city"><span class="withIcon"><i class="icon icon-location"></i>'+raceList[i]["province"]+' '+raceList[i]["city"]+'</span>' +
            '<span class="withIcon"><i class="icon icon-time"></i>'+raceList[i]["starttime"]+'</span>' +
            '<span class="withIcon"><i class="icon icon-reward"></i>'+raceList[i]["reward"]+'分</span>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>');
    }
}