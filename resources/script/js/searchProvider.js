/**
 * Created by lin11 on 2016/10/18.
 */
var settings = {
    trigger : 'click',
    width : 500,
    multi : false,
    closeable : true,
    style : '',
    padding : true,
    title : '用户选择',
    content : "<div><div class='row'><div class='col-md-6'><input class='form-control' placeholder='用户名'></div></div><div class='row'>" +
    "<div class='col-md-7 inPop'><h5>选择区</h5><table class='table table-hover table-condensed'><thead class='invisible'><td width='10%'></td><td></td></thead>" +
    "<tbody><tr><td><input type='checkbox' class='form_control'></td><td>lili</td></tr><tr><td><input type='checkbox' class='form_control'></td><td>lili</td></tr><tr><td><input type='checkbox' class='form_control'></td><td>lili</td></tr></tbody></table></div>" +
    "<div class='col-md-5 inPop'><h5>待邀请</h5><table class='table table-hover table-condensed'><tbody><tr><td>lili</td></tr><tr><td>lili</td></tr><tr><td>lili</td></tr></tbody></table></div></div></div>"
};

$(function () {
    $('.searchStarter').webuiPopover(
        $.extend({}, settings));
});