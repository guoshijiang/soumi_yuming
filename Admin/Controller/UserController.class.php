<?php
namespace Admin\Controller;
//use Tools\AdminController;
use Tools\AdminController;
class UserController extends AdminController {
    public function changepassword(){
      layout(false);
      if(IS_POST){
       // dump($_POST);die();
        $mg_id = I('post.mg_id');
        $mg_pwd   = I('post.mg_pwd');
        $pwd1   = I('post.pwd1');
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
    //退出系统
    function logout(){
        session(null);   //清除session
        $this -> redirect('Manager/login');  //跳转到登录页面
    }
    function showlist(){
        $daohang = array(
            'title1' => '用户管理',
            'title2' => '用户列表',
        );
        //assign给模板的变量信息，"普通模板和布局模板"都可以使用
        $this -> assign('daohang',$daohang);
        $info= D('User')
            ->order('user_id desc')
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
function register(){
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
    public function del($user_id){
        $user = new \Model\UserModel();
        if(IS_GET){
            $shuju = $user
            ->where(array('user_id'=>'$user_id')) 
            ->delete($user_id);
            $this -> redirect('User/showlist');
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
        $very = new \Think\Verify($cfg);
        $very -> entry();
    }
}
