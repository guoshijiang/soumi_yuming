<?php
namespace Admin\Controller;
//use Think\Controller;
use Tools\AdminController;
class AuthController extends AdminController {
    public function showlist(){
        $daohang = array(
            'title1' => '权限管理',
            'title2' => '权限列表',
            'act' => '添加',
            'act_link' => U('tianjia'),
        );
        //assign给模板的变量信息，"普通模板和布局模板"都可以使用
        $this -> assign('daohang',$daohang);
    	$auth = new \Model\AuthModel();
    	$info = $auth -> order('auth_path')->select();
    	$this -> assign('info',$info);
        $this->display();
    }
    public function del($auth_id){
        $auth = new \Model\AuthModel();
          if(IS_GET){
            $shuju = $auth
            ->where(array('auth_id'=>'$auth_id')) 
            ->delete($auth_id);
            $this -> redirect('Auth/showlist');
          }else{
            $this->display();   
          }
    }
  
    private function updAuth($auth_pid,$auth_id){
        if($auth_pid=='0'){
             $auth_path = $auth_id;
             return $auth_path;
        }else{
             $auth_path = $auth_pid.'-'.$auth_id;
             return $auth_path;
        }
    }
    public function upd(){
        $daohang = array(
            'title1' => '权限管理',
            'title2' => '修改权限',
            'act' => '返回',
            'act_link' => U('showlist'),
        );
        //assign给模板的变量信息，"普通模板和布局模板"都可以使用
        $this -> assign('daohang',$daohang);
        $auth1 = new \Model\AuthModel();
        $auth_id = I('get.auth_id');
        $auth = new \Model\AuthModel();
        if(IS_POST){
            //dump($_POST);
            $auth_pid  = I('post.auth_pid');
            $auth_id   = I('post.auth_id');
            $auth_name = I('post.auth_name');
            $auth_c    = I('post.auth_c');
            $auth_a    = I('post.auth_a');
            $auth_path = $this -> updAuth($auth_pid,$auth_id);
            //dump($auth_path);
            $auth_level = substr_count($auth_path,'-');
            $arr = array(
                'auth_id'    => $auth_id,
                'auth_name'  => $auth_name,
                'auth_c'     => $auth_c,
                'auth_a'     => $auth_a,
                'auth_pid'   => $auth_pid,
                'auth_level' => $auth_level,
                'auth_path'  => $auth_path,
            );
             //dump($arr);die();
              if($auth ->save($arr)){
                $this -> success('修改数据成功',U('showlist'),1);
            }else{
                $this -> error('修改数据失败',U('upd',array('auth_id'=>$auth_id)),1);
            }
        }else{
            $info1 = $auth1 -> order('auth_path')->select();
            $this -> assign('info1',$info1);
            $info = $auth ->find($auth_id);
            $this -> assign('info',$info);
            $this->display();
        }
    }
    public function tianjia(){
        $daohang = array(
            'title1' => '权限管理',
            'title2' => '添加权限',
            'act' => '返回',
            'act_link' => U('showlist'),
        );
        //assign给模板的变量信息，"普通模板和布局模板"都可以使用
        $this -> assign('daohang',$daohang);
    	$auth = new \Model\AuthModel();
    	if(IS_POST){
    		//dump($_POST);
    		$shuju = $auth -> create();
    		if($auth->add($shuju)){
    			$this -> success('添加权限成功',U('showlist'),1);
    		}else{
    			$this -> error('添加权限失败',U('tianjia'),1);
    		}
    	}else{
    		$authinfo = D('Auth')->order('auth_path')->select();
    		$this -> assign('authinfo',$authinfo);
    	    $this -> display();	
    	}
    }
}