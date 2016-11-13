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