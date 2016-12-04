<?php
namespace Admin\Controller;
//use Think\Controller;
use Tools\AdminController;
class RoleController extends AdminController {
    //权限列表展示
    public function showlist(){
        $daohang = array(
            'title1' => '职位管理',
            'title2' => '职位列表',
            'act' => '添加',
            'act_link' => U('tianjia'),
        );
        //assign给模板的变量信息，"普通模板和布局模板"都可以使用
        $this -> assign('daohang',$daohang);
        $info = D('Role')->select();
        $this -> assign('info',$info);
        $this -> display();
    }
    function tianjia(){
        $daohang = array(
            'title1' => '职位管理',
            'title2' => '添加职位',
            'act' => '返回',
            'act_link' => U('showlist'),
        );
        //assign给模板的变量信息，"普通模板和布局模板"都可以使用
        $this -> assign('daohang',$daohang);
       if(IS_POST){
            $role = new \Model\RoleModel();
            $shuju = $role ->create();
            if($role->add($shuju)){
                $this -> success('添加成功','showlist',1);
            }else{
                $this -> error('添加失败','tianjia',1);
            }
        }else{
            $this->display();   
        } 
    }
    public function del($role_id){
        $role = new \Model\RoleModel();
        if(IS_GET){
            $shuju = $role
            ->where(array('role_id'=>'$role_id')) 
            ->delete($role_id);
            echo "删除成功";
            $this -> redirect('Role/showlist');
        }else{
            $this->display();   
        }
    }
private function saveAuthAC($auth_ids){
        //根据$auth_ids获得权限信息
        //select() 全部数据
        //select(数字) 单个记录信息(id=数字)
        //select("数字,数字,数字。。")多个记录信息(id in 数字,数字,数字。。)
        $authinfo = D('Auth')->select($auth_ids);
        $s = "";
        foreach($authinfo as $k => $v){
            if(!empty($v['auth_c']) && !empty($v['auth_a']))
            $s .= $v['auth_c'].'-'.$v['auth_a'].",";
        }
        $s = rtrim($s,',');
        return $s;
    }

    //分配权限
 public function distribute(){
        $daohang = array(
            'title1' => '职位管理',
            'title2' => '给职位分配权限',
            'act' => '返回',
            'act_link' => U('showlist'),
        );
        //assign给模板的变量信息，"普通模板和布局模板"都可以使用
        $this -> assign('daohang',$daohang);
        //获得分配权限的角色信息
        $role_id = I('get.role_id');
        $role = D('Role');
        if(IS_POST){
            //dump($_POST);die();
            $role_id = I('post.role_id');
            $auth_ids = implode(',',$_POST['auth_id']); //Array-->String
            $auth_ac = $this -> saveAuthAC($auth_ids);

            $arr = array(
                'role_id' => $role_id,
                'role_auth_ids' => $auth_ids,
                'role_auth_ac' => $auth_ac,
            );
            //dump($arr);
            if($role->save($arr)){
                $this -> success('分配权限成功',U('showlist'),1);
            }else{
                $this -> error('分配权限失败',U('distribute',array('role_id'=>$role_id)),1);
            }
        }else{
        $roleinfo = D('Role')->find($role_id);
        $this -> assign('roleinfo',$roleinfo);
        //获得被分配的权限信息（顶级/次级）
        $authinfoA = D('Auth')
              ->where(array('auth_level'=>0))
              ->select();
        $authinfoB = D('Auth')
              ->where(array('auth_level'=>1))
              ->select();
        $authinfoC = D('Auth')
              ->where(array('auth_level'=>2))
              ->select();
        $this -> assign('authinfoA',$authinfoA);
        $this -> assign('authinfoB',$authinfoB);
        $this -> assign('authinfoC',$authinfoC);    
        $this->display(); 
        }
    }
}