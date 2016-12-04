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
  <tr>
    <td>
    <form action="/index.php/Admin/Yuming/upd/yuming_id/640" method="post">
    <input type="hidden" name='yuming_id' value='<?php echo ($info["yuming_id"]); ?>' />
    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">
      <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">域名名称：</span></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
        <input type="text" name="yuming_name" value='<?php echo ($info["yuming_name"]); ?>'/>
        </div></td>
      </tr>
      <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">后缀：</span></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
          <select  name='houzhui_id' >
          <option value ='0'>-请选择-</option>
          <?php if(is_array($houzhuiinfo)): foreach($houzhuiinfo as $key=>$v): ?><option name="<?php echo ($v["houzhui_id"]); ?>" value='<?php echo ($v["houzhui_id"]); ?>' <?php if(($info["houzhui_id"]) == $v["houzhui_id"]): ?>selected='selected'<?php endif; ?>><?php echo ($v["houzhui_name"]); ?></option><?php endforeach; endif; ?>
          </select>
        </div></td>
      </tr>
      <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6">
<script type="text/javascript">
//页面加载完毕就调用show_cat，以便可以根据当前分类获得次级分类信息
$(function(){
  show_cat(1); //第1级别分类 获得请求 第2级分类信息
  show_cat(2); //第2级别分类 获得请求 第3级分类信息
});

  //根据flag标识分类 获得 次级别分类信息
  function show_cat(flag){
    var cat_id = $('#cat_id_'+flag).val();//获得当前选中的主分类信息
    var extcatinfo = ','+$('#extcatinfo').val()+','; //获得商品拥有的扩展分类信息
                            //拼装好的扩展分类信息(左右有逗号)：,19,20,

    if(cat_id==0 && flag==1){
      //① 没有选取分类，展示 空壳 分类表单域
      $('#cat_id_2').html("<option value='0'>-请选择-</option>");
      $('#cat_id_3').html("<option value='0'>-请选择-</option>");
    }else if(cat_id==0 && flag==2){
      //② 没有选取第2级分类，第3级别分类为 空壳 
      $('#cat_id_3').html("<option value='0'>-请选择-</option>");
    }else{
      //ajax带着cat_id去服务器端获得第2级别分类信息
      $.ajax({
        url:"/index.php/Admin/Category/getCatByPid",
        data:{'cat_id':cat_id},
        dataType:'json',
        type:'get',
        async:false,
        success:function(msg){
          //遍历msg，与html标签结合，最后追加给页面
          var s = "<option value='0'>-请选择-</option>";
          $.each(msg,function(n,v){
            s += '<option value="'+v.cat_id+'"';
            //判断扩展分类与商品有联系，并选中设置
            //s2.indexOf(s1)  判断s2大串左边第一次出现s1子串的下标信息(0/1/2/3..)
            //如果s2中没有出现s2则返回-1
            if(extcatinfo.indexOf(','+v.cat_id+',')>=0){
              s += 'selected="selected"';
            }
            s += '>'+v.cat_name+'</option>';
          });
          //第2/3级别分类归位
          if(flag==1){
            $('#cat_id_2').html("<option value='0'>-请选择-</option>");
            $('#cat_id_3').html("<option value='0'>-请选择-</option>");
          }
          //把s追加给页面
          nextflag = flag+1;

          $('#cat_id_'+nextflag).html(s);//有覆盖旧信息效果
        }
      });
    }

  }
</script>
        <input type="hidden" id='extcatinfo' value='<?php echo ($extcatinfo); ?>' />
        <div align="right"><span class="STYLE19">域名分类(主)：</span></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
        <select id="cat_id_1" name='cat_id' onchange="show_cat(1)">
          <option value='0'>-请选择-</option>
           <?php if(is_array($catinfoA)): foreach($catinfoA as $key=>$v): ?><option value='<?php echo ($v["cat_id"]); ?>'
            <?php if(($v["cat_id"]) == $info["cat_id"]): ?>selected="selected"<?php endif; ?>
            ><?php echo ($v["cat_name"]); ?></option><?php endforeach; endif; ?>
        </select>
        </div></td>
      </tr>
      <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">域名分类(扩展)：</span></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
        <select name='ext_cat[]' id="cat_id_2" onchange="show_cat(2)">
          <option value='0'>-请选择-</option>
        </select>
        </div></td>
      </tr>

      <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">最近成交：</span></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
        是：<input type="radio" name="is_sell" value="1" <?php if(($info["is_sell"]) == "1"): ?>checked="checked"<?php endif; ?>/>
        否：<input type="radio" name="is_sell" value="0" <?php if(($info["is_sell"]) == "0"): ?>checked="checked"<?php endif; ?> /></div></td>
      </tr>
      <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">一口价域名：</span></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
        是：<input type="radio" name="is_qiang" value="1" <?php if(($info["is_qiang"]) == "1"): ?>checked="checked"<?php endif; ?>/>
        否：<input type="radio" name="is_qiang" value="0" <?php if(($info["is_qiang"]) == "0"): ?>checked="checked"<?php endif; ?> />
        </div></td>
      </tr>
      <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">今日推荐：</span></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
        是：<input type="radio" name="is_rec" value="1"  <?php if(($info["is_rec"]) == "1"): ?>checked="checked"<?php endif; ?>/>
        否：<input type="radio" name="is_rec" value="0" <?php if(($info["is_rec"]) == "0"): ?>checked="checked"<?php endif; ?> />
        </div></td>
      </tr>
      <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">新米排行：</span></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
        是：<input type="radio" name="is_new" value="1" <?php if(($info["is_new"]) == "1"): ?>checked="checked"<?php endif; ?>/>
        否：<input type="radio" name="is_new" value="0" <?php if(($info["is_new"]) == "0"): ?>checked="checked"<?php endif; ?> /></div></td>
      </tr>
      <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">议价域名：</span></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
        是：<input type="radio" name="yuming_yijia_price" value="1" <?php if(($info["yuming_yijia_price"]) == "1"): ?>checked="checked"<?php endif; ?>/>
        否：<input type="radio" name="yuming_yijia_price" value="0" <?php if(($info["yuming_yijia_price"]) == "0"): ?>checked="checked"<?php endif; ?> />
        </div></td>
      </tr>
      <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">收购价：</span></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left"><input type="text" name="yuming_shougou_price" value='<?php echo ($info["yuming_shougou_price"]); ?>' /></div></td>
      </tr>
      <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">销售价：</span></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left"><input type="text" name="yuming_xiaoshou_price"  value='<?php echo ($info["yuming_xiaoshou_price"]); ?>' /></div></td>
      </tr>
      <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">描述：</span></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left"><textarea rows ="5" 
         colse ="30" id='yuming_introduce' name='yuming_introduce' value='<?php echo ($info["yuming_introduce"]); ?>'  style='width:650px;height:150px;'><?php echo ($info["yuming_introduce"]); ?></textarea></div></td>
      </tr>
      <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6" colspan='100'>
          <div align="center"><input type="submit" value='修改域名' /></div>
        </td>
      </tr>
    </table>
    </form>
    </td>
  </tr>
  </table>
</body>
 <script type="text/javascript">
       var ue = UE.getEditor('yuming_introduce',{toolbars: [[
            'fullscreen', 'source', '|', 'undo', 'redo', '|',
            'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc', '|',
            'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
            'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
            'directionalityltr', 'directionalityrtl', 'indent', '|',
            'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|', 'touppercase', 'tolowercase', '|',
            'link', 'unlink', 'anchor', '|'
        ]]});
  </script>



</html>