<?php
namespace Admin\Controller;
//use Tools\AdminController;
use Tools\AdminController;
class ManagerController extends AdminController {
    public function changepassword(){
      layout(false);
       $mg_id = session('admin_id');
       $yuanpwd = D('Manager')
             ->field('mg_pwd')
             ->where(array('mg_id'=>$mg_id))
             ->select();
        $this->assign('yuanpwd',$yuanpwd);
        //dump($mg_id );
        //dump($yuanpwd);
      if(IS_POST){ 
       //dump($_POST);die();
        $mg_id   = I('post.mg_id');
        $mg_pwd  = I('post.mg_pwd');
        $pwd1   = I('post.pwd1');
        $mg_pwd2 = strlen($mg_pwd);
        if($mg_pwd2 === 0){
          $this -> error('密码不能为空！',U('changepassword',array('mg_id'=>$manager_id)),1);  
        }
        if($mg_pwd2<6){
            $this -> error('密码不能少于6位数',U('changepassword',array('mg_id'=>$manager_id)),1);
        }
         if($mg_pwd2>26){
            $this -> error('密码不能大于21位数',U('changepassword',array('mg_id'=>$manager_id)),1);
        }
        if($mg_pwd===$pwd1){
             $manager = D('Manager');
            $shuju = $manager ->create();
           // dump( $manager);die();
              if($manager ->save($shuju)){
                $this -> success('修改密码成功',U('showlist'),1);
            }else{
                $this -> error('修改密码失败',U('changepassword',array('mg_id'=>$manager_id)),1);
            }
        }else{
           echo "密码不一致！";
        }
      }
      $this -> display();
    }
    //管理员基本信息
    public function managerinformation(){
        $daohang = array(
            'title1' => '管理员管理',
            'title2' => '管理员基本信息',
            'act' => '添加',
            'act_link' => U('tianjia'),
        );
        //assign给模板的变量信息，"普通模板和布局模板"都可以使用
        $this -> assign('daohang',$daohang);
        $this -> display();
    }  
    public function login(){
        layout(false); //去除默认布局
        if(IS_POST){
            //校验验证码
            //dump($_post);die();
            $vry = new \Think\Verify();
            if($vry -> check($_POST['chknumber'])){
                //校验用户名、密码
                $name = $_POST['name'];
                $pwd = $_POST['pwd'];
                $info = D('Manager')
                    ->where(array('mg_name'=>$name,'mg_pwd'=>$pwd))
                    ->find();
                if($info !== null){
                    //持久化用户信息
                    session('admin_id',$info['mg_id']);
                    session('name',$info['mg_name']);
                    //session('admin_id',$info['role_id']);
                    session('admin_role',$info['role_id']); //持久化角色信息
                    //跳转到后台首页面
                    //redirect($url,$params=array(),$delay=0,$msg='')
                    $this -> redirect('Index/index');
                }else{
                    echo "用户名或密码错误";
                }
            }else{
                echo "验证码错误";
          }
        }
        $this -> display();
    }    

    //退出系统
function logout(){
        session(null);   //清除session
        $this -> redirect('Manager/login');  //跳转到登录页面
    }
function showlist(){
        $daohang = array(
            'title1' => '权限管理',
            'title2' => '管理员列表',
            'act' => '添加',
            'act_link' => U('tianjia'),
        );
        //assign给模板的变量信息，"普通模板和布局模板"都可以使用
        $this -> assign('daohang',$daohang);
        $manager =  new \Model\ManagerModel();
        $info= $manager
               ->alias('m')
               ->join('__ROLE__ r on m.role_id=r.role_id')
               ->field('m.*,r.role_name')
               ->order('m.role_id')
               ->select();
        $this -> assign('info',$info);
        //dump($info);die();
        $this->display(); 
}
function upd(){
        $daohang = array(
            'title1' => '权限管理',
            'title2' => '修改',
            'act' => '返回',
            'act_link' => U('showlist'),
        );
        //assign给模板的变量信息，"普通模板和布局模板"都可以使用
        $this -> assign('daohang',$daohang);
        $manager_id = I('get.mg_id');
        //dump($manager);
        $manager = D('Manager');
        if(IS_POST){
            //dump($_POST);die();
            $shuju = $manager ->create();
              if($manager ->save($shuju)){
                $this -> success('修改数据成功',U('showlist'),1);
            }else{
                $this -> error('修改数据失败',U('upd',array('mg_id'=>$manager_id)),1);
            }
        }else{
             $info1= D('Role')
               ->field('role_name,role_id')
               ->select();
            $this -> assign('info1',$info1);
            $info = $manager ->find($manager_id);
            $this -> assign('info',$info);
            //dump($info);
            //dump($info1);die();
            $this->display();  
        }
    }
      function tianjia(){
        $daohang = array(
            'title1' => '权限管理',
            'title2' => '添加管理员',
            'act' => '返回',
            'act_link' => U('showlist'),
        );
        //assign给模板的变量信息，"普通模板和布局模板"都可以使用
        $this -> assign('daohang',$daohang);
       if(IS_POST){
        //dump($_POST);die();
            $manager = new \Model\ManagerModel();
            $shuju = $manager ->create();
            $shuju['mg_time'] = time();
            if($manager->add($shuju)){
                $this -> success('添加成功','showlist',1);
            }else{
                $this -> error('添加失败','tianjia',1);
            }
        }else{
            $info= D('Role')
               ->field('role_name,role_id')
               ->select();
            $this->assign('info',$info);
            $this->display();   
        } 
    }
    public function del($mg_id){
        $manager = new \Model\ManagerModel();
        if(IS_GET){
            $shuju = $manager
            ->where(array('mg_id'=>'$mg_id')) 
            ->delete($mg_id);
            $this -> redirect('Manager/showlist');
        }else{
            $this->display();   
        }
    }

    function verifyImg(){  
        $cfg = array(
            'fontSize'  =>  12,              // 验证码字体大小(px)
            'useCurve'  =>  true,            // 是否画混淆曲线
            'useNoise'  =>  false,            // 是否添加杂点  
            'imageH'    =>  30,               // 验证码图片高度
            'imageW'    =>  95,               // 验证码图片宽度
            'length'    =>  5,               // 验证码位数
            'fontttf'   =>  '4.ttf',              // 验证码字体，不设置随机获取
        );
        ob_clean();
        $very = new \Think\Verify($cfg);
        $very -> entry();
    }
}
