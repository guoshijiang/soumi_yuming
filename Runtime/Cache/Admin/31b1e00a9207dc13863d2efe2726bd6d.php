<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理工作平台 </title>
<link rel="stylesheet" type="text/css" href="<?php echo (CSS_ADMIN_URL); ?>style.css"/>
<script type="text/javascript" src="<?php echo (JS_ADMIN_URL); ?>js.js"></script>
</head>
<body>
<div id="top">  </div>
<form id="login" name="login" action="/index.php/Admin/Manager/login" method="post">
  <div id="center"   >
    <div id="center_middle">
      <div class="user">
        <label>用户名：
        <input type="text" name="name" id="user"  />
        </label>
      </div>
      <div class="user">
        <label>密　码：
        <input type="password" name="pwd" id="pwd" />
        </label>
      </div>
      <div class="chknumber" >
        <label>验证码：
        <input name="chknumber" type="text" id="chknumber" maxlength="5" class="chknumber_input" />
        </label>
        <img src="/index.php/Admin/Manager/verifyImg" id="safecode" 
        onclick="this.src=this.src+'/'+Math.random()" />
      </div>
    </div>
    <div id="center_submit">
      <div class="button"> <img src="<?php echo (IMG_ADMIN_URL); ?>dl.gif" width="67" height="30" onclick="form_submit()" > </div>
      <div class="button"> <img src="<?php echo (IMG_ADMIN_URL); ?>cz.gif" width="67" height="30" onclick="form_reset()"> </div>
    </div>
    <div id="center_right"></div>
  </div>
</form>
</body>
</html>