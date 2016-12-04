<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<style>
    body,html{
    	height: 100%;
    }
	body {
	margin:0px;
	padding:0px;
	font-size: 12px;
	}
	#navigation {
		margin:0px;
		padding:0px;
		width:147px;
		background:#ccc;
	}
	#navigation a.head {
		cursor:pointer;
		background:url(<?php echo (IMG_ADMIN_URL); ?>main_34.gif) no-repeat scroll;
		display:block;
		font-weight:bold;
		margin:0px;
		padding:5px 0 5px;
		text-align:center;
		font-size:12px;
		text-decoration:none;
	}
	#navigation ul {
		border-width:0px;
		margin:0px;
		padding:0px;
		text-indent:0px;
	}
	#navigation li {
		list-style:none; display:inline;
	}
	#navigation li li a {
		display:block;
		font-size:12px;
		text-decoration: none;
		text-align:center;
		padding:3px;
	}
	#navigation li li a:hover {
		background:url(<?php echo (IMG_ADMIN_URL); ?>tab_bg.gif) repeat-x;
		border:solid 1px #adb9c2;
	}
	a:link{
	    color:#036;
	}
</style>
<body>
<div  style="height:100%;">
  <ul id="navigation">
  <?php if(is_array($authinfoA)): foreach($authinfoA as $key=>$v): ?><li> <a class="head"><?php echo ($v["auth_name"]); ?></a>
      <ul class="cen" style="display: none;">
        <?php if(is_array($authinfoB)): foreach($authinfoB as $key=>$vv): if(($vv["auth_pid"]) == $v["auth_id"]): ?><li  class="aaa"><a href="/index.php/Admin/<?php echo ($vv["auth_c"]); ?>/<?php echo ($vv["auth_a"]); ?>"  target="rightFrame"><?php echo ($vv["auth_name"]); ?></a></li><?php endif; endforeach; endif; ?>
      </ul>
    </li><?php endforeach; endif; ?>
  </ul>
</div>
<script type="text/javascript" src="<?php echo (JS_ADMIN_URL); ?>jquery-1.12.1.min.js"></script>
<script type="text/javascript">
		$(function(){
			$('#navigation li .head').click(function(){
                 $(this).next('.cen').toggle(500);
			});
			$('#navigation .aaa').click(function(){
				$(this).find('.san').toggle(500);
				$('.san a').click(function(e){e.stopPropagation();})//阻止事件冒泡	 
			})
		})
</script>
</body>
</html>