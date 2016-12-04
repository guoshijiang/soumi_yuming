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
<link rel="stylesheet" type="text/css" href="<?php echo (CSS_HOME_URL); ?>password.css">
<!-- 验证身份开始 -->
	<div id="prove">
		<h3>验证身份</h3>
		<form name="form1" action="" method="post">
			<input type="text" name="phone" placeholder="请输入手机号" />
			<input class="yan" type="text" name="chknumber" placeholder="请输入右侧验证码" /> 
			<img src="/index.php/home/user/verifyImg" id="safecode" onclick="this.src=this.src+'/'+Math.random()" width="100" height="45" style="margin:20px 0px; vertical-align: middle;"  >
			<input  class="btn" type="submit" value="验证" />
		</form>
	</div>
<!-- 验证身份结束 -->

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