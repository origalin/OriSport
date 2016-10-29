/**
 * Created by lin11 on 2016/10/11.
 */
$('.sign > a').on('click',function () {
    if ($('.form-signin').is(':hidden')){
        $('.form-signup').fadeOut(200,function () {
            $('.form-signin').fadeIn(200);
            $('.sign > a').text('没有帐号？sign up!');
        });
    }else {
        $('.form-signin').fadeOut(200,function () {
            $('.form-signup').fadeIn(200);
            $('.sign > a').text('已有帐号？sign in!');
        });

    }

});