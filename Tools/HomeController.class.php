<?php
namespace Tools;
use Think\Controller;

class HomeController extends Controller{
    //protected $mem = null;
    //构造方法
    function __construct(){
        parent::__construct(); //先执行父类构造方法，避免覆盖父类的
       //咨讯6
         $info6 = D('Zixun')
           ->order('id desc')
           ->field('zixun')
           ->limit(0,4)
           ->select();
        $this->assign('info6',$info6);
        //dump($info6);
      /*$user_name = session('user_name');
    //当前正在访问的权限
      $nowAC = CONTROLLER_NAME."-".ACTION_NAME; 
       //非登录用户要提示跳转到登录页面
       if(empty($user_name)){  
       }
      dump($user_name);*/
    }
}


