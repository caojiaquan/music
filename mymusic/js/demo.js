require.config({
    paths:{
        "jquery":"jquery-1.12.4"
    }
});
require(['jquery','carousel'],function($,Carousel){
    var imgs1 = ['img/6.jpg','img/5.jpg','img/3.jpg','img/4.jpg']
    var settings1 = {
        // width:100%,
        // height:300,
        imgs:imgs1,
        selector:"#banner",
        tabform:"circle",
        arrowsform:"center",
        speed:2000
    };
    var carousel1 = new Carousel();
    carousel1.init(settings1);


    var imgs2 = ['img/6.jpg','img/5.jpg','img/3.jpg','img/4.jpg']
    var settings2 = {
        // width:768,
        // height:300,
        imgs:imgs1,
        selector:"#container-third-banner",
        tabform:"circle",
        arrowsform:"center",
        speed:2000
    };
    var carousel2 = new Carousel();
    carousel2.init(settings2);

});