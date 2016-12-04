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

<!-- banner开始 -->
    <div id="banner">
 		<div class="pica">
 			<ul>
 				<li style="display:block;" ><a href=""><img src="<?php echo (IMG_HOME_URL); ?>banner1.png"></a></li>
 				<li ><a href=""><img src="<?php echo (IMG_HOME_URL); ?>banner2.png" ></a></li>
 				<li><a href=""><img src="<?php echo (IMG_HOME_URL); ?>banner3.png" ></a></li>
 				<li><a href=""><img src="<?php echo (IMG_HOME_URL); ?>banner4.png" ></a></li>
 			</ul>
 		</div>
 		<!-- 小圆点 -->
		<div class="tab">
			<ul>
				<li class="on"></li>
				<li></li>
				<li></li>
				<li></li>
			</ul>
		</div>
		<!-- 左右按钮 -->
		<div class="btn">
			<div  id="leftBtn">&lt;</div>
			<div id="rightBtn">&gt;</div>
		</div>
    </div>
<!-- banner结束 -->
<!-- 主内容部分开始 -->
	<div id="content" class="clearfix">
	    <div class="main">
		<!-- 今日推荐 最新排行-->
			<div class="todaynew content_div clearfix">
				<div class="today content_left border">
					<div class="left_top">
						<p class="fl" >
						   <img src="<?php echo (IMG_HOME_URL); ?>11.png" height="56">
						   <span>今日推荐</span><img src="<?php echo (IMG_HOME_URL); ?>jiao.png" height="56">
						</p>
						<div class="tab">
							<ul>
								<li class="on"></li>
								<li></li>
								<li></li>
							</ul>
						</div>
						<p class="fr more"><a href="<?php echo u('Index/tuijian');?>">更多&nbsp;&gt;&gt;</a></p>
					</div>
					<div class="left_bottom">
						<div class="list">
							<ul>
							<?php if(is_array($info1)): foreach($info1 as $key=>$v): ?><li>
									<h4><?php echo ($v["yuming_name"]); ?></h4>
									<div class="price">
										<p><?php echo ($v["yuming_introduce"]); ?></p>
										<p>价格：<strong>￥<?php echo ($v["yuming_xiaoshou_price"]); ?></strong></p>
										<h3><a href="<?php echo u('User/price',array('yuming_id'=>$v['yuming_id'],'cat_id'=>$v['cat_id']));?>">报价</a></h3>
									</div>
								</li><?php endforeach; endif; ?>
							</ul>
							<ul>
							<?php if(is_array($info2)): foreach($info2 as $key=>$v): ?><li>
									<h4><?php echo ($v["yuming_name"]); ?></h4>
									<div class="price">
										<p><?php echo ($v["yuming_introduce"]); ?></p>
										<p>价格：<strong>￥<?php echo ($v["yuming_xiaoshou_price"]); ?></strong></p>
										<h3><a href="<?php echo u('User/price',array('yuming_id'=>$v['yuming_id'],'cat_id'=>$v['cat_id']));?>">报价</a></h3>
									</div>
								</li><?php endforeach; endif; ?>
							</ul>
							<ul>
								<?php if(is_array($info3)): foreach($info3 as $key=>$v): ?><li>
									<h4><?php echo ($v["yuming_name"]); ?></h4>
									<div class="price">
										<p><?php echo ($v["yuming_introduce"]); ?></p>
										<p>价格（万）：<strong>￥<?php echo ($v["yuming_xiaoshou_price"]); ?></strong></p>
										<h3><a href="<?php echo u('User/price',array('yuming_id'=>$v['yuming_id'],'cat_id'=>$v['cat_id']));?>">报价</a></h3>
									</div>
								</li><?php endforeach; endif; ?>
							</ul>
						</div>
					</div>
				</div>
				<div class="new content_right border">
					<div class="left_top">
						<p class="fl" >
						   <img src="<?php echo (IMG_HOME_URL); ?>1.png" height="38">
						   <span>新米排行</span>
						</p>
					</div>
					<div class="left_bottom">
					<?php if(is_array($info5)): foreach($info5 as $key=>$v): ?><p>
							<i class="ii"></i><a href="<?php echo u('User/price',array('yuming_id'=>$v['yuming_id']));?>" title="<?php echo ($v["yuming_name"]); ?>"><?php echo ($v["yuming_name"]); ?></a>
							<span title="<?php echo ($v["yuming_introduce"]); ?>"><?php echo ($v["yuming_introduce"]); ?></span>
							<span style="font-size: 18px;font-weight: bold;color: red;">￥<?php echo ($v["yuming_xiaoshou_price"]); ?></span>
						</p><?php endforeach; endif; ?>
					</div>
			    </div>
			</div>
        <!-- 一口价，最近交易 -->
            <div class="pricesdeal content_div clearfix">
				<div class="prices content_left border">
					<div class="left_top">
						<p class="fl" >
						   <img src="<?php echo (IMG_HOME_URL); ?>12.png" height="56">
						   <span>一口价域名</span><img src="<?php echo (IMG_HOME_URL); ?>jiao.png" height="56">
						</p>
						<div class="tab">
							<ul>
								<li class="on"></li>
								<li></li>
								<li></li>
							</ul>
						</div>
						<p class="fr more"><a href="/index.php/home/Index/yikou">更多&nbsp;&gt;&gt;</a></p>
					</div>
					<div class="left_bottom">
						<div class="list">
							<ul>
							<?php if(is_array($info41)): foreach($info41 as $key=>$v): ?><li>
									<h4><?php echo ($v["yuming_name"]); ?></h4>
									<div><?php echo ($v["yuming_introduce"]); ?></div>
									<a href="<?php echo u('User/price',array('yuming_id'=>$v['yuming_id'],'cat_id'=>$v['cat_id']));?>">价格：<strong>￥&nbsp;<?php echo ($v["yuming_xiaoshou_price"]); ?></strong></a>
								</li><?php endforeach; endif; ?>
							</ul>
							<ul>
							<?php if(is_array($info42)): foreach($info42 as $key=>$v): ?><li>
									<h4><?php echo ($v["yuming_name"]); ?></h4>
									<div><?php echo ($v["yuming_introduce"]); ?></div>
									<a href="<?php echo u('User/price',array('yuming_id'=>$v['yuming_id'],'cat_id'=>$v['cat_id']));?>">价格：<strong>￥&nbsp;<?php echo ($v["yuming_xiaoshou_price"]); ?></strong></a>
								</li><?php endforeach; endif; ?>
							</ul>
							<ul>
							<?php if(is_array($info43)): foreach($info43 as $key=>$v): ?><li>
									<h4><?php echo ($v["yuming_name"]); ?></h4>
									<div><?php echo ($v["yuming_introduce"]); ?></div>
									<a href="<?php echo u('User/price',array('yuming_id'=>$v['yuming_id'],'cat_id'=>$v['cat_id']));?>">价格：<strong>￥&nbsp;<?php echo ($v["yuming_xiaoshou_price"]); ?></strong></a>
								</li><?php endforeach; endif; ?>
							</ul>
						</div>
					</div>
				</div>
				<div class="deal content_right border">
					<div class="left_top">
						<p class="fl" >
						   <img src="<?php echo (IMG_HOME_URL); ?>2.png" height="38">
						   <span>最近成交</span>
						</p>
					</div>
					<div class="left_bottom">
					  <?php if(is_array($info10)): foreach($info10 as $key=>$v): ?><span><?php echo ($v["yuming_name"]); ?></span><?php endforeach; endif; ?>
					</div>
			    </div>
			</div>
        <!-- 议价，分类 -->
	        <div class="talkclassify content_div clearfix">
				<div class="talk content_left border">
					<div class="left_top">
						<p class="fl" >
						   <img src="<?php echo (IMG_HOME_URL); ?>13.png" height="56">
						   <span>议价域名</span><img src="<?php echo (IMG_HOME_URL); ?>jiao.png" height="56">
						</p>
					</div>
					<div class="left_bottom">
						<table border="0" >
		        			<thead>
		        				<th>域名</th>
		        				<th>价格</th>
		        				<th>含义</th>
		        				<th></th>
		        			</thead>
		        			<tbody id='houzhuiinfo_table'>
		        			  <tr style="width: 0;height: 0"></tr>
		        			  <?php if(is_array($info100)): foreach($info100 as $key=>$v): ?><tr>
		        					<td><?php echo ($v["yuming_name"]); ?></td>
		        					<td>议价</td>
		        					<tds style="width: 150px"><?php echo ($v["yuming_introduce"]); ?></td>
		        					<td><a class="xq" href="<?php echo u('User/price',array('yuming_id'=>$v['yuming_id']));?>">详情</a></td>
		        				</tr><?php endforeach; endif; ?>
		        			</tbody>	
		        		</table>
		        		<!-- 分页 -->
		        		<div class="pagination" id="Pagination">
		        			分页
		        		</div>
					</div>
				</div>
<input type='hidden' id='yumingtotal' value='<?php echo ($yumingtotal); ?>' />
<script type="text/javascript">
    $(function(){
    	(function() {
		    var num_entries = $("#yumingtotal").val();
		    //alert(num_entries);
		    // 创建分页
		    $("#Pagination").pagination(num_entries, {
		      num_edge_entries: 1, //边缘页数
		      num_display_entries: 4, //主体页数
		      callback: pageselectCallback,
		      items_per_page:8 //每页显示1项
		    });
		   })();
		    function pageselectCallback(page_index, jq){
		      $.ajax({
		       url:"/index.php/home/Index/getyuming",
		       data:{'page_index':page_index},
		       dataType:'json',
		       type:'get',
		       success:function(msg){
		       //console.log(msg);
		           var s = "";
		                  $.each(msg,function(n,v){
		                  	  var yuming =  v.yuming_xiaoshou_price;
		                  	  var yuming_xiaoshou_price = v.yuming_xiaoshou_price =='0'?'议价':(yuming);
		                      s +=' <tr><td style="color:#000;">'+v.yuming_name+'</td><td style="color:#ff5d15;">'+yuming_xiaoshou_price+'</td><td style="color:#000;">'+v.yuming_introduce+'</td><td><a class="xq" href="/index.php/Home/User/price/yuming_id/'+v.yuming_id+'">详情</a></td></tr>';
		                     });
		                    $('#houzhuiinfo_table tr:gt(0)').remove();
		                    $('#houzhuiinfo_table').append(s);  
		        }
		      });
		    }
      }); 	
 </script>

				<div class="classify content_right border">
					<div class="left_top">
						<p class="fl" >
						   <img src="<?php echo (IMG_HOME_URL); ?>3.png" height="38">
						   <span>域名类型</span>
						</p>
					</div>
					<div class="left_bottom">
						<div>
							<h3>后缀</h3>
							  <?php if(is_array($info11)): foreach($info11 as $key=>$v): ?><p><a href="/index.php/home/Index/find/houzhui_id/<?php echo ($v["houzhui_id"]); ?>"><?php echo ($v["houzhui_name"]); ?></a></p><?php endforeach; endif; ?>
						</div>
						<div>
							<h3>纯数字</h3>
							  <?php if(is_array($info7)): foreach($info7 as $key=>$v): ?><p><a href="/index.php/home/Index/find/cat_id/<?php echo ($v["cat_id"]); ?>"><?php echo ($v["cat_name"]); ?></a></p><?php endforeach; endif; ?>
						</div>
						<div>
							<h3>纯字母</h3>
							  <?php if(is_array($info8)): foreach($info8 as $key=>$v): ?><p><a href="/index.php/home/Index/find/cat_id/<?php echo ($v["cat_id"]); ?>"><?php echo ($v["cat_name"]); ?></a></p><?php endforeach; endif; ?>
						</div>
						<div>
							<h3>杂米</h3>
							  <?php if(is_array($info9)): foreach($info9 as $key=>$v): ?><p><a href="/index.php/home/Index/find/cat_id/<?php echo ($v["cat_id"]); ?>"><?php echo ($v["cat_name"]); ?></a></p><?php endforeach; endif; ?>
						</div>
					</div>
			    </div>
			</div>
		</div>
	</div>
<!-- 主内容部分结束 -->

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