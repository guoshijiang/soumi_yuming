<?php
namespace Home\Controller;
use Tools\HomeController;
class IndexController extends HomeController {
public function wall(){
  if($_POST){
    $yuming = I('post.yumingname');
    $ipadress = I('post.ip');
      if($yuming){
        $url = "http://api.k780.com:88/?app=ip.get&ip=$yuming&appkey=21774&sign=e4b4a45d44df014da6fd908039e5d5d4&format=json";
        $yumingname = file_get_contents($url);
        $yumingname = json_decode($yumingname, true);
        $status = $yumingname['result']['status'];
        if($status === 'OK'){
           $status = '恭喜您！您的域名'.$yuming.'没有被墙。';
        }else if($status === 'WAIT_PROCESS'){
           $status = '等待系统处理';
        }else{
          $status = '真遗憾！您的域名'.$yuming.'被墙了。';
        }
     //var_dump($status);
         $this->assign('yuming',$yuming);
         $this->assign('status',$status);
    //echo "<br />";
         $this->display();
      }
    
     if($ipadress){
         $url1 = "http://api.k780.com:88/?app=ip.get&ip=$ipadress&appkey=21774&sign=e4b4a45d44df014da6fd908039e5d5d4&format=json";
         $ip = file_get_contents($url1);
         $ip = json_decode($ip, true);
         $status11 = $ip['result']['status'];
         if($status11 ==''){
           $status1 = '域名解析失败！';
           //var_dump($status1);
         }else if($status11 === 'WAIT_PROCESS'){
           $status1 = '等待系统处理';
         }else if($status11 === 'OK'){
            $ip1 = $ip['result']['ip'];
            //echo "<br />";
            //var_dump($ip1);
            $this->assign('ip1',$ip1);
            $detailed = $ip['result']['detailed'];
            $this->assign('detailed',$detailed);
            $this->assign('ipadress',$ipadress);
            //echo "<br />";
            //var_dump($ipadress);
          $status1 = '域名/IP解析成功！';
         }
         //var_dump($status11);
           $this->assign('status1',$status1);
           $this->display();
     }
 }else{
   $this->display();
 }
  
   
}
  public function whois(){
    $yumingname = I('post.yumingname');
    //dump($yumingname);
     //$yumingname ='soumi.com';
    $url = "http://api.k780.com:88/?app=domain.whois&domain=$yumingname&appkey=21774&sign=e4b4a45d44df014da6fd908039e5d5d4&format=json";
    $WhoisData = file_get_contents($url);
    $WhoisData = json_decode($WhoisData, true);
    $info = $WhoisData['result'];
    //dump($info);
    $this->assign('info',$info);
     $status = $info['status'];
     if($status === 'ALREADY_WHOIS'){
      $status = '已注册';
     }
     if($status === 'WAIT_PROCESS'){
      $status = '等待系统处理';
     }
     if($status === 'NOT_REGISTER'){
      $status = '未注册';
     }
     if($status === 'BE_RETAINED'){
      $status = '域名被保留';
     }
    $this->assign('status',$status);
    $this->display();
  }
  public function index(){
  //推荐(1-2-3)
    	$info1 = D('Yuming')
    	   ->where(array('is_rec'=>'1'))
    	   ->order('upd_time desc')
    	   ->field('yuming_id,yuming_name,yuming_introduce,yuming_xiaoshou_price')
    	   ->limit(0,8)
    	   ->select();
      //dump($info1);die();
    	$info2 = D('Yuming')
         ->where(array('is_rec'=>'1'))
         ->order('upd_time desc')
         ->field('yuming_id,yuming_name,yuming_introduce,yuming_xiaoshou_price')
         ->limit(8,16)
         ->select();
    	$info3 = D('Yuming')
         ->where(array('is_rec'=>'1'))
         ->order('upd_time desc')
         ->field('yuming_id,yuming_name,yuming_introduce,yuming_xiaoshou_price')
         ->limit(16,24)
         ->select();
    	   //一口价41,42,43.
    	$info41 = D('Yuming')
    	   ->where(array('is_qiang'=>'1'))
    	   ->order('upd_time desc')
    	   ->field('yuming_id,yuming_name,yuming_introduce,yuming_xiaoshou_price')
    	   ->limit(0,8)
    	   ->select();
      $info42 = D('Yuming')
         ->where(array('is_qiang'=>'1'))
         ->order('upd_time desc')
         ->field('yuming_id,yuming_name,yuming_introduce,yuming_xiaoshou_price')
         ->limit(8,16)
         ->select();
     $info43 = D('Yuming')
         ->where(array('is_qiang'=>'1'))
         ->order('upd_time desc')
         ->field('yuming_id,yuming_name,yuming_introduce,yuming_xiaoshou_price')
         ->limit(16,24)
         ->select();
           //最新排行5
    	$info5 = D('Yuming')
         ->where(array('is_new'=>'1'))
    	   ->order('upd_time desc')
    	   ->field('yuming_id,yuming_name,yuming_xiaoshou_price,yuming_introduce')
    	   ->limit(0,10)
    	   ->select();
         //纯数字7
         $info7 = D('Category')
           ->where(array('cat_pid'=>'31'))
           ->select();
        //后缀分类11
         $info11 = D('Houzhui')
           ->select();  
        //纯字母8
          $info8 = D('Category')
           ->where(array('cat_pid'=>'30'))
           ->select(); 
        //杂米9
          $info9 = D('Category')
           ->where(array('cat_pid'=>'32'))
           ->select();
        //已成交10
        $info10 = D('Yuming')
           ->where(array('is_sell'=>'1'))
           ->order('upd_time desc')
           ->field('yuming_id,yuming_name')
           ->limit(0,15)
           ->select();
        //议价域名
        $info100 = D('Yuming')
         ->where(array('yuming_yijia_price'=>'1'))
         ->order('yuming_id desc')
         ->field('yuming_id,yuming_name,yuming_xiaoshou_price,yuming_introduce')
         ->limit(0,8)
         ->select();
         //纯数字分页
         $cattotal = D('Yuming')
              ->where(array('cat_id'=>'31'))
              ->count();
         $this->assign('cattotal',$cattotal);
      //议价域名分页
       $yumingtotal = D('Yuming')
                ->where(array('yuming_yijia_price'=>'1'))
                ->count();
       //dump($yumingtotal);die();
        $this -> assign('yumingtotal',$yumingtotal);
    	//dump($info7);die();
    	$this->assign('info1',$info1);
    	$this->assign('info2',$info2);
    	$this->assign('info3',$info3);
    	$this->assign('info41',$info41);
      $this->assign('info42',$info42);
      $this->assign('info43',$info43);
    	$this->assign('info5',$info5);
      $this->assign('info7',$info7);
      $this->assign('info11',$info11);
      $this->assign('info8',$info8);
      $this->assign('info9',$info9);
      $this->assign('info10',$info10);
     //$this->assign('info100',$info100);
      $this->display();
    }
    //ajax获得议价域名信息
      public  function getyuming($page_index){
        $per = 8;
         $page_index = I('get.page_index');//当前页码-1  的信息
          $yuminginfo= D('Yuming')
                 ->where(array('yuming_yijia_price'=>'1'))
                 ->order('upd_time desc')
                 ->field('yuming_id,yuming_name,yuming_xiaoshou_price,yuming_introduce')
                 ->limit($page_index*$per,$per)
                 ->select();
        echo json_encode($yuminginfo);

    }
    //推荐和交易
 public function tuijian(){
   $info1 = D('Yuming')
         ->alias('y')
         ->join('__YUMING_CAT__ yc on y.yuming_id=yc.yuming_id')
         ->where(array('y.is_rec'=>'1'))
         ->order('y.yuming_id desc')
         ->field('y.yuming_id,y.yuming_name,y.is_rec,y.yuming_introduce,y.yuming_xiaoshou_price,yc.cat_id')
         ->select();
    $tuijiantotal = count($info1);
    $this -> assign('tuijiantotal',$tuijiantotal);
    //$this -> assign('info1',$info1);
    $this->display();
  }
 public function tuijianyuming($page_index){
         $per = 20;
          $page_index = I('get.page_index');//当前页码-1  的信息
          $catinfo1= D('Yuming')
              ->alias('y')
              ->join('__YUMING_CAT__ yc on y.yuming_id=yc.yuming_id')
              ->where(array('y.is_rec'=>'1'))
              ->order('y.yuming_id desc')
              ->limit($page_index*$per,$per)
              ->field('y.yuming_id,y.yuming_name,y.is_rec,y.yuming_introduce,y.yuming_xiaoshou_price,yc.cat_id')
              ->select();
      echo json_encode($catinfo1);
 }
  public function jiaoyi(){
      $info1 = D('Yuming')
         ->where(array('is_sell'=>'1'))
         ->order('upd_time desc')
         ->field('yuming_id,is_sell,yuming_name,yuming_introduce,yuming_xiaoshou_price')
         ->select();
    $jiaoyitotal = count($info1);
    $this -> assign('jiaoyitotal',$jiaoyitotal);
    $this->display();
 }
  public function jiaoyiyuming($page_index){
        $per = 20;
        $page_index = I('get.page_index');//当前页码-1  的信息
        $catinfo1= D('Yuming')
         ->where(array('is_sell'=>'1'))
         ->order('upd_time desc')
         ->limit($page_index*$per,$per)
         ->field('yuming_id,yuming_name,yuming_introduce,yuming_xiaoshou_price')
         ->select();   
      echo json_encode($catinfo1);
 }
    //关于我们
    public function about(){
     $this->display();
       }
public function find(){
       //后缀
        $info11 = D('Houzhui')
           //->field('houzhui_id')
           ->select();
          //dump( $info11) ;
        $this->assign('info11',$info11); 
        //分类
          $infoA = D('Category')
           ->where(array('cat_level'=>'0'))
           ->select();
        $this->assign('infoA',$infoA);
        //次级分类
        $infoB = D('Category')
           ->where(array('cat_level'=>'1'))
           ->select();
        $this->assign('infoB',$infoB);
      $this->display();
   }
  public function find3(){
    $houzhui_id   = I('get.houzhui_id');
    $cat_id       = I('get.cat_id');
    $yuming_name  = I('get.yuming_name');
    //类型
    if($cat_id ==30 || $cat_id ==31 || $cat_id==32){
        $cateinfo= D('Yuming')
               ->field('yuming_id')
               ->where(array('cat_id'=>$cat_id,'is_sell'=>'0'))
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
           ->where(array('is_sell'=>'0'))
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
               ->where(array('yc.cat_id'=>$cat_id,'y.is_sell'=>'0'))
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
           ->where(array('is_sell'=>'0'))
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
           ->where(array('houzhui_id'=>$houzhui_id,'is_sell'=>'0'))
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
                ->where(array('yuming_name'=>array('like',"%$yuming_name%"),'is_sell'=>'0'))
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
            ->where(array('is_sell'=>'0'))
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
               ->where(array('is_sell'=>'0'))
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
//ajax获得域名分
public  function findyuming($page_index){
       $per = 11;
       $page_index = I('get.page_index');//当前页码-1  的信息
       $yuming_ids = I('get.yuming_ids');//域名IDs
      $catinfo1= D('Yuming')
        ->alias('y')
        ->join('__CATEGORY__ c on y.cat_id=c.cat_id')
        ->field('y.yuming_id,y.yuming_name,y.yuming_introduce,y.yuming_xiaoshou_price')
        ->limit($page_index*$per,$per)
        //->where(array('y.yuming_id' =>$yuming_ids))
        ->where(array('y.yuming_id' =>array('in',$yuming_ids)))
        ->order('y.yuming_id desc')
        ->select();
  echo json_encode($catinfo1);
   }
  }
