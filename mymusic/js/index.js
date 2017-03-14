/**
 * Created by Administrator on 2017/3/10.
 */
//��λÿһ��ҳ��
var containerWidth = $("#container").width();
$("#container-box").css('width',containerWidth*4);
$(".nav-font").on("click",function(){
    $("#container-box").css({
        //position:"absolute",
        left:(-$(this).index()*containerWidth)
    });
    $(this).addClass("selected").siblings().removeClass("selected");//导航栏的透明度控制
});



