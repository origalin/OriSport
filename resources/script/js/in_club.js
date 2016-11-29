/**
 * Created by lin11 on 2016/10/19.
 */
$(function () {
    $('#textPanel').wysihtml5();
    $('#publicPanel').wysihtml5();
})
function joinClub() {
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
function leaveClub() {
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
function addChat() {
    var urls = window.location.pathname.split('/');
    var id = urls[urls.length-1];
    var data = {
        contex:$('#textPanel').val()
    }
    $.ajax({
        url: '/in_club/chats/'+id,
        type: 'post',
        data: data,
        success: function (data) {
            location.reload();
        },
        error: function () {
            alert('出错了，更改无法保存')
        }
    });
}
function addPub() {
    var urls = window.location.pathname.split('/');
    var id = urls[urls.length-1];
    var data = {
        contex:$('#publicPanel').val(),
        title:$('#publicTitle').val()
    }
    $.ajax({
        url: '/in_club/pubs/'+id,
        type: 'post',
        data: data,
        success: function (data) {
            location.reload();
        },
        error: function () {
            alert('出错了，更改无法保存')
        }
    });
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
function showModal(item) {
    var pub = $(item);
    var modal = $('#publicModal');
    modal.find('.title').text(pub.find('.title').text());
    modal.find('.modal-body').empty();
    modal.find('.modal-body').append(pub.find('.text').children().clone());
    modal.modal('toggle');
}