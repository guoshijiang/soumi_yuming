<?php
namespace Admin\Controller;
//use Think\Controller;
use Tools\AdminController;
class IndexController extends AdminController {
    function __construct(){
        parent::__construct();
        layout(false);
    }
    public function index(){
        $this->display();
    }
    public function center(){
        $this->display();
    }
    public function down(){
        $this->display();
    }
    public function left(){
        $admin_id = session('admin_id');
        $admin_name = session('name');
        if($admin_name==='admin'){
            $authinfoA = D('Auth')
                 ->where(array('auth_level'=>0))
                 ->select();
            $authinfoB =D('Auth')
                 ->where(array('auth_level'=>1))
                 ->select();
        }else{
            //id--->role_id----->auth_ids
            $auth_ids = D('Manager')
               ->alias('m') 
               ->join('left join sp_role as r on m.role_id=r.role_id')
               ->where(array('m.mg_id'=>$admin_id))
               ->getField('r.role_auth_ids');
            //根据$auth_ids查询对应的信息
            //顶级，次级分别获取
            $authinfoA = D('Auth')
                ->where(array('auth_level'=>0,'auth_id'=>array('in',$auth_ids)))
                ->select();
            $authinfoB = D('Auth')
                ->where(array('auth_level'=>1,'auth_id'=>array('in',$auth_ids)))
                ->select();
        }
        $this ->assign('authinfoA',$authinfoA);
        $this ->assign('authinfoB',$authinfoB);
        $this->display();
    }
    public function right(){
        $this->display();
    }
    public function top(){
        $admin_id = session('admin_id');
        $admin_name = session('name');
        $admin_role = session('admin_role');
        //$info = D('Role')->find($admin_role);
        $info = D('Manager')
               ->alias('m') 
               ->join('left join sp_role as r on m.role_id=r.role_id')
               ->where(array('m.mg_id'=>$admin_id))
               ->field('m.role_id,r.role_name')
               ->select();
        $this ->assign('info',$info);
        $this->display();
    }
}