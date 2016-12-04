<?php
namespace Admin\Controller;
//use Think\Controller;
use Tools\AdminController;
class YumingController extends AdminController {
  public function showlist(){
         $daohang = array(
            'title1' => '域名管理',
            'title2' => '域名列表',
            'act' => '添加',
            'act_link' => U('tianjia'),
        );
        //assign给模板的变量信息，"普通模板和布局模板"都可以使用
        $this -> assign('daohang',$daohang);
        //后缀
        $info11 = D('Houzhui')
           //->field('houzhui_id')
           ->select();
          //dump( $info11);
        $this->assign('info11',$info11); 
        //顶级分类
          $infoA = D('Category')
           ->where(array('cat_level'=>'0'))
           ->select();
        $this->assign('infoA',$infoA);
        //dump($infoA) ;
        //次级分类
          $infoB = D('Category')
           ->where(array('cat_level'=>'1'))
           ->select();
         $this->assign('infoB',$infoB);
   $this->display();
}
//点击事件
 public function find3(){
    $houzhui_id   = I('get.houzhui_id');
    $cat_id       = I('get.cat_id');
    $yuming_name  = I('get.yuming_name');
    //类型
    if($cat_id ==30 || $cat_id ==31 || $cat_id==32){
        $cateinfo= D('Yuming')
               ->field('yuming_id')
               ->where(array('cat_id'=>$cat_id))
               ->order('yuming_id desc')
               ->select();
            $sum = '';
            $count = count($cateinfo);
            for($i = 0; $i < $count; $i++){
                $sum .= $cateinfo[$i]['yuming_id'].',';
            }
           $sum = rtrim($sum, ",");
           $sum = explode(',',$sum);
           $yumingct_ids = $sum;
     }else if($cat_id==='0'){
         $cateinfo= D('Yuming')
           ->field('yuming_id')
           ->select();
        $sum = '';
            $count = count($cateinfo);
            for($i = 0; $i < $count; $i++){
                $sum .= $cateinfo[$i]['yuming_id'].',';
            }
          $sum = rtrim($sum, ",");
          $sum = explode(',',$sum);
          $yumingct_ids = $sum;
     }else{
      $cateinfo= D('YumingCat')
               ->alias('yc')
               ->join('__YUMING__ y on y.yuming_id=yc.yuming_id')
               ->join('__CATEGORY__ c on y.cat_id=c.cat_id')
               ->field('y.yuming_id')
               ->where(array('yc.cat_id'=>$cat_id))
               ->order('y.yuming_id desc')
               ->select();
            $sum = '';
            $count = count($cateinfo);
            for($i = 0; $i < $count; $i++){
                $sum .= $cateinfo[$i]['yuming_id'].',';
            }
           $sum = rtrim($sum, ",");
           $sum = explode(',',$sum);
          $yumingct_ids = $sum;
     }
      //后缀ID
    if($houzhui_id ==='0'){
         $cateinfo= D('Yuming')
           ->field('yuming_id')
           ->select();
        $sum = '';
            $count = count($cateinfo);
            for($i = 0; $i < $count; $i++){
                $sum .= $cateinfo[$i]['yuming_id'].',';
            }
          $sum = rtrim($sum, ",");
          $sum = explode(',',$sum);
          $yuminghz_ids = $sum;
      }else{
      $cateinfo= D('Yuming')
           ->where(array('houzhui_id'=>$houzhui_id))
           ->field('yuming_id')
           ->select();
        //dump($cateinfo);
            $sum = '';
            $count = count($cateinfo);
            for($i = 0; $i < $count; $i++){
                $sum .= $cateinfo[$i]['yuming_id'].',';
            }
           $sum = rtrim($sum, ",");
           $sum = explode(',',$sum);
           $yuminghz_ids = $sum;
    } 
     //搜索
    if($yuming_name){
        $cateinfo = D('Yuming')
                ->where(array('yuming_name'=>array('like',"%$yuming_name%")))
                ->field('yuming_id')
                ->select(); 
             $sum = '';
             $count = count($cateinfo);
            for($i = 0; $i < $count; $i++){
                $sum .= $cateinfo[$i]['yuming_id'].',';
            }
          $sum = rtrim($sum, ",");
          $sum = explode(',',$sum);
          $yumingss_ids = $sum;
      }else{
          $cateinfo= D('Yuming')
            ->field('yuming_id')
            ->select();
           $sum = '';
            $count = count($cateinfo);
            for($i = 0; $i < $count; $i++){
                $sum .= $cateinfo[$i]['yuming_id'].',';
            }
          $sum = rtrim($sum, ",");
          $sum = explode(',',$sum);
          $yumingss_ids = $sum;
    }
     $yuming_ids = array_intersect($yuminghz_ids,$yumingct_ids,$yumingss_ids);
     $yuming_ids = empty($yuming_ids)?'0':$yuming_ids;
      if(empty($yuming_ids)){
        $ss = 0;
      }else{
        $ss = count($yuming_ids);
      }
      //$this -> assign('ss',$ss);
       if($yuming_ids=='0'){
            $cateinfo= D('Yuming')
               ->field('yuming_id')
               ->select();
            $sum = '';
                $count = count($cateinfo);
                for($i = 0; $i < $count; $i++){
                    $sum .= $cateinfo[$i]['yuming_id'].',';
                }
              $sum = rtrim($sum, ",");
              $sum = explode(',',$sum);
              $yuming_ids = $sum;
          $yumingtotal =count($yuming_ids); 
       }
   $yumingtotal =count($yuming_ids);
     $yuming_ids = implode(',',$yuming_ids);
     $arr = array(
        "yumingtotal" =>$yumingtotal,
        "ss"          =>$ss,
        "yuming_ids"  =>$yuming_ids,
      );
     $arr = implode(',',$arr);
     echo json_encode($arr);
  }
 //ajax获得域名信息
   public function getyuming($page_index){
          $per = 20;
          $yuming_ids = I('get.yuming_ids');
          $page_index = I('get.page_index');//当前页码-1  的信息
          $yuminginfo= D('Yuming')
               ->alias('y')
               ->join('__CATEGORY__ c on y.cat_id=c.cat_id')
               ->join('__HOUZHUI__ h on y.houzhui_id=h.houzhui_id')
               ->field('y.*,c.cat_name,c.cat_id,h.houzhui_name,h.houzhui_id')
               ->where(array('y.yuming_id' =>array('in',$yuming_ids)))
               ->order('y.yuming_id desc')
               ->limit($page_index*$per,$per)
               ->select();
        echo json_encode($yuminginfo);
    }

    public function tianjia(){
        $daohang = array(
            'title1' => '域名管理',
            'title2' => '添加域名',
            'act' => '返回',
            'act_link' => U('showlist'),
        );
        //assign给模板的变量信息，"普通模板和布局模板"都可以使用
        $this -> assign('daohang',$daohang);
    	if(IS_POST){
    		$yuming = D('Yuming');
    		$shuju = $yuming ->create();
        $shuju['upd_time'] = time();
    		$shuju['add_time'] = time();
       // $shuju['add_time'] = $shuju['upd_time']= date('Y-m-d H:i:s');
            $shuju['yuming_introduce'] = \fanXSS($_POST['yuming_introduce']);
            //dump($shuju);die();
    		if($yuming->add($shuju)){
               //dump($yuming);die(); 
    			$this -> success('添加成功','showlist',1);
    		}else{
    			$this -> error('添加失败','tianjia',1);
    		}
    	}else{
            //后缀
            $houzhuiinfo = D('Houzhui')
                  ->select();
            $this->assign('houzhuiinfo',$houzhuiinfo);
            //分类
            $cateinfoA = D('Category')
                  ->where(array('cat_level'=>0))
                  ->order('cat_path')
                  ->select();
            $this->assign('cateinfoA',$cateinfoA);
    	    $this->display();	
    	}
    }
public function del($yuming_id){
        $yuming = new \Model\YumingModel();
        if(IS_GET){
          //删除域名扩展分类信息
            D('YumingCat')
                 ->where(array('yuming_id'=>$yuming_id))
                 ->delete();
            $shuju = $yuming
            ->where(array('yuming_id'=>$yuming_id)) 
            ->delete($yuming_id);
            $this -> redirect('Yuming/showlist');
        }else{
            $this->display();   
        }
    }
public function upd(){
        $daohang = array(
            'title1' => '域名管理',
            'title2' => '修改域名',
            'act' => '返回',
            'act_link' => U('showlist'),
        );
        //assign给模板的变量信息，"普通模板和布局模板"都可以使用
        $this -> assign('daohang',$daohang);
        $yuming_id = I('get.yuming_id');
        $yuming = D('Yuming');
        if(IS_POST){
            //dump($_POST);die();
            if(!empty($_POST['ext_cat'])){
                   D('YumingCat')
                       ->where(array('yuming_id'=>$yuming_id))
                       ->delete();
                  foreach($_POST['ext_cat'] as $k => $v){
                      if($v!="0"){
                          $arr = array(
                                'yuming_id' => $yuming_id,
                                'cat_id'    => $v,
                              );
                         D('YumingCat')->add($arr);
                      }
                   }
           }
            $shuju = $yuming ->create();
            $shuju['yuming_introduce'] = \fanXSS($_POST['yuming_introduce']);
            $shuju['upd_time'] = time();
            if($yuming ->save($shuju)){
                $this -> success('修改数据成功',U('showlist'),1);
            }else{
                $this -> error('修改数据失败',U('upd',array('yuming_id'=>$yuming_id)),1);
            }
        }else{
            $houzhuiinfo = D('Houzhui')
                ->select();
            //获得域名的扩展分类信息
            $ext = D('YumingCat')
                ->where(array('yuming_id'=>$yuming_id))
                ->field('group_concat(cat_id) as catid')
                ->find();
            //dump($ext);//array(1) {["catid"] => string(5) "19,20"}
            $extcatinfo= $ext['catid']; //string(5) "19,20"
            $this -> assign('extcatinfo',$extcatinfo);
            $this -> assign('houzhuiinfo',$houzhuiinfo);
            $catinfoA = D('Category')
                ->where(array('cat_level'=>0))
                ->order('cat_path')
                ->select();
            $this -> assign('catinfoA',$catinfoA);
            $info = $yuming ->find($yuming_id);
            $this -> assign('info',$info);
            $this->display();  
        }
    }
}