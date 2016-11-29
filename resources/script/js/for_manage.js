/**
 * Created by lin11 on 2016/11/28.
 */
function searchUser() {
    searchInOne('user', $('#searchUser').val());
}
function searchClub() {
    searchInOne('club', $('#searchClub').val());
}
function searchRace() {
    searchInOne('race', $('#searchRace').val());
}
function searchInOne(type, key) {
    var word = '';
    var display;
    switch (type) {
        case 'user':
            word = '/user/';
            display=displayUser;
            break;
        case 'race':
            word = '/race/';
            display=displayRace;
            break;
        case 'club':
            word = '/club/';
            display = displayClub;
            break;
        default:
            break;
    }
    var theKey = {
        key: key
    };
    $.ajax({
        url: word + 'search_result',
        type: 'post',
        data: theKey,
        success: function (data) {
            display(eval(data));
        },
        error: function () {

        }
    });

}
function displayUser(data) {
    $('#userTb').empty();
    if(data.length==0){
        $('#userTb').append('<tr><td></td><td>没有结果</td><td></td></tr>');
    }
    for (var i = 0; i < data.length; i++) {
        $('#userTb').append('<tr><td><img class="portrait" src="' + data[i].portrait + '"><a href="/people/his_data/'+data[i].id+'">'+data[i].username+'</a></td><td>'+data[i].createday+'</td><td>'+data[i].point+'</td></tr>');
    }
}
function displayClub(data) {
    $('#clubTb').empty();
    if(data.length==0){
        $('#clubTb').append('<tr><td></td><td>没有结果</td><td></td></tr>');
    }
    for (var i = 0; i < data.length; i++) {
        $('#clubTb').append('<tr><td><a href="/in_club/clubs/'+data[i].id+'">'+data[i].name+'</a></td><td>'+data[i].createdate+'</td><td>'+data[i].membernum+'</td></tr>');
    }
}
function displayRace(data) {
    $('#raceTb').empty();
    if(data.length==0){
        $('#raceTb').append('<tr><td></td><td>没有结果</td><td></td></tr>');
    }
    for (var i = 0; i < data.length; i++) {
        var type = '';
        switch (data[i].state){
            case 'NOTSTART':
                type = '未开始';
                break;
            case 'RUNNINE':
                type = '进行中';
                break;
            case 'ENDED':
                type = '已结束';
                break;
            default:
                break
        }
        $('#raceTb').append('<tr><td><a href="/race/race_detail/'+data[i].id+'">'+data[i].name+'</a></td><td>'+data[i].starttime+'</td><td>'+type+'</td></tr>');
    }
}
