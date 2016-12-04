<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="<?php echo (JS_ADMIN_URL); ?>/jquery-1.12.1.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<style type="text/css">
body { 
	margin-left: 3px;
	margin-top: 0px;
	margin-right: 3px;
	margin-bottom: 0px;
}
.STYLE1 {
	color: #e1e2e3;
	font-size: 12px;
}
.STYLE6 {color: #000000; font-size: 12px; }
.STYLE10 {color: #000000; font-size: 12px; }
.STYLE19 {
	color: #344b50;
	font-size: 12px;
}
.STYLE21 {
	font-size: 12px;
	color: #3b6375;
}
.STYLE22 {
	font-size: 12px;
	color: #295568;
}
a:link{
    color:#e1e2e3; text-decoration:none;
}
a:visited{
    color:#e1e2e3; text-decoration:none;
}
</style>
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="24" bgcolor="#353c44"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="6%" height="19" valign="bottom"><div align="center"><img src="<?php echo (IMG_ADMIN_URL); ?>tb.gif" width="14" height="14" /></div></td>
              <td width="94%" valign="bottom"><span class="STYLE1"> <?php echo ($daohang["title1"]); ?> -> <?php echo ($daohang["title2"]); ?></span></td>
              </tr>
            </table></td>
            <td><div align="right"><span class="STYLE1">
              <a href="<?php echo ($daohang["act_link"]); ?>"><img src="<?php echo (IMG_ADMIN_URL); ?>add.gif" width="10" height="10" /> <?php echo ($daohang["act"]); ?></a>   &nbsp; 
              </span>
              <span class="STYLE1"> &nbsp;</span></div></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>


<script type="text/javascript" src='<?php echo (PLUGIN_URL); ?>ueditor/ueditor.config.js'></script>
<script type="text/javascript" src='<?php echo (PLUGIN_URL); ?>ueditor/ueditor.all.min.js'></script>
<script type="text/javascript" src='<?php echo (PLUGIN_URL); ?>ueditor/lang/zh-cn/zh-cn.js'></script>
<script type="text/javascript" src='<?php echo (PLUGIN_URL); ?>jquerypage/jquery-page.js'></script>
<link rel="stylesheet" type="text/css" href="<?php echo (CSS_ADMIN_URL); ?>page.css">
  <tr>
    <td>
    <div class="choose_on" style="background:#fff;height: 35px;">
      <span style="font-size: 16px; line-height: 35px;padding:0 5px;">当前报价的用户人数：<strong style="color: red"><?php echo ($usertotal); ?></strong></span>
    </div>
    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce"  id="houzhuiinfo_table">
      <tr>
        <td width="9%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">
        用户名</span></div></td>
        <td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">基本操作</span></div></td>
      </tr>
      <?php if(is_array($info)): foreach($info as $k=>$v): ?><tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19"><?php echo ($v["user_name"]); ?></span></div></td>
        <td height="20" bgcolor="#FFFFFF"><div align="center" class="STYLE21">
         <a style='color:rgb(59,99,119)'  href=" <?php echo U('xiangqing',array('user_id'=>$v['user_id']));?>" >详情</a>
        <a style='color:rgb(59,99,119)'  href=" <?php echo U('userbaojiashoulistdel',array('user_id'=>$v['user_id']));?>" onclick="if(confirm('确认要删除我么？主人')){return true;}else{return false;}" >删除</a></div></td>
      </tr><?php endforeach; endif; ?>
    </table>
    <!-- 分页信息 start -->
<div id="Pagination" class="pagination">
<!-- 这里显示分页 -->
</div>
<!-- 分页信息 end -->
    </td>
  </tr>
 </table>
</body>
<input type='hidden' id='userbaojia' value='<?php echo ($usertotal); ?>' />
<script type="text/javascript">
 $(function(){
  (function() {
    var num_entries = $("#userbaojia").val();
    //alert(num_entries);
    // 创建分页
    $("#Pagination").pagination(num_entries, {
      num_edge_entries: 1, //边缘页数
      num_display_entries: 4, //主体页数
      callback: pageselectCallback,
      items_per_page:30 //每页显示1项
    });
   })();
    function pageselectCallback(page_index, jq){
      $.ajax({
       url:"/index.php/Admin/Userbaojia/getuserbaojia",
       data:{'page_index':page_index},
       dataType:'json',
       type:'get',
       success:function(msg){
        console.log(msg);
           var s = "";
                  $.each(msg,function(n,v){
                      s += '<tr><td class="STYLE6" height="20" bgcolor="#FFFFFF"><div align="center"><span class="STYLE19">'+v.user_name+'</span></div></td><td height="20" bgcolor="#FFFFFF"><div class="STYLE21" align="center"><a style="color:rgb(59,99,119)" href=" /index.php/Admin/Userbaojia/xiangqing/user_id/'+v.user_id+'">详情</a>&nbsp;&nbsp;&nbsp;&nbsp;<a style="color:rgb(59,99,119)" href=" /index.php/Admin/Userbaojia/del/user_id/'+v.user_id+'">删除</a></div></td></tr>';
                     });
                    $('#houzhuiinfo_table tr:gt(0)').remove();
                    $('#houzhuiinfo_table').append(s);  
        }
      });
    }
  });
</script>



</html>