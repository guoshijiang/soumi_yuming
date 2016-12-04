<?php
namespace Admin\Controller;
//use Think\Controller;
use Tools\AdminController;
class ZixunController extends AdminController {
    public function showlist(){
        $daohang = array(
            'title1' => '咨讯管理',
            'title2' => '咨讯列表',
            'act' => '添加',
            'act_link' => U('tianjia'),
        );
        //assign给模板的变量信息，"普通模板和布局模板"都可以使用
        $this -> assign('daohang',$daohang);
        $zixun = new \Model\ZixunModel();
        $info = $zixun->order('id')->select();
        $this -> assign('info',$info);
        $this->display();
    }
    
    public function del($id){
        $zixun = new \Model\ZixunModel();
          if(IS_GET){
            $shuju = $zixun
            ->where(array('id'=>'$id')) 
            ->delete($id);
            $this -> redirect('Zixun/showlist');
          }else{
            $this->display();   
          }
    }
    public function upd(){
        $daohang = array(
            'title1' => '咨讯管理',
            'title2' => '修改咨讯',
            'act' => '返回',
            'act_link' => U('showlist'),
        );
        //assign给模板的变量信息，"普通模板和布局模板"都可以使用
        $this -> assign('daohang',$daohang);
        $id = I('get.id');
        $zixun = new \Model\ZixunModel();
        if(IS_POST){
            $zixun->create();
            if($zixun ->save($arr)){
                $this -> success('修改数据成功',U('showlist'),1);
            }else{
                $this -> error('修改数据失败',U('upd',array('id'=>$id)),1);
            }
        }else{
            $info = $zixun ->find($id);
            $this -> assign('info',$info);
            $this->display();
        }
    }
    public function tianjia(){
        $daohang = array(
            'title1' => '咨讯管理',
            'title2' => '添加咨讯',
            'act' => '返回',
            'act_link' => U('showlist'),
        );
        //assign给模板的变量信息，"普通模板和布局模板"都可以使用
        $this -> assign('daohang',$daohang);
        $zixun = new \Model\ZixunModel();
        if(IS_POST){
            //dump($_POST);
            $shuju = $zixun -> create();
            if($zixun->add($shuju)){
                $this -> success('添加咨讯成功',U('showlist'),1);
            }else{
                $this -> error('添加咨讯失败',U('tianjia'),1);
            }
        }else{
            $zixuninfo = D('Zixun')->select();
            $this -> assign('zixuninfo',$zixuninfo);
            $this -> display(); 
        }
    }
}