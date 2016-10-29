/**
 * Created by lin11 on 2016/10/18.
 */
$('.newsItem').children().find('h4').on('click',function () {
    $(this).parents('.newsItem').find('.collapse').collapse('toggle');
});