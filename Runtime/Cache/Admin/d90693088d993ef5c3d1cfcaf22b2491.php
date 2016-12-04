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



<script type="text/javascript" src='<?php echo (PLUGIN_URL); ?>jquerypage/jquery-page.js'></script>
<link rel="stylesheet" type="text/css" href="<?php echo (CSS_ADMIN_URL); ?>page.css">
<style type="text/css">
  .choose{
    font-size: 14px;
  }
  .choose .choose_top span,.cd-title{
    display:inline-block;
    width: 100px;
    height: 20px;
    line-height: 20px;
    text-align: right;
    vertical-align: middle;
  }
  .choose .choose_top .txt{
    height: 27px;
    width: 250px;
    vertical-align: middle;

  }
  .choose .choose_top .btn{
    height: 31px;
    width: 60px;
    vertical-align: middle;
    border:1px solid #2eccdd;
    background:#2eccdd;
    color: #fff;
    margin-top: 2px;
  }
  .choose .choose_bottom p{
    margin:5px 0;
  }
  .choose .choose_bottom p .cd-sp{
    display: inline-block;
    padding:5px 10px;
    text-align: center;
    cursor: pointer;
    color:black;
  }
  .choose .choose_bottom p .cd-sp a{
     color:black;
  }
  .choose .choose_bottom p .cd-sp:hover{
    background:#00a7eb; 
    border-radius: 5px;
  }
  #classification{
    display: inline-block;
    *display:inline;
    *zoom:1;
    /*padding-top: 8px;*/
  }
  #classification p{
    padding-top: 8px;
    height: 45px;
  }
  .choose form{
    margin-left: 53px;
    margin-top: 10px;
  }
  .choose form input.txt{
    height: 15px;
    padding: 8px 5px;
    width: 200px;
  }
  .choose form input.btn{
    height: 34px;
    width: 68px;
    border:0;
    background-color: #135AB3;
    color:#fff;
    font-size: 15px;
  }
</style>
<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce" id='houzhuiinfo_table'>
<!-- 域名查找选择开始 -->
  <tr>
    <td colspan="15">
      <div class="choose">
        <form action="/index.php/Admin/Yuming/showlist" method="post"  >
            <input type="text" class="txt" placeholder="请输入搜索关键字" id="yuming_name" name="yuming_name" value=""/>
            <input type="button" class="btn" id="button" onclick="search()" value="搜索" />
        </form>
        <div class="choose_bottom">
            <p style="margin-left: 53px;">
                <span class="cd-sp ">后缀</span>
                <span class="cd-sp t cd_on"><a href="javascript:;"  value='0' >不限</a></span>
              <?php if(is_array($info11)): foreach($info11 as $key=>$v): ?><span class="cd-sp t"><a  href="javascript:;" target="_self"  value='<?php echo ($v["houzhui_id"]); ?>' ><?php echo ($v["houzhui_name"]); ?></a></span><?php endforeach; endif; ?>
            </p>
            <p style="display: inline-block;*display:inline;*zoom:1;vertical-align: top;padding-top: 8px;">
               <span class="cd-title">类型:</span>
               <span class="cd-sp tt "><a href="javascript:;"  value='0' >不限</a></span>
            </p>
            <div id="classification">
              <?php if(is_array($infoA)): foreach($infoA as $key=>$v): ?><p>
                    <span class="cd-sp tt"><a href="javascript:;" value='<?php echo ($v["cat_id"]); ?>'><?php echo ($v["cat_name"]); ?></a></span>
                    <?php if(is_array($infoB)): foreach($infoB as $key=>$vv): if(($vv["cat_pid"]) == $v["cat_id"]): ?><span class="cd-sp tt"><a href="javascript:;" target="" value="<?php echo ($vv["cat_id"]); ?>" ><?php echo ($vv["cat_name"]); ?></a></span><?php endif; endforeach; endif; ?>
                  </p><?php endforeach; endif; ?> 
            </div>
            <p>
              <div class="choose_on" style="background:#fff;height: 35px; line-height: 35px;">
                  <span style="float: left; font-size: 16px; line-height: 35px;padding:0 5px;">当前条件：</span>搜索:<span id="sousuo">无</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;后缀:<span id="houzhui">不限</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;类型:<span id="cat">不限</span></span>
                  <span style="float: right;font-size: 16px; line-height: 35px;padding:0 5px;">有<strong style="color: red"  id="zongshu"></strong>条满足条件的结果（每页显示20条）</span>
              </div>
            </p>
        </div>
      </div>
    </td>
  </tr>
<!-- 域名查找选择结束  -->
  <tr>
    <td width="4%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">域名ID</span></div></td>
    <td width="8%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">域名名称</span></div></td>
    <td width="3%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">后缀</span></div></td>
    <td width="4%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">类型</span></div></td>
    <td width="3%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">最近成交</span></div></td>
    <td width="3%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">一口价域名</span></div></td>
    <td width="3%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">今日推荐</span></div></td>
    <td width="3%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">新米排行</span></div></td>
    <td width="3%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">议价域名</span></div></td>
    <td width="6%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">收购价格</span></div></td>
    <td width="6%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">销售价格</span></div></td>
    <td width="20%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">描述：</span></div></td>
    <td width="9%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">添加时间</span></div></td>
    <td width="9%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">修改时间</span></div></td>
    <td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">基本操作</span></div></td>
  </tr>
  <?php if(is_array($cateinfo)): foreach($cateinfo as $k=>$v): ?><tr>
    <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19"><?php echo ($v["yuming_id"]); ?></span></div></td>
    <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19"><?php echo ($v["yuming_name"]); ?></span></div></td>
    <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19"><?php echo ($v["houzhui_name"]); ?></span></div></td>
    <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19"><?php echo ($v["cat_name"]); ?></span></div></td>
    <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19">
    <?php echo ($v['is_sell']!=='0'?'已成交':'否'); ?></span></div></td>
    <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19">
     <?php echo ($v['is_qiang']!=='0'?'一口价':'否'); ?></span></div></td>
    <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19">
     <?php echo ($v['is_rec']!=='0'?'推荐':'否'); ?></span></div></td>
    <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19">
     <?php echo ($v['is_new']!=='0'?'最新':'否'); ?></span></div></td>
    <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19">
    <?php echo ($v['yuming_yijia_price']!=='0'?'议价':'否'); ?></span></div></td>
    <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo ($v["yuming_shougou_price"]); ?>&nbsp;&nbsp;万元</div></td>
    <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo ($v["yuming_xiaoshou_price"]); ?>&nbsp;&nbsp;万元</div></td>
    <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo ($v["yuming_introduce"]); ?></div></td>
    <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo date('Y-m-d H:i:s',$v['add_time']);?></div></td>
    <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo date('Y-m-d H:i:s',$v['upd_time']);?></div></td>
    <td height="20" bgcolor="#FFFFFF"><div align="center" class="STYLE21">
    <a style='color:rgb(59,99,119)'  href=" <?php echo U('del',array('yuming_id'=>$v['yuming_id']));?>" onclick="if(confirm('确认要删除我么？主人')){return true;}else{return false;}" >删除</a>  <a style='color:rgb(59,99,119)'  href="<?php echo U('upd',array('yuming_id'=>$v['yuming_id']));?>">修改</a></div></td>
  </tr><?php endforeach; endif; ?>

</table>
<!-- 分页信息 start -->
<div id="Pagination" class="pagination">
<!-- 这里显示分页 -->
</div>
<!-- 分页信息 end -->
</body>
<script type="text/javascript">
  var houzhui_id=0;
  var cat_id =0;
  var yuming_name ;
  var sousuo  = document.getElementById("sousuo");
  var houzhui = document.getElementById("houzhui");
  var cat     = document.getElementById("cat");
 function search(){
     yuming_name = document.getElementById("yuming_name").value;
      //alert(yuming_name);
     sousuo.innerHTML = yuming_name;
     ss();
     document.getElementById("yuming_name").value = "";
  }
var cat_id10  = $(".tt a");
   cat_id10.click(function(){
       cat_id = $(this).attr("value");
       //alert(cat_id);
       cat_name = $(this).text();
      cat.innerHTML = cat_name;
       ss();
   });
var houzhui_id2  = $(".t a");
  houzhui_id2.click(function(){
      houzhui_id = $(this).attr("value");
      //alert(houzhui_id);
      houzhui_name = $(this).text();
      houzhui.innerHTML = houzhui_name;
       ss();
  });
var num_entries;
var aa;
var zongshu= document.getElementById("zongshu");
 function ss(){
   $.ajax({
       url:"/index.php/admin/Yuming/find3",
       data:{'houzhui_id':houzhui_id,'cat_id':cat_id,'yuming_name':yuming_name},
       dataType:'json',
       type:'get',
       success:function(msg){
         var arr1 = msg.split(',');
        // alert(arr1);
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
      items_per_page:20 //每页显示1项
    });
   })(); 
    function pageselectCallback(page_index, jq){
      $.ajax({
       url:"/index.php/admin/Yuming/getyuming",
       data:{'page_index':page_index,'yuming_ids':yuming_ids},
       dataType:'json',
       type:'get',
       success:function(msg){
           var s = "";
                  $.each(msg,function(n,v){
                     var sell   = v.is_sell=='0'?'否':'已成交';
                     var qiang  = v.is_qiang=='0'?'否':'一口价';
                     var rec    = v.is_rec=='0'?'否':'推荐';
                     var news   = v.is_new=='0'?'否':'最新';
                     var yijia  = v.yuming_yijia_price!=='0'?'议价':'否';
                     var yuming =  v.yuming_xiaoshou_price;
                     var yuming_xiaoshou_price = v.yuming_xiaoshou_price =='0'?'议价':(yuming);
                     var date1 = v.upd_time*1000;
                     var date2 = v.add_time*1000;
                     var date = new Date(date1);
                        Y = date.getFullYear() + '-';
                        M = (date.getMonth()+1 < 10 ? '0'+(date.getMonth()+1) : date.getMonth()+1) + '-';
                        D = (date.getDate() < 10 ? '0'+ date.getDate() : date.getDate())+ ' ';
                        h = (date.getHours()  < 10 ? '0'+ date.getHours() : date.getHours())+ ':';
                        m = (date.getMinutes()< 10 ? '0'+ date.getMinutes() : date.getMinutes()) ;
                     var upd_time = Y+M+D+h+m ;
                     var dates = new Date(date2);
                        Y1 = dates.getFullYear() + '-';
                        M1 = (dates.getMonth()+1 < 10 ? '0'+(dates.getMonth()+1) : dates.getMonth()+1) + '-';
                        D1 = (dates.getDate() < 10 ? '0'+ dates.getDate() : dates.getDate())+ ' ';
                        h1 = (dates.getHours()  < 10 ? '0'+ dates.getHours() : dates.getHours())+ ':';
                        m1 = (dates.getMinutes()< 10 ? '0'+ dates.getMinutes() : dates.getMinutes()) ; 
                     var add_time = Y1+M1+D1+h1+m1 ;
                      s += '<tr><td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19">'+v.yuming_id+'</span></div></td><td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19">'+v.yuming_name+'</span></div></td><td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19">'+v.houzhui_name+'</span></div></td><td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19">'+v.cat_name+'</span></div></td><td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19">'+sell+'</span></div></td><td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19"> '+qiang+'</span></div></td><td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19">'+rec+'</span></div></td><td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19">'+news+'</span></div></td><td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="center"><span class="STYLE19"> '+yijia+'</span></div></td><td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center">'+v.yuming_shougou_price+'</div></td><td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center">'+yuming_xiaoshou_price+'</div></td><td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center">'+v.yuming_introduce+'</div></td><td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center">'+add_time+'</div></td><td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center">'+upd_time+'</div></td><td bgcolor="#FFFFFF" height="20"><div class="STYLE21" align="center"><a style="color:rgb(59,99,119)" href=" /index.php/Admin/Yuming/del/yuming_id/'+v.yuming_id+'">删除</a> <a style="color:rgb(59,99,119)" href="/index.php/Admin/Yuming/upd/yuming_id/'+v.yuming_id+'">修改</a></div></td></tr>';
                     });
                    $('#houzhuiinfo_table tr:gt(1)').remove();
                    $('#houzhuiinfo_table').append(s);  
        }
      });
    }
  }
ss();
</script>
<!-- <script type="text/javascript">
    $(function(){
   var Cp = $('.choose_bottom p');
   var Cspan =$('.choose_bottom .cd-sp');
   Cspan.click(function(){
     $(this).addClass('cd_on').siblings().removeClass('cd_on');
     return false;
     })
 });
 </script>-->



</html>