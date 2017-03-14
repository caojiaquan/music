require.config({
    paths:{
        "jquery":'jquery-1.12.4'
    }
});
define(['jquery'],function($){
    function Carousel(){
        this.defaultSettings = {
            // width:520,
            // height:280,
            imgs:[],
            selector:"body",
            tabform:"square",
            arrowsform:"leftBottom",
            speed:600
        };
        this.carouselContainer = $('<div class="carousel-container"></div>');
        this.carouselImgs = $('<div class="carousel-imgs"></div>');
        this.carouselTab = $('<ul class="carousel-tab"></ul>');
        this.carouselPrev = $('<span class="carousel-prev">&lt;</span>');
        this.carouselNext = $('<span class="carousel-next">&gt;</span>');
    };
    Carousel.prototype.init = function(options){
        $.extend(this.defaultSettings,options);
        for(var i=0;i<this.defaultSettings.imgs.length;i++){
            var $li = $('<li></li>')
            $("<img src='"+this.defaultSettings.imgs[i]+"'>").appendTo(this.carouselImgs);
            if(this.defaultSettings.tabform == "square"){
                $li.html(i+1);
            }else{
                $li.addClass("circle");
            }
            $li.appendTo(this.carouselTab);
        };
        if(this.defaultSettings.arrowsform =="leftBottom"){
            this.carouselPrev.addClass("leftBottom");
            this.carouselNext.addClass("leftBottom");
        }else{
            this.carouselPrev.addClass("center");
            this.carouselNext.addClass("center");
        }
        $("li",this.carouselTab).eq(0).addClass("selected");
        $("img",this.carouselImgs).eq(0).addClass("selected");
        //this.carouselContainer.width = this.defaultSettings.width +"px";
        //this.carouselContainer.height = this.defaultSettings.height +"px"

        //console.log(this.defaultSettings.width);
        this.carouselContainer.append(this.carouselImgs).append(this.carouselTab).append(this.carouselPrev).append(this.carouselNext);
        $(this.defaultSettings.selector).append(this.carouselContainer);
       ;
        this.carouselContainer.css("width",this.defaultSettings.width);
        this.carouselContainer.css("height",this.defaultSettings.height);
        var iNow = 0;
        var that = this;
        this.carouselTab.on('mouseover','li',function(){
            iNow = $(this).index();
            changeImg();
        });
        this.carouselPrev.on("click",function(){
            iNow--;
            if(iNow == -1){
                iNow=that.defaultSettings.imgs.length-1;
            }
            changeImg();
        });
        this.carouselNext.on('click',function(){
            iNow++;
            if(iNow == that.defaultSettings.imgs.length){
                iNow=0;
            }
            changeImg();
        });
        function changeImg(){
            $('li',that.carouselTab).eq(iNow).addClass('selected').siblings().removeClass("selected");
            $('img',that.carouselImgs).eq(iNow).addClass('selected').siblings().removeClass("selected");
        };
        this.carouselContainer.hover(function(){
            clearInterval(that.timer);
        },function(){
            show();
        });
        show();
        function show(){
            that.timer = setInterval(function(){
                that.carouselNext.trigger("click");
            },that.defaultSettings.speed)
        };
    }
    return Carousel;
});