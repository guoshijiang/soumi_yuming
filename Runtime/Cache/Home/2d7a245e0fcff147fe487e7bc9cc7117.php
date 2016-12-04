<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html >
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name= "Keywords" content="搜米,soumi,域名购买,域名,域名被墙,优质域名,whois查询,ip查询,议价域名,域名资讯,域名中介,域名经纪,域名担保交易,域名代购,海外域名代购">
  <meta name="description" content="搜米网旨在建立中国安全、高效、简单的域名交易体系，为用户提供最优质的服务。为广大的投资者建立便捷的展示、投资、转让渠道；协助企业用户寻找心仪合适的域名，为企业建立更高的起点、发展保护品牌更完善。">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="renderer" content="webkit">
  <meta name="viewport" content="width=1250">
  <title>域名交易,优质域名,议价域名,域名出售,一口价域名 - soumi.com</title>
  <link rel="stylesheet" type="text/css" href="<?php echo (CSS_HOME_URL); ?>reset.css">
  <link rel="stylesheet" type="text/css" href="<?php echo (CSS_HOME_URL); ?>index.css">
  <link rel="stylesheet" type="text/css" href="<?php echo (CSS_HOME_URL); ?>publie.css">
  <script type="text/javascript" src="<?php echo (JS_HOME_URL); ?>jquery-1.12.1.min.js"></script>
  <script type="text/javascript" src="<?php echo (JS_HOME_URL); ?>index.js"></script>
  <script type="text/javascript" src='<?php echo (PLUGIN_URL); ?>jquerypage/jquery-page.js'></script>
  <link rel="stylesheet" type="text/css" href="<?php echo (CSS_HOME_URL); ?>page.css">
</head>
<body>
<!-- 顶部开始 -->
  <div id="top">
    <div class="main">
      <div class="left fl">
       <span>欢迎您的到来！</span>
      </div>
      <div class="right fr">
        <?php if(!empty($_SESSION['user_name'])): ?><span><a class="users" href="<?php echo U('User/message');?>"><?php echo (session('user_name')); ?></a></span>
          <span><a class="out" href="<?php echo U('User/logout');?>">退出</a></span>
        <?php else: ?>
          <a class="right_a" href="<?php echo U('User/login');?>">登录</a>
          <i>|</i>
          <a class="right_a" href="<?php echo U('User/register');?>">注册</a><?php endif; ?>
          <i>|</i>
          <a href="javascript:;">020-8523-9999</a>
        <div class="guide">
          <img src="<?php echo (IMG_HOME_URL); ?>sanjiaot.png">
          <ul>
            <li><a href="<?php echo U('User/message');?>?focus=0">个人信息</a></li>
            <li><a href="<?php echo U('User/message');?>?focus=1">我的报价</a></li>
            <li><a href="<?php echo U('User/message');?>?focus=2">账户安全</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
<!-- 顶部结束 -->
<!-- 导航开始 -->
   <div id="nav">
    <div class="main">
      <div class="logo fl" style="height: 90px;"><a href="<?php echo U('Index/index');?>"><img src="<?php echo (IMG_HOME_URL); ?>logo.png" alt=""></a></div>
      
      <div class="nav_left fl" style="height: 90px;" >
        <ul>
          <li><a class="hover" href="<?php echo U('Index/index');?>">首页</a></li>
          <li><a href="<?php echo u('Index/find');?>">域名查找</a></li>
          <li><a href="<?php echo u('Index/tuijian');?>">推荐域名</a></li>
          <li><a href="<?php echo u('Index/jiaoyi');?>">交易案例</a></li>
          <li><a href="<?php echo u('Index/wall');?>">被墙与否</a></li>
        </ul>
      </div>
      <div class="ss fr">
        <form action="/index.php/home/Index/whois" method="post">
          <input type="text" name="yumingname" style="width: 166px;" placeholder="请输入域名,如：soumi.com" /><input class="btn" type="submit" value="whois查询" />
        </form>
      </div>
    </div>
   </div>
<!-- 导航结束 -->
<link rel="stylesheet" type="text/css" href="<?php echo (CSS_HOME_URL); ?>find.css">
<!-- 域名查找开始 -->
	<div id="find">
		<div class="main">
		 	<div class="top">
		 		<img src="<?php echo (IMG_HOME_URL); ?>find.png" height="65"><span>域名查找</span>
		 	</div>
		 	<div class="choose">
		 	  <form action="/index.php/Home/Index/find/cat_id/43/cat_id/52/cat_id/51/cat_id/32" method="post">
		 		<div class="choose_top">
		 			<i></i><span>域名关键字：</span>
		 			    <input type="text" class="txt " placeholder="请输入搜索关键字" id="yuming_name" name="yuming_name" value="" />
		 			<input type="button" class="btn" id="button" onclick="search()" value="搜索" />
		 		</div>
		 	  </form>
		 		<div class="choose_bottom">
		 		    <p>
		 			    <span class="cd-title">后缀：</span>
		 			    <span class="cd-sp t"><a href="javascript:;"  value='0' >不限</a></span>
		 			     <?php if(is_array($info11)): foreach($info11 as $key=>$v): ?><span class="cd-sp t"><a href="javascript:;"  value='<?php echo ($v["houzhui_id"]); ?>' ><?php echo ($v["houzhui_name"]); ?></a></span><?php endforeach; endif; ?>
		 			</p>
		 			<p style="display: inline-block;*display:inline;*zoom:1;vertical-align: top;">
		 			  <span class="cd-title">类型：</span>
		 		      <span class="cd-sp tt "><a href="javascript:;"  value='0' >不限</a></span>
		 			</p>
		 			<div id="classification">
		 				<?php if(is_array($infoA)): foreach($infoA as $key=>$v): ?><p>   
				 		        <span class="cd-sp tt "><a href="javascript:;"  value='<?php echo ($v["cat_id"]); ?>' ><?php echo ($v["cat_name"]); ?></a></span>
				 		        <?php if(is_array($infoB)): foreach($infoB as $key=>$vv): if(($vv["cat_pid"]) == $v["cat_id"]): ?><span class="cd-sp tt"><a href="javascript:;"   value='<?php echo ($vv["cat_id"]); ?>' ><?php echo ($vv["cat_name"]); ?></a></span><?php endif; endforeach; endif; ?>
				 			</p><?php endforeach; endif; ?>
		 			</div>
                    
		 		</div>
		 	</div>
		 	<div class="choosed">
			 	<span class="fl"><i></i>当前条件：默认排序&nbsp;&nbsp;<em style="font-size: 20px">|</em>&nbsp;&nbsp;搜索:<span id="sousuo" class="red">无</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;后缀:<span id="houzhui" class="red">不限</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;类型:<span id="cat" class="red">不限</span></span>
		        <span class="fr">有<strong style="color: red" id="zongshu"></strong>条满足条件的结果</span>		
		 	</div>
		 	<div class="bodys">
			 	<div style="height: 550px;overflow: hidden;">
			 		<table border="0" >
	        			<thead>
	        				<th>域名</th>
	        				<th>价格</th>
	        				<th>含义</th>
	        				<th></th>
	        			</thead>
	        			<tbody id='houzhuiinfo_table'>
	        			    <tr style="width: 0;height: 0"></tr>
	        			    <?php if(is_array($catinfo1)): foreach($catinfo1 as $key=>$v): ?><tr>
			        		       <td><i></i><?php echo ($v["yuming_name"]); ?></td>
			        			   <td><?php echo ($v["yuming_xiaoshou_price"]); ?></td>
			        			   <td><?php echo ($v["yuming_introduce"]); ?></td>
			        			   <td><a class="lookxq"  href="<?php echo u('User/price',array('yuming_id'=>$v['yuming_id']));?>">查看详情</a></td>
		        			  </tr><?php endforeach; endif; ?>
	        			</tbody>	
		            </table>
		        </div>
			    <div id="Pagination" class="pagination">
		          <!-- 这里显示分页 -->
		        </div>
		 	</div>
		</div>
	</div>
<script type="text/javascript">
  var houzhui_id=0;
  var cat_id =0;
  var yuming_name ;
  var sousuo  = document.getElementById("sousuo");
  var houzhui = document.getElementById("houzhui");
  var cat     = document.getElementById("cat");
  function search(){
  	 yuming_name = document.getElementById("yuming_name").value;
  	 sousuo.innerHTML = yuming_name;
  	 ss();
  	 document.getElementById("yuming_name").value = "";
  }
  var cat_id10  = $(".tt a");
   cat_id10.click(function(){
       cat_id = $(this).attr("value");
       cat_name = $(this).text();
      cat.innerHTML = cat_name;
       ss();
   });
  var houzhui_id2  = $(".t a");
  houzhui_id2.click(function(){
      houzhui_id = $(this).attr("value");
      houzhui_name = $(this).text();
      houzhui.innerHTML = houzhui_name;
       ss();
  });
 var num_entries;
 var aa;
 var zongshu= document.getElementById("zongshu");
 function ss(){
   $.ajax({
	       url:"/index.php/home/Index/find3",
	       data:{'houzhui_id':houzhui_id,'cat_id':cat_id,'yuming_name':yuming_name},
	       dataType:'json',
	       type:'get',
	       success:function(msg){
	       	 var arr1 = msg.split(',');
             num_entries = arr1[0];
             aa          = arr1[1];
             zongshu.innerHTML = aa;
	         arr1.splice(0,2);
	       	 yuming_ids = arr1.join();
	       	  ajs();    	  	
	  }
   });
 }

 function ajs(){
    (function() {
		    $("#Pagination").pagination(num_entries, {
	          num_edge_entries: 1, //边缘页数
	          num_display_entries: 4, //主体页数
	          callback: pageselectCallback,
	          items_per_page:11 //每页显示1项
	        });
	    })(); 
	   function pageselectCallback(page_index, jq){
	      $.ajax({
	       url:"/index.php/home/Index/findyuming",
	       data:{'page_index':page_index,'yuming_ids':yuming_ids},
	       dataType:'json',
	       type:'get',
	       success:function(msg){
	           var s = "";
	                  $.each(msg,function(n,v){
	                  var yuming =  v.yuming_xiaoshou_price;
                  	  var yuming_xiaoshou_price = v.yuming_xiaoshou_price =='0'?'议价':(yuming);
	                  s +='<tr><td class = "find_name"><i></i>'+v.yuming_name+'</td><td class="td_price">'+yuming_xiaoshou_price+'</td><td>'+v.yuming_introduce+'</td><td><a class="lookxq" href="/index.php/Home/User/price/yuming_id/'+v.yuming_id+'">查看详情</a></td></tr>';
	                     });
	                    $('#houzhuiinfo_table tr:gt(0)').remove();
	                    $('#houzhuiinfo_table').append(s);  
	          }
	       });
	   }
   }
  ss();
</script>


<!-- 脚步开始 -->
  <div id="footer">
    <div class="main clearfix">
      <ul>
              <li>
                <h2><img src="<?php echo (IMG_HOME_URL); ?>4.png"><span>关于我们</span></h2>
                <a href="<?php echo u('Index/about');?>?focus=1">搜米简介</a><br/>
                <a href="<?php echo u('Index/about');?>?focus=2">技术团队</a>
              </li>
              <li>
                <h2><img src="<?php echo (IMG_HOME_URL); ?>5.png"><span>帮助中心</span></h2>
                <a href="<?php echo U('User/register');?>">账号绑定</a><br/>
                <a href="<?php echo u('Index/about');?>?focus=4">如何购卖域名</a>
              </li>
              <li>
                <h2><img src="<?php echo (IMG_HOME_URL); ?>6.png"><span>服务与支持</span></h2>
                <a href="<?php echo U('User/login');?>">付款方式</a><br/>
                <a href="<?php echo u('Index/about');?>">服务热线</a>
              </li>
              <li class="weima">
                <h2><img src="<?php echo (IMG_HOME_URL); ?>7.png"><span>关注微信</span></h2>
                <img width="120" height="110" src="<?php echo (IMG_HOME_URL); ?>weima.jpg">
              </li>
            </ul>
    </div>
    <div class="footer_bottom">
      <div class="foot_content">
        <p style="padding-top: 30px;">
          <a href="https://www.baidu.com/s?wd=www.soumi.com@v" target="_blank"><i class="icon1">&nbsp;</i></a>
          <a href="http://v.pinpaibao.com.cn/authenticate/cert/?site=www.soumi.com&at=realname" target="_blank" style="margin-right: 9px"><img src="<?php echo (IMG_HOME_URL); ?>foot2.png" width="124" height="47"></a>
          <a href="javascript:void(0)" target="_blank"><i class="icon3">&nbsp;</i></a>
          <a href="http://www.miitbeian.gov.cn/" target="_blank"><i class="icon4">&nbsp;</i></a>
        </p>
        <p>© 2015-2016 搜米网络（厦门）科技有限公司 All Rights Reserved&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a target="_blank" href="http://www.miitbeian.gov.cn/">粤ICP备11097544号-5</a>
        </p>
        <p style="padding-bottom: 50px;">友情链接：<a href="http://www.009.com/" target="_blank">009中介机构</a></p>
      </div>
    </div>
  </div>
<!-- 脚步结束 -->
<!-- 固定导航部分开始 -->
  <div id="fix">
    <div id="phone" class="fixedNav">
      <a href=""><img src="<?php echo (IMG_HOME_URL); ?>8.png"><p>电话</p></a>
      <div class="number show">
        <p>服务热线：</p>
        <p>020-85239999</p>
        <span></span>
      </div>  
    </div>
    <div id="weixin" class="fixedNav">
      <a href=""><img src="<?php echo (IMG_HOME_URL); ?>9.png"><p>微信</p></a>
      <div class="number show">
        <img src="<?php echo (IMG_HOME_URL); ?>weima.jpg" width="130" height="130">
        <span></span>
      </div> 
    </div>
    <div id="qq" class="fixedNav">
      <a href="<?php echo u('Index/about');?>"><img src="<?php echo (IMG_HOME_URL); ?>10.png"><p>QQ</p></a>
    </div>
  </div>
<!-- 固定导航部分结束 -->
</body>
</html>