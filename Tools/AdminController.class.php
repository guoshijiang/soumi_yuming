<?php
namespace Tools;
use Think\Controller;

class AdminController extends Controller{
    //protected $mem = null;
    //构造方法
    function __construct(){
        parent::__construct(); //先执行父类构造方法，避免覆盖父类的
        //$this -> mem = new \Memcache();
        //$this -> mem -> connect('localhost',11211);
        //对用户访问的权限进行过滤限制
        //用户当前访问的"控制器-操作方法"权限，与用户角色的权限进行对比
        //"当前权限" 在角色权限里边出现，就允许访问，否则禁止访问
        $admin_id = session('admin_id');
        $admin_name = session('name');
        $admin_role = session('admin_role');
        //dump( $admin_id);
        //$admin_role = session('admin_role');
        //当前正在访问的权限
        $nowAC = CONTROLLER_NAME."-".ACTION_NAME;  //Role-showlist/Goods-showlist
        //非登录用户要提示跳转到登录页面
        if(!empty($admin_name)){
            //A.处于登录状态
            if($admin_name!=='admin'){
                //1) 只有普通管理员需要访问权限限制
                $roleinfo = D('Role')->find($admin_role);
                $roleAC = $roleinfo['role_auth_ac'];//Goods-showlist,Order-tianjia
                 //dump($admin_name);
                 //dump($nowAC);
                 //dump($roleAC);die();
                //判断角色权限$roleAC 里边是否存在 当前访问权限$nowAC
                //strpos($s1,$s2):判断$s2在$s1从左边开始第一次出现的位置(0/1/2..)，没有出现返回false
                //无需分配，默认允许全部管理员直接访问的权限
                $allowAC = "Manager-login,Manager-verifyImg,Manager-logout,Manager-changepassword,Userbaojia-getuserbaojia,Yuming-getyuming,Index-top,Category-getCatByPid,Index-index,Index-left,Index-right,Index-down,Index-center";
                //2) 当前访问权限 在角色权限 里边没有出现
                //3) 当前访问权限 在默认允许的权限 里边没有出现
                //以上3种情况"同时"满足，就是非法访问
                if(strpos($roleAC,$nowAC)===false && strpos($allowAC,$nowAC)===false){
                    exit('禁止非法访问');
                }
            }

        }else{
            //B. 处于退出系统状态
            //退出系统状态默认允许访问权限定义
            $quitAC = "Manager-login,Manager-verifyImg";

            if(strpos($quitAC,$nowAC)===false){
                //如果访问的权限不是默认允许的，就要跳转到登录页
                //$this -> redirect('Manager/login');//只能保证右侧(right)跑到登录页

                //整体(top/left/right/down)都跳转到登录页
                $js = <<<eof
                    <script type="text/javascript">
                        window.top.location.href="/index.php/Admin/Manager/login";
                    </script>
eof;
                echo $js;
            }
        }
    }
}


