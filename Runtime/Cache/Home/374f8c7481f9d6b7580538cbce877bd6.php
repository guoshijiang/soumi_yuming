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
<link rel="stylesheet" type="text/css" href="<?php echo (CSS_HOME_URL); ?>about.css">
<!-- 关于我们开始 -->
	<div id="about">
		<div class="about_img"><img src="<?php echo (IMG_HOME_URL); ?>about.png"></div>
		<div class="main" >
			<ul class="fl about_nav">
				<li class="ons">
					<i></i>
					<a href="javascript:;">联系我们</a>
				</li>
				<li>
					<i></i>
					<a href="javascript:;">公司简介</a>
				</li>
				<li>
					<i></i>
					<a href="javascript:;">技术团队</a>
				</li>
				<li>
					<i></i>
					<a href="javascript:;">隐私保护</a>
				</li>
				<li>
					<i></i>
					<a href="javascript:;">购买域名流程</a>
				</li>
			</ul>
			<div class="subject fl">
				<div class="about_content content show" >
					<h2>联系我们</h2>
					<p><img src="<?php echo (IMG_HOME_URL); ?>tu1.png">服务热线：020-8523-9999</p>
					<p>
						<img src="<?php echo (IMG_HOME_URL); ?>tu3.png">咨询：
						<ul>
							<li>
								<h3>paul</h3>
								<p><img src="<?php echo (IMG_HOME_URL); ?>tu1.png">QQ:1779999</p>
								<p><img src="<?php echo (IMG_HOME_URL); ?>tu2.png">电话：136-6022-9999</p>
								<p><img src="<?php echo (IMG_HOME_URL); ?>tu4.png">邮箱：paul@soumi.com</p>
								<p class="weimas"><span><img src="<?php echo (IMG_HOME_URL); ?>tu5.png" width="23">微信：</span><span style="border:1px solid #cecece;width: 100px;display: inline-block;"><img src="<?php echo (IMG_HOME_URL); ?>wei1.png" width="100"></span></p>
							</li>
							<li>
								<h3>琳</h3>
								<p><img src="<?php echo (IMG_HOME_URL); ?>tu1.png">QQ:1735222888</p>
								<p><img src="<?php echo (IMG_HOME_URL); ?>tu2.png">电话：135-3367-2396</p>
								<p><img src="<?php echo (IMG_HOME_URL); ?>tu4.png">邮箱：lin@soumi.com</p>
								<p class="weimas"><span><img src="<?php echo (IMG_HOME_URL); ?>tu5.png" width="23">微信：</span><span style="border:1px solid #cecece;width: 100px;display: inline-block;"><img src="<?php echo (IMG_HOME_URL); ?>wei2.jpg" width="100"></span></p>
							</li>
							<li>
								<h3>英</h3>
								<p><img src="<?php echo (IMG_HOME_URL); ?>tu1.png">QQ:892259999</p>
								<p><img src="<?php echo (IMG_HOME_URL); ?>tu2.png">电话：020-85239999</p>
								<p><img src="<?php echo (IMG_HOME_URL); ?>tu4.png">邮箱：ying@soumi.com</p>
								<p class="weimas"><span><img src="<?php echo (IMG_HOME_URL); ?>tu5.png" width="23">微信：</span><span style="border:1px solid #cecece;width: 100px;display: inline-block;"><img src="<?php echo (IMG_HOME_URL); ?>wei3.png" width="100"></span></p>
							</li>
							<li>
								<h3>希希</h3>
								<p><img src="<?php echo (IMG_HOME_URL); ?>tu1.png">QQ:1735333888</p>
								<p><img src="<?php echo (IMG_HOME_URL); ?>tu2.png">电话：135-3367-2383</p>
								<p><img src="<?php echo (IMG_HOME_URL); ?>tu4.png">邮箱：xixi@soumi.com</p>
								<p class="weimas"><span><img src="<?php echo (IMG_HOME_URL); ?>tu5.png" width="23">微信：</span><span style="border:1px solid #cecece;width: 100px;display: inline-block;"><img src="<?php echo (IMG_HOME_URL); ?>wei4.jpg" width="100"></span></p>
							</li>
							<li>
								<h3>小园</h3>
								<p><img src="<?php echo (IMG_HOME_URL); ?>tu1.png">QQ:2530222888</p>
								<p><img src="<?php echo (IMG_HOME_URL); ?>tu2.png">电话：18926233726</p>
								<p><img src="<?php echo (IMG_HOME_URL); ?>tu4.png">邮箱：xiaoyuan@soumi.com</p>
								<p class="weimas"><span><img src="<?php echo (IMG_HOME_URL); ?>tu5.png" width="23">微信：</span><span style="border:1px solid #cecece;width: 100px;display: inline-block;"><img src="<?php echo (IMG_HOME_URL); ?>wei5.jpg" width="100"></span></p>
							</li>
						</ul>
					</p>
				</div>
				<div class="about_profile content fl" >
					<h2>公司简介</h2>
					<p>
						<strong>搜米（厦门）网络科技有限公司</strong>是一家专业致力于企业信息化全方面应用服务的网络公司，为了积极推动中国企业信息化和电子商务的全面发展， 企业始终坚持“因为专注，所以专业；因为透明，所以诚信”的企业 方针。是一家专业为国内、外企业提供全面的基于互联网商务解决方 案应用的专业信息技术服务商，专注于互联网品牌策划、网站建设、 软件开发、手机客户端开发、网络营销等，采用整合的营销手段将企业客户的形象或产品服务推向市场。同时，并连还致力于为客户提 供专业、量身定制的企业管理软件应用解决方案，为客户提供真正有 价值的信息化服务及产品，让客户在全球经济体系的竞争中处于不败 之地。公司自2015年成立以来，在广大并连人对事业执着的不断追求 以及广大新老客户的信任与支持，并连科技得到了快速、稳定、健康 的发展。
					</p>
				</div>
				<div class="about_team content fl" >
					<h2>技术团队</h2>
					<p>
						搜米（厦门）网络科技有限公司拥有一支技术专业、经验丰富、创新独特、策划一流、锐意向上的优秀团队。设计开发团队都是该行业五年以 上经验的高端人才，且身深谙互联网的核心价值，积累了大量的行业解决方不案和核心技术。且对不同客户需求分析、沟通方法等均有深 刻的感悟。在此基础上采用"质量精品、过程精品、服务精品"的流程控制方法，确保了优质的产品服务。并连网络为客户提供独特的服务 之一在于“泛策划”思路的应用。并连网络能从项目前期即深度介入客户的需求，并进行专业准确的策划。多年的从业经验和广泛的市场 体验，结合对互联网行业的深度了解，造就了团队在互联网品牌建设 和网络营销方面非凡的策划能力。从需求分析，项目实施到营销推广，全程融入了并连人深刻的策划思想。本地化顾问式服务并连网络作为一家本地化的信息服务运营商，深谙企业客户的需求，将本地化、面对面、持续的顾问式服务作为帮助企业客户实现信息化 的主要服务方式。多年来并连公司为超过1000家本地企业客户提供一对一的专业顾问服务，随时了解企业客户在不同发展阶段的个性需求 ，为企业客户提供针对性解决方案，伴随企业信息化建设的全过程，成为企业信息的忠实伙伴。公司凭借独特的企业文化、行业一流的企 业团队、正规的互联网服务和营运资质以及多年积累的服务经验，为 您提供最富有价值的互联网解决方案。
					</p>
				</div>
				<div class="about_team content fl" >
					<h2>隐私保护</h2>
					<p>1.保护客户资料不外泄</p>
					<p>2.保证商议信息不外泄</p>
					<p>3.其他</p>
				</div>
				<div class="about_flow content fl" >
					<h2>购买域名流程</h2>
					<div class="flowbg">
						<p class="flow1"><img src="<?php echo (IMG_HOME_URL); ?>flow1.png"><br/><span>用户注册登录</span></p>
						<p class="flow2"><img src="<?php echo (IMG_HOME_URL); ?>flow2.png"><br/><span>选购域名发起报价</span></p>
						<p class="flow3"><img src="<?php echo (IMG_HOME_URL); ?>flow3.png"><br/><span>与商家商议</span></p>
						<p class="flow4"><img src="<?php echo (IMG_HOME_URL); ?>flow4.png"><br/><span>买家付款</span></p>
						<p class="flow5"><img src="<?php echo (IMG_HOME_URL); ?>flow5.png"><br/><span>卖家过户</span></p>
						<p class="flow6"><img src="<?php echo (IMG_HOME_URL); ?>flow6.png"><br/><span>达成交易</span></p>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- 关于我们结束 -->
<script type="text/javascript">
    $(function(){
        var Lli = $('#about .main .about_nav li');
        var RDiv = $('.subject .content');
        var index = 0;
        Lli.click(function(){
          index = $(this).index();
          RDiv.eq(index).addClass('show').siblings().removeClass('show');
          $(this).addClass('ons').siblings().removeClass('ons');
          // return false;
        });
        var focus = location.search.substring(location.search.length -1);
        Lli.eq(focus).click();
    }) 
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