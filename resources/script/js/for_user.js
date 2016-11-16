/**
 * Created by lin11 on 2016/10/17.
 */
function startBodyEdit(item) {
    $("#bodyData").find('.mayChange').css('display', 'inline');
    $('#bodyData').find('.mayHide').css('display', 'none');
    $(item).parent().append('<button class="glyphicon glyphicon-ok" onclick="updateBody(this)"></button>').append('<button onclick="retrieveBody(this)" class="glyphicon glyphicon-remove"></button>');
    $(item).remove();
}
function startContactEdit(item) {
    $('#contactData').find('.mayChange').css('display', 'inline');
    $('#contactData').find('.mayHide').css('display', 'none');
    $(item).parent().append('<button class="glyphicon glyphicon-ok" onclick="updateContact(this)"></button>').append('<button onclick="retrieveContact(this)" class="glyphicon glyphicon-remove"></button>');
    $(item).remove();
}
function retrieveBody(item) {
    $("#bodyData").find('.mayChange').css('display', 'none');
    $('#bodyData').find('.mayHide').css('display', 'inline');
    var parent=$(item).parent();
    parent.empty();
    parent.append('<button onclick="startBodyEdit(this)" class="glyphicon glyphicon-edit"></button>');
}
function retrieveContact(item) {
    $('#contactData').find('.mayChange').css('display', 'none');
    $('#contactData').find('.mayHide').css('display', 'inline');
    var parent=$(item).parent();
    parent.empty();
    parent.append('<button onclick="startContactEdit(this)" class="glyphicon glyphicon-edit"></button>');
}
function updateBody(item) {
    var weight = $('#weight').val();
    var height = $('#height').val();
    var step_length = $('#step_length').val();
    var data = {
        height:height,
        weight:weight,
        step_length:step_length
    };
    $.ajax({
        url: '/user/userdata',
        type: 'post',
        data: data,
        success: function (data) {
            $('#weight_h').text($('#weight').val());
            $('#height_h').text($('#height').val());
            $('#step_length_h').text($('#step_length').val());
            retrieveBody(item);
        },
        error: function () {
            alert('出错了，更改无法保存')
        }
    });
}
function updateContact(item) {
    var province = $('#province').val();
    var city = $('#city').val();
    var phone = $('#phone').val();
    var email = $('#email').val();
    var hobby = $('#hobby').val();
    var description = $('#description').val();
    var data = {
        province:province,
        city:city,
        phone:phone,
        email:email,
        hobby:hobby,
        description:description
    };
    $.ajax({
        url: '/user/userdata',
        type: 'post',
        data: data,
        success: function (data) {
            $('#place_h').text($('#province').val()+' '+$('#city').val());
            $('#phone_h').text($('#phone').val());
            $('#email_h').text($('#email').val());
            $('#hobby_h').text($('#hobby').val());
            $('#description_h').text($('#description').val());
            retrieveContact(item);
        },
        error: function () {
            alert('出错了，更改无法保存')
        }
    });
}
$('.newsItem').children().find('h4').on('click',function () {
    var item = $(this);
    item.parents('.newsItem').find('.collapse').collapse('toggle');
    if(item.find('.icon-rd').length<=0){
        $.ajax({
            url:'/user/message/'+item.attr('id')+'/read',
            type: 'post',
            success:function (data) {
                item.find('.icon-urd').removeClass('icon-urd').addClass('icon-rd');
            }
        });
    }
});
function deleteMessage(item) {
    var msItem = $(item).parents('.newsItem');
    var id = msItem.find('h4').attr('id');
    $.ajax({
        url:'/user/message/'+id+'/delete',
        type: 'post',
        success:function (data) {
            msItem.remove();
        }
    });
}
function showUser() {
    $('#system').hide();
    $('#user').fadeIn();
    $('#showUser').addClass('active');
    $('#showSystem').removeClass('active');
}
function showSystem() {
    $('#user').hide();
    $('#system').fadeIn();
    $('#showSystem').addClass('active');
    $('#showUser').removeClass('active');
}