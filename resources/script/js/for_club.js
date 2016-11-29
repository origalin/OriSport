/**
 * Created by lin11 on 2016/10/30.
 */
function screenClub() {
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
        url: '/club/clubList',
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
function updateRaceField(clubList) {
    $('#clubList').empty();
    for (var i = 0; i < clubList.length; i++) {
        $('#clubList').append('<div class="bNewsItem row">' +
            '<div class="col-md-12">' +
            '<div class="row">' +
            '<div class="col-md-8">' +
            '<h3><a href="/in_club/clubs/'+clubList[i]["id"]+'">'+clubList[i]["name"]+'</a><span class="tag-sm">'+clubList[i]["type"]+'</span></h3>' +
            '</div>' +
            '</div>' +
            '<div class="row">' +
            '<div class="col-md-12"><p>'+clubList[i]["description"]+'</p></div>' +
            '</div>' +
            '<div class="row">' +
            '<div class="col-md-12 tags"><span class="withIcon"><i class="icon icon-location"></i>'+clubList[i]["province"]+' '+clubList[i]["city"]+'</span>' +
            '<span class="withIcon"><i class="icon icon-memberNum"></i>'+clubList[i]["membernum"]+'人</span>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>');
    }
}
$().ready(function() {
    $("#newCLub").validate({
        submitHandler: function(form)
        {
            $(form).ajaxSubmit();
        }
    });
});
