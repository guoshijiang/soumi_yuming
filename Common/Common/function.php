<?php
//对$string内容防止xss攻击
//把$string中的非法标签内容都给过滤掉
function fanXSS($string)
{
    require_once './Common/Plugin/htmlpurifier/HTMLPurifier.auto.php';
    // 生成配置对象
    $cfg = HTMLPurifier_Config::createDefault();
    // 以下就是配置：
    $cfg->set('Core.Encoding', 'UTF-8');
    // 设置允许使用的HTML标签
    $cfg->set('HTML.Allowed','div,b,strong,i,em,a[href|title],ul,ol,li,br,span[style],img[width|height|alt|src]');
    // 设置允许出现的CSS样式属性
    $cfg->set('CSS.AllowedProperties', 'font,font-size,font-weight,font-style,font-family,text-decoration,padding-left,color,background-color,text-align');
    // 设置a标签上是否允许使用target="_blank"
    $cfg->set('HTML.TargetBlank', TRUE);
    // 使用配置生成过滤用的对象
    $obj = new HTMLPurifier($cfg);
    // 过滤字符串
    return $obj->purify($string);
}

//实现邮件发送函数
function sendMail($to, $title, $content){
    require_once('./Common/Plugin/phpmailer/class.phpmailer.php');
    $mail = new PHPMailer();
    // 设置为要发邮件
    $mail->IsSMTP();
    // 是否允许发送HTML代码做为邮件的内容
    $mail->IsHTML(TRUE);
    $mail->CharSet='UTF-8';
    // 是否需要身份验证
    $mail->SMTPAuth=TRUE;
    /*  邮件服务器上的账号是什么 -> 到163注册一个账号即可 */
    $mail->From="phpseven@163.com";
    $mail->FromName="phpseven";
    $mail->Host="smtp.163.com";  //发送邮件的服务协议地址
    $mail->Username="phpseven";
    $mail->Password="phpseven777";
    $mail->Port = 25;   // 发邮件端口号默认25
    $mail->AddAddress($to);  // 收件人
    $mail->Subject=$title;  // 邮件标题
    $mail->Body=$content;  // 邮件内容
    return($mail->Send());
}

//从二维数组$arr中把$field字段内容获得出来拼装为字符串返回
function arrayToString($arr,$field){
    $s = array();
    foreach($arr as $k => $v){
        $s[] = $v[$field];
    }
    return implode(',',$s);//array->string
}

//把当前请求地址的指定get参数给去除
//例如：
//http://web.shop45.com/index.php/Home/Goods/showlist/cat_id/18/shai_price/1400-2799/pai/cpu/A10
//unsetUrlParam('shai_price') 之后
//http://web.shop45.com/index.php/Home/Goods/showlist/cat_id/18/cpu/A10

//一次性可以清除多个get参数
//$args = "pai,xu";
//例如：
// /Home/Goods/showlist/cat_id/18/pai/price/xu/asc/pai/cpu/A10
//unsetUrlParam('pai,xu') 之后
// /Home/Goods/showlist/cat_id/18/cpu/A10

function unsetUrlParam($args){
    //利用正则表达式去除url地址里边指定的get参数信息
    $url = __SELF__;
    $args_arr = explode(',',$args);
    foreach($args_arr as $k => $v){
        $reg = "#/$v/[^/]+#";  //[^]托字符表示"取非"
        $url = preg_replace($reg,'',$url);
    }
    return $url;
}

