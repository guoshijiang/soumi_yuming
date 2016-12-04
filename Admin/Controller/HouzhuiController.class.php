<?php
namespace Admin\Controller;
//use Think\Controller;
use Tools\AdminController;
class HouzhuiController extends AdminController {
    public function showlist(){
        $daohang = array(
            'title1' => '后缀管理',
            'title2' => '后缀列表',
            'act' => '添加',
            'act_link' => U('tianjia'),
        );
        //assign给模板的变量信息，"普通模板和布局模板"都可以使用
        $this -> assign('daohang',$daohang);
        $houzhui = new \Model\HouzhuiModel();
        $info = $houzhui->order('houzhui_id')->select();
        $this -> assign('info',$info);
        $this->display();
    }
  
    public function del($houzhui_id){
        $houzhui = new \Model\HouzhuiModel();
          if(IS_GET){
            $shuju = $houzhui
            ->where(array('houzhui_id'=>'$houzhui_id')) 
            ->delete($houzhui_id);
            echo "删除成功";
            $this -> redirect('Houzhui/showlist');
          }else{
            $this->display();   
          }
    }
    public function upd(){
        $daohang = array(
            'title1' => '后缀管理',
            'title2' => '修改后缀',
            'act' => '返回',
            'act_link' => U('showlist'),
        );
        //assign给模板的变量信息，"普通模板和布局模板"都可以使用
        $this -> assign('daohang',$daohang);
        $houzhui_id = I('get.houzhui_id');
        $houzhui = new \Model\HouzhuiModel();
        if(IS_POST){
            $houzhui->create();
            if($houzhui ->save($arr)){
                $this -> success('修改数据成功',U('showlist'),1);
            }else{
                $this -> error('修改数据失败',U('upd',array('houzhui_id'=>$houzhui_id)),1);
            }
        }else{
            $info = $houzhui ->find($houzhui_id);
            $this -> assign('info',$info);
            $this->display();
        }
    }
    public function tianjia(){
        $daohang = array(
            'title1' => '后缀管理',
            'title2' => '添加后缀',
            'act' => '返回',
            'act_link' => U('showlist'),
        );
        //assign给模板的变量信息，"普通模板和布局模板"都可以使用
        $this -> assign('daohang',$daohang);
        $houzhui = new \Model\HouzhuiModel();
        if(IS_POST){
            //dump($_POST);
            $shuju = $houzhui -> create();
            if($houzhui->add($shuju)){
                $this -> success('添加后缀成功',U('showlist'),1);
            }else{
                $this -> error('添加后缀失败',U('tianjia'),1);
            }
        }else{
            $houzhuiinfo = D('Houzhui')->select();
            $this -> assign('houzhuiinfo',$houzhuiinfo);
            $this -> display(); 
        }
    }
}