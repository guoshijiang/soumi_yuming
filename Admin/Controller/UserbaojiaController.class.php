<?php
namespace Admin\Controller;
//use Tools\AdminController;
use Tools\AdminController;
class UserbaojiaController extends AdminController {

    function showlist(){
        $daohang = array(
            'title1' => '用户报价',
            'title2' => '报价列表',
        );
        //assign给模板的变量信息，"普通模板和布局模板"都可以使用
        $this -> assign('daohang',$daohang);
         $info1= D('Userbaojia')
            ->field('group_concat(user_id) userid')
            ->find();
        $info1 = explode(',',$info1[userid]);
        // array_unique()
         $info1 = array_unique($info1);
         //dump($info1);
        $info= D('User')
               ->field('user_name,user_id,dl_time')
              //->where(array('y.yuming_id' =>array('in',$yuming_ids)))
               ->order('dl_time desc')
               ->where(array('user_id'=> array('in',$info1)))
               ->select();
        //$this -> assign('info',$info);
        $usertotal = count($info);
        $this -> assign('usertotal',$usertotal);
        //dump($usertotal);
        //dump($info);
        $this->display(); 
    }
    //ajax获得报价用户信息
   public function getuserbaojia($page_index){
          $per = 30;
         $page_index = I('get.page_index');//当前页码-1  的信息
         $info1= D('Userbaojia')
            ->field('group_concat(user_id) userid')
            ->find();
        $info1 = explode(',',$info1[userid]);
        // array_unique()
         $info1 = array_unique($info1);
         //dump($info1);
        $info= D('User')
               ->field('user_name,user_id,dl_time')
              //->where(array('y.yuming_id' =>array('in',$yuming_ids)))
               ->order('dl_time desc')
               ->where(array('user_id'=> array('in',$info1)))
               ->limit($page_index*$per,$per)
               ->select();
        echo json_encode($info);
    }

     public function xiangqing(){
       $daohang = array(
            'title1' => '用户报价',
            'title2' => '报价详情',
            'act' => '返回',
            'act_link' => U('showlist'),
        );
        //assign给模板的变量信息，"普通模板和布局模板"都可以使用
        $this -> assign('daohang',$daohang);
         $user_id = I('get.user_id');
         $info= D('Userbaojia')
               ->alias('ub')
               ->join('__YUMING__ y on ub.yuming_id=y.yuming_id')
               ->join('__USER__ u on ub.user_id=u.user_id')
               ->field('ub.*,y.yuming_name,y.yuming_xiaoshou_price,u.user_name,u.user_phone')
               ->order('ub.add_time desc')
               ->where(array('ub.user_id'=>$user_id))
               ->select();
        $this -> assign('info',$info);
        $info1= D('User')
            ->field('user_name,user_phone,qq,weixin')
            ->where(array('user_id'=>$user_id))
            ->select();
     $this -> assign('info1',$info1);
       //dump($info1);
      //dump($user_id);
    $this->display();   
    }
     public function userbaojiashoulistdel(){
      $user_id = I('get.user_id');
        if($user_id){
          $shuju = D('Userbaojia')
            ->where(array('user_id'=>$user_id))
            ->field('group_concat(id) id') 
            ->find();
        $baojia_ids = explode(',',$shuju[id]);
        $userbaojia = D('Userbaojia')
               ->where(array('id'=>array('in',$baojia_ids)))
               ->delete();
        //dump($userbaojia);
        //dump($baojia_ids);
        //dump($shuju);
        //dump($_GET);//die();
            $this -> redirect('Userbaojia/showlist');
        }
    }
    public function del(){
      $user_id = I('get.user_id');
      $id =I('get.id');
      if($id){
         $userbaojia = D('Userbaojia')
               ->where(array('id'=>$id))
               ->delete();
        $this -> redirect('Userbaojia/xiangqing',array('user_id'=>$user_id));
      }
       
    }
}
