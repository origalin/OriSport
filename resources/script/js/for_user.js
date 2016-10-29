/**
 * Created by lin11 on 2016/10/17.
 */
function startBodyEdit(item) {
    $("#bodyData").find('.mayChange').css('display', 'inline');
    $('#bodyData').find('.mayHide').css('display', 'none');
    $(item).parent().append('<button class="glyphicon glyphicon-ok"></button>').append('<button onclick="retrieveBody(this)" class="glyphicon glyphicon-remove"></button>');
    $(item).remove();
}
function startContactEdit(item) {
    $('#contactData').find('.mayChange').css('display', 'inline');
    $('#contactData').find('.mayHide').css('display', 'none');
    $(item).parent().append('<button class="glyphicon glyphicon-ok"></button>').append('<button onclick="retrieveContact(this)" class="glyphicon glyphicon-remove"></button>');
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