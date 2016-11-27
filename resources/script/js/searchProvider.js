/**
 * Created by lin11 on 2016/10/18.
 */
var settings = {
    trigger: 'click',
    width: 500,
    multi: false,
    closeable: true,
    style: '',
    padding: true,
    title: '用户选择',
    content: "<div><div class='row'><div class='col-md-6'><input class='form-control' id='searchName' oninput='search()' placeholder='用户名'></div></div><div class='row'>" +
    "<div class='col-md-7 inPop'><h5>选择区</h5><table class='table table-hover table-condensed'><thead class='invisible'><td width='10%'></td><td></td></thead>" +
    "<tbody id='result'><tr><td></td><td>输入用户名</td></tr></tbody></table></div>" +
    "<div class='col-md-5 inPop'><h5>待邀请</h5><table class='table table-hover table-condensed'><tbody id='selected'></tbody></table></div></div>" +
    "<button class='btn btn-success pull-right' onclick='handleConfirm()'>确认</button></div>"
};
function search() {
    str = $('#searchName').val();
    data = {
        key: str
    };
    $.ajax({
        url: '/user/search_result',
        type: 'post',
        data: data,
        success: function (data) {
            var users = eval(data);
            displaySearch(users);
        },
        error: function () {
            alert(2)
        }
    });
}
function displaySearch(users) {
    var resultBd = $('#result');
    resultBd.empty();
    if (users.length == 0) {
        resultBd.append('<tr><td></td><td>没有结果</td></tr>');
    } else {
        for (var i = 0; i < users.length; i++) {
            var check = '';
            if($('#selected').find('td:contains("'+users[i].username+'")').length>0){
                check = 'checked="checked"';
            }
            resultBd.append('<tr><td><input id="' + users[i].id + '" type="checkbox" '+check+' class="form_control" onclick="toggleResult(this)">' +
                '</td><td><img class="portrait" src="' + users[i].portrait + '"><label for="' + users[i].id + '">' + users[i].username + '</label></td></tr>');
        }
    }
}
function toggleResult(item) {
    var tr = $(item).parents('tr');
    var td = tr.find('td:has(label)');
    var name = td.find('label').text();
    if($('#selected').find('td:contains("'+name+'")').length>0){
        $('#selected').find('tr:contains("'+name+'")').remove();
        var otr = $('#result').find('tr:contains("'+name+'")');
        if(otr.find('input').prop( "checked" )==true){
            otr.find('input').prop('checked','');
        }
    }else {
        var ntr = $('<tr></tr>');
        ntd = td.clone();
        ntd.find('label').each(function () {
            $(this).attr('name',$(this).attr('for'));
        });
        ntd.find('label').attr('for','null');
        ntd.on('click',function () {
            toggleResult(this);
        });
        ntr.append(ntd);
        $('#selected').append(ntr);
    }
}
function getSelectedId() {
    var ids = [];
    $('#selected').find('label').each(function () {
        ids.push($(this).attr('name'));
    });
    return ids;
}

$(function () {
    $('.searchStarter').webuiPopover(
        $.extend({}, settings));
});