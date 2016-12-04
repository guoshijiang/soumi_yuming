$(function(){
//淡入淡出效果开始 
 //轮播图
  bannerAuto($('#banner .tab li'),$('#banner .pica li'),$('#banner .btn'),$('#banner .btn div'),$('#banner'))
 function bannerAuto($tabLi,$picLi,$btn,$btnDiv,$banner){
 	var index = 0;
    $tabLi.hover(function(){
    index = $(this).index();
    $(this).addClass('on').siblings().removeClass('on');
    $picLi.eq(index).stop(true).fadeIn(800).siblings().stop(true).fadeOut(800);
	  });
	  $banner.hover(function(){
	    $btn.show();
	    clearInterval(timer)
	  },function(){
	    $btn.hide();
	    auto();
	  });
	  $btnDiv.click(function(){
	           var i =$(this).index();
	           if(i){
	            index ++;
	            index%=$tabLi.length;
	           }else{
	            index--;
	            if(index<0)index = $tabLi.length-1;
	           }
	           fn();
	  }).mousedown(function(){
	    return false;//阻止默认事件
	  });
	  auto();
	  function auto(){
	  timer  = setInterval(function(){
	    index ++;
	            index%=$tabLi.length;
	            fn()
	  },2000);
	  }
	  function fn(){
	    $tabLi.eq(index).addClass('on').siblings().removeClass('on');
	        $picLi.eq(index).stop(true).fadeIn(800).siblings().stop(true).fadeOut(800);
	  }
    }
 //淡入淡出效果结束
 //今日推荐轮播图
    contentAuto($('.pricesdeal .prices .left_top .tab li'),$('.pricesdeal .prices .left_bottom .list'), $('.pricesdeal .prices'),'click',$('.pricesdeal .prices .left_bottom .list ul'),5000)
    contentAuto($('.todaynew .today .left_top .tab li'),$('.todaynew .today .left_bottom .list'), $('.todaynew .today'),'click',$('.todaynew .today .left_bottom .list ul'),4000);
    function contentAuto(Stabli,Slist,Sbox,event,Sw,T){
      var index1 = 0;
      var newDate = new Date();
      var timer =null;
      var w = Sw.width();
      //下面的小按钮
      Stabli[event](function(){
        index1  = $(this).index();
        $(this).addClass("on").siblings().removeClass("on");
        Slist.animate({"marginLeft":-w*index1},600);
      });
      Sbox.hover(function(){
           //鼠标移入
        clearInterval(timer);
      },function(){//鼠标移开
        timeAuto();
      })
       timeAuto();
       //自动播放
         function timeAuto(){
            timer = setInterval(function(){
            index1++;
            play();
           },T);
         }
         function play(){
            var aindex =index1;
          if(aindex==Stabli.length){
            aindex=0;
          }else if(aindex<0){
            aindex = Stabli.length;
          }
           Stabli.eq(aindex).addClass("on").siblings().removeClass("on");
           Slist.animate({"marginLeft":-w*index1},600,function(){
            if(index1==Stabli.length){
              Slist.css("marginLeft",0+'px')
              index1 = 0;
            }else if(index1<0){
              Slist.css("marginLeft",-w*(Stabli.length)+'px')
              index1 = Stabli.length;
            }
           });
         }
    };
//右侧固定部分展开收缩开始
  var Tphone = $('#fix .fixedNav');
  var TpS = $('#fix #phone .show');
  var TqS = $('#fix #qq a');
  var TwS = $('#fix #weixin .show');
  Tphone.hover(function(){
    $(this).find('.show').stop().toggle(400);
  });
//右侧固定部分展开收缩结束.parent().siblings().find('.show').stop().hide(400)


// 最新排行图标开始
  var $newi = $('#content .new .left_bottom p .ii');
  //alert($newi.eq(1).html());
  $newi.eq(0).css({
    'background':'url(http://www.shoumi.com/Public/Home/img/1a.png) no-repeat',
    'width':'21px',
    'height':'26px'
  });
  $newi.eq(1).css({
    'background':'url(http://www.shoumi.com/Public/Home/img/2a.png) no-repeat',
    'width':'21px',
    'height':'26px'
  });
  $newi.eq(2).css({
    'background':'url(http://www.shoumi.com/Public/Home/img/3a.png) no-repeat',
    'width':'21px',
    'height':'26px'
  });
  $newi.eq(3).html(4);
  $newi.eq(4).html(5);
  $newi.eq(5).html(6);
  $newi.eq(6).html(7);
  $newi.eq(7).html(8);
  $newi.eq(8).html(9);
  $newi.eq(9).html(10);
// 最新排行图标结束
// 头部导航部分高亮显示开始,使用的是判断当前url与href的是否一致进行样式的改变
  var oLia = $('#nav .nav_left a');
  var urlstr = location.href;
  //alert((urlstr + '/').indexOf($(this).attr('href')));
  var urlstatus=false;
  oLia.each(function () {
    if ((urlstr + '/').indexOf($(this).attr('href')) > -1&&$(this).attr('href')!='') {
      $(this).addClass('hover'); urlstatus = true;
    } else {
      $(this).removeClass('hover');
    }
  });
  if (!urlstatus) {oLia.eq(0).addClass('hover'); }
// 头部导航部分高亮显示结束
//用户信息展示开始
  var User = $('#top .right .users');
  var Guide = $('#top .right .guide');
  var Imgs = $('#top .right .guide img');
  User.hover(function(){
    Guide.stop().toggle(300);
  })
  Guide.hover(function(){
    Guide.stop().toggle(300);
  })
//用户信息展示结束
});