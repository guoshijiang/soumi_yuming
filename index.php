<?php
//开启调试模式
//define('APP_DEBUG',True);
//引入静态资源常量
define('SET_URL','http://47.88.19.38/');
//前台
define('CSS_HOME_URL',SET_URL."Public/Home/css/");
define('JS_HOME_URL',SET_URL."Public/Home/js/");
define('IMG_HOME_URL',SET_URL."Public/Home/img/");
//后台
define('CSS_ADMIN_URL',SET_URL."Public/Admin/css/");
define('JS_ADMIN_URL',SET_URL."Public/Admin/js/");
define('IMG_ADMIN_URL',SET_URL."Public/Admin/images/");
//插件
define('PLUGIN_URL',SET_URL."Common/Plugin/");
//引入框架接口程序文件
require '../ThinkPHP/ThinkPHP.php';
?>

