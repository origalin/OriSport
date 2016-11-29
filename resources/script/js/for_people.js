/**
 * Created by lin11 on 2016/11/11.
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
function watchHim() {
    $.ajax({
        url: window.location.pathname,
        type: 'post',
        data: {
            type:'watchHim'
        },
        success: function (data) {
            location.reload();
        },
        error: function () {
            alert('出错了，更改无法保存')
        }
    });
}
function unWatch() {
    $.ajax({
        url: window.location.pathname,
        type: 'post',
        data: {
            type:'unWatch'
        },
        success: function (data) {
            location.reload();
        },
        error: function () {
            alert('出错了，更改无法保存')
        }
    });
}
function deleteUser() {
    $.ajax({
        url: window.location.pathname,
        type: 'post',
        data: {
            type:'deleteUser'
        },
        success: function (data) {
            location.href='/manage/user_manage';
        },
        error: function () {
            alert('出错了，更改无法保存')
        }
    });
}