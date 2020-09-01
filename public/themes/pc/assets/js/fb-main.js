$(function(){
  new WOW().init();
  
  $(window).scroll(function(){
    var t = $(window).scrollTop();
    if($(".headerBg").hasClass("fixedActive")){
      return false;
    }
    if(t != 0){
      if(!$(".headerBg").hasClass("active")){
        $(".headerBg,header").addClass("active")
      }
    }else{
      $(".headerBg,header").removeClass("active")
    }

    if(t > 100){
      if(!$(".scrollT").hasClass("active")){
        $(".scrollT").addClass("active");
      }
    }else{
      $(".scrollT").removeClass("active");
    }
  })
  //PC导航栏
  $("header ul li").hover(function(){
    $(this).find("dl").stop().slideDown(200)
  },function(){
    $(this).find("dl").stop().slideUp(200)
  })
   //PC语言栏
  $(".lang").hover(function(){
    $(this).find("dl").stop().slideDown(200)
  },function(){
    $(this).find("dl").stop().slideUp(200)
  })
   //H5导航栏
  $(".menu").on("click",function(){
    $("#wap-nav").show();
    setTimeout(function(){
    $(".nav-box").css("right","0");
    },100)
  })
  $("#wap-nav ul li").on("click",function(){
    $("#wap-nav ul li").find("dl").stop().slideUp(200)
    $(this).find("dl").stop().slideToggle(200)
  })
  $(".wapNav-close").on("click",function(){
    
    $(".nav-box").css("right","-4rem");
    setTimeout(function(){
      $("#wap-nav").hide();
    },500)
  })

  //商品筛选
  /*
  $(".screen .one-tab li").on("click",function(){
    $(".screen .three-tab,.screen .four-tab").fadeOut(200);
    $(this).addClass("active").siblings("li").removeClass("active");
    $(".screen .two-tab").fadeIn();

  })
  $(".screen").on("click",".two-tab li",function(){
    $(".screen .four-tab").fadeOut(200);
    $(this).addClass("active").siblings("li").removeClass("active");
    $(".screen .three-tab").fadeIn();


  })
  $(".screen").on("click",".three-tab li",function(){
    $(this).addClass("active").siblings("li").removeClass("active");
    $(".screen .four-tab").fadeIn();
  })
  */

  //学术报告
  $("body").on("click",'.report-list .report-item-type',function(){
      $(this).parents(".report-item").toggleClass("active").find("ul").slideToggle(500);
  })

  //返回顶部
  $(".scrollT").on("click",function(){
    $("body,html").animate({
      scrollTop:0
    },200)
  })
  //显示二维码
  $(".fixed-nav-item-code").hover(function(){
    $(this).find(".code-img").fadeIn(200)
  },function(){
    $(this).find(".code-img").fadeOut(200)
  })
  //显示搜索
  $(".fixed-nav-item-search").on("click",function(){
    $(".fixed-search").fadeIn(200)
  })
  $(".fixed-search-close").on("click",function(){
    $(".fixed-search").fadeOut(200)
  })
  
  
 
})
 //显示加载
  function showLoading(){
	  $(".fb-loading").fadeIn(200);
  }
    //隐藏加载
  function hideLoading(){
	  $(".fb-loading").fadeOut(200);
  }
  
  
   function fbAlert(msg){
	   var html = '<div class="alertBox"><div class="alertBox-b"><div class="msg">'+msg+'</div><div class="alertClose" onclick="$(\'.alertBox\').remove()">关闭</div></div></div>';
	   $("body").append(html);
   }
   
