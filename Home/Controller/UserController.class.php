<?php
namespace Home\Controller;
use Tools\HomeController;
class UserController extends HomeController {
     public function login(){
      if(IS_GET){
          $userregister = I('get.');
          $userregister = explode(',', $userregister[cache]);
         $this ->assign('userregister',$userregister);
        //dump($userregister);
      }
        //layout(false); //去除默认布局
        if(IS_POST){
            $name = $_POST['user_name'];
            $pwd = $_POST['user_pwd'];
            $info = D('User')
                ->where(array('user_name'=>$name,'user_pwd'=>$pwd))
                ->find();
            if($info !== null){
             //持久化用户信息
              session('user_id',$info['user_id']);
              session('user_name',$info['user_name']);
               //判断是否有回跳地址并回跳
                    $back_url = session('back_url');
                    if(!empty($back_url)){
                        session('back_url',null);//清除回跳地址
                        $this -> redirect($back_url);
                    }
              //跳转到后台首页面
              // $cate = new \Model\CategoryModel();
              $user_id = session('user_id');
              $user_name = session('user_name');
              $shuju1 = new \Model\UserModel();
              $shuju  =D('User')
                    ->where(array('user_id'=>$user_id))
                    ->select();
              //dump($shuju);
              
               $dl_time = time();
               $arr =array(
                    'user_id'    => $user_id,
                    'user_name'  => $user_name,
                    'user_phone' => $shuju[0][user_phone],
                    'user_pwd'   => $shuju[0][user_pwd],
                    'add_time'   => $shuju[0][add_time],
                    'upd_time'   => $shuju[0][upd_time],
                    'dl_time'    => $dl_time,
                );
               //dump($shuju);
              //dump($user_id);
              //dump($user_name);die();
            if($shuju1 ->save($arr)){
              $this -> redirect('Index/index');
             }    
            }else{
              echo "用户名或密码错误";
           }
        }
        $this -> display();
    }  
     function logout(){
        session(null);   //清除session
        $this -> redirect('Index/index');  //跳转到首页面
    }
    //忘记密码之手机验证  
function yanzhengpwd(){
       $phone = I('post.phone');
       $chknumber = I('post.chknumber');
       $user_id = D('User')
             ->field('group_concat(user_id) user_id')
             ->where(array('user_phone'=>$phone))
             ->find();
      $this -> assign('user_id',$user_id);
        //dump($user_id);
      if(IS_POST){
        $user = D('User')
                 ->field('group_concat(user_phone) user_phone')
                ->find();
         $countphone = strlen($phone);
              if($countphone!==11){
                  $this -> error('手机号码不正确！请重新输入。');
              }
            $s = strpos($user[user_phone],$phone);
            //dump($user);
           // dump($s);//die();
          if($s!==false){
                $vry = new \Think\Verify();
                if($vry -> check($chknumber)){
                  $this -> redirect('User/mimapwd',array('user_id'=>$user_id[user_id]));
                }else{
                  $this -> error('验证码不正确！请重新输入。');
                }
          }else{
            $this -> error('该手机号码还没有被注册！请重新输入。');
          }
      }else{
          $this ->display();
      }  
       
}
//修改密码
function change(){
  $pwd  = I('post.pwd');
  $pwd1 = I('post.pwd1');
  //dump($_POST);
  $user_id = session('user_id');
       $yuanpwd = D('User')
             ->field('user_pwd')
             ->where(array('user_id'=>$user_id))
             ->select();
        $this->assign('yuanpwd',$yuanpwd);
$user = D('User')
      ->where(array('user_id'=>$user_id))
      ->select();
        //dump($mg_id );
        //dump($yuanpwd);
      if(IS_POST){
       //dump($_POST);die();
        $pwd2 = strlen($pwd);
        if($pwd2 === 0){
          $this -> error('密码不能为空！',U('change',array('user_id'=>$user_id)),1);  
        }
        if($pwd2<6){
            $this -> error('密码不能少于6位数',U('change',array('user_id'=>$user_id)),1);
        }
         if($pwd2>26){
            $this -> error('密码不能大于21位数',U('change',array('user_id'=>$user_id)),1);
        }
        if($pwd===$pwd1){
           $arr =array(
              'user_id'      =>$user_id,
              'user_name'    =>$user[0][user_name],
              'user_phone'   =>$user[0][user_phone],
              'user_pwd'     =>$pwd,
              'add_time'     =>$user[0][add_time],
              'upd_time'     =>time(),
              'dl_time'      =>$user[0][dl_time],
               'qq'          =>$user[0][qq],
              'weixin'       =>$user[0][weixin],
        );
            $user = D('User');
            $user ->create();
           // dump( $manager);die();
              if($user ->save($arr)){
                $this -> success('修改密码成功',U('User/message'),1);
              }else{
                $this -> error('修改密码失败',U('change',array('user_id'=>$user_id)),1);
              }
        }else{
           echo "密码不一致！";
        }
      }else{
        $this ->display();
      } 
}
    //忘记密码之输入密码
function mimapwd(){
  $user_id = I('get.user_id');
  $pwd = I('post.first');
  $pwd1 = I('post.second');
  $user = D('User')
      ->where(array('user_id'=>$user_id))
      ->select();
   //dump($user);
   //dump($user_id);
   //dump($_POST);
   $upd_time = time();
  if(IS_POST){
    if($pwd===$pwd1){
      $arr =array(
         'user_id'      =>$user_id,
         'user_name'    =>$user[0][user_name],
         'user_phone'   =>$user[0][user_phone],
         'user_pwd'     =>$pwd,
         'add_time'     =>$user[0][add_time],
         'upd_time'     =>$upd_time,
         'dl_time'      =>$user[0][dl_time],
         'qq'           =>$user[0][qq],
         'weixin'       =>$user[0][weixin],
        );
       //dump($arr);//die() ;
        $user = new \Model\UserModel();
        $user ->create();
           // dump( $manager);die();
        if($user ->save($arr)){
                $this -> success('修改密码成功',U('login'),1);
        }else{
          $this -> error('修改密码失败',U('mimapwd',array('user_id'=>$user_id)),1);
        }
    }else{
      $this -> error('密码不一致',U('mimapwd',array('user_id'=>$user_id)),1);
    }
  }else{
    $this ->display();
  }  
}
//个人信息 ，我的报价 ，账户安全
function message(){
  $user_id = session('user_id');
  if(empty($user_id)){
            $this -> error('没有权限！请登录系统',U('User/login'),1);
        }
  //个人信息
  if(IS_POST){
    $user = D('User')
      ->where(array('user_id'=>$user_id))
      ->select();
    //dump($_POST);//die();
    $qq          = I('post.qq');
    $weixin      = I('post.weixin');
    $user_phone  = I('post.user_phone');
     $upd_time   = time();
     $countphone = strlen($user_phone);
     //dump($countphone);//die();
       if($countphone!==11){
           $this -> error('手机号码不正确！请重新输入。',U('message'),1);
           //$this -> error('手机号码不正确！请重新输入。');
        }
     $arr =array(
         'user_id'      =>$user_id,
         'user_name'    =>$user[0][user_name],
         'user_phone'   =>$user_phone,
         'user_pwd'     =>$user[0][user_pwd],
         'add_time'     =>$user[0][add_time],
         'upd_time'     =>$upd_time,
         'dl_time'      =>$user[0][dl_time],
         'qq'           =>$qq,
         'weixin'       => $weixin,
      );
       //dump($arr);//die() ;
       $user = D('User');
        $user ->create();
           // dump( $manager);die();
        if($user ->save($arr)){
          $this -> redirect('Index/index');
          //$this -> success('修改数据成功',U('showlist'),1);
           //$this -> success('修改信息成功',U('Index/index'),1);
        }else{
           $this -> error('修改信息失败',U('message'),1);
        }
}else{
  $userxinxi = D('User')
      ->where(array('user_id'=>$user_id))
      ->select();
  $this -> assign('userxinxi',$userxinxi);
}
  
//修改信息开始
//修改信息结束
  //我的报价
  $userprice = D('Userbaojia')
      ->alias('ub')
      ->join('__YUMING__ y on ub.yuming_id=y.yuming_id')
      ->where(array('user_id'=>$user_id))
      ->order('ub.add_time desc')
      ->field('y.yuming_name,ub.user_liuyan,ub.user_baojia,ub.add_time,y.yuming_id,y.yuming_xiaoshou_price,ub.id')
      ->select();
    //dump($userprice);
  $this->assign('userprice',$userprice);
  $this ->display();
}
    //用户可能喜欢
   function like(){
        $user_id = session('user_id');
        $yuming_id = I('get.yuming_id');
        //获得报价域名
        $cat_id = D('YumingCat')
               ->where(array('yuming_id'=>$yuming_id))
               ->field('cat_id')
               ->select();
        $cat_id =$cat_id[0][cat_id];
        //dump($cat_id);
        //获得类似报价的域名
         $ls_ids= D('Yuming')
               ->alias('y')
               ->join('__YUMING_CAT__ yc on y.yuming_id=yc.yuming_id')
               ->where(array('yc.cat_id'=>$cat_id,'y.is_sell'=>'0'))
               ->field('yc.cat_id,y.yuming_name,y.yuming_id,y.yuming_xiaoshou_price,yuming_introduce')
               ->limit(0,20)
               ->order('y.yuming_id desc')
               ->select();
         $this->assign('ls_ids',$ls_ids);
         $this ->display();
    } 
//用户信息之我的报价
 function myprice(){
   $id = I('get.id');
   $xiugaibaojia = D('Userbaojia')
         ->alias('ub')
         ->join('__YUMING__ y on ub.yuming_id=y.yuming_id')
         ->field('ub.*,y.yuming_name,y.yuming_xiaoshou_price')
         ->where(array('ub.id'=>$id))
         ->select();
    //dump($xiugaibaojia);
   $this ->assign('xiugaibaojia',$xiugaibaojia);
   $userbaojia = I('post.user_baojia');
   $userliuyan = I('post.user_liuyan');
   if(IS_POST){
      $arr =array(
         'id'             =>$id,
         'user_baojia'    =>$userbaojia,
         'user_liuyan'    =>$userliuyan,
         'user_id'        =>$xiugaibaojia[0][user_id],
         'yuming_id'      =>$xiugaibaojia[0][yuming_id],
         'add_time'       =>time(),
      );
       //dump($arr);//die() ;
       $user = D('Userbaojia');
        $user ->create();
           // dump( $manager);die();
        if($user ->save($arr)){
           $this -> success('修改报价成功',U('User/message'),1);
        }else{
           $this -> error('修改报价失败',U('message'),1);
        }
   }else{
      $this ->display();
   } 
 }
    //用户报价
function price(){
        $user_id = session('user_id');
        $yuming_id = I('get.yuming_id');
       // $cat_id = I('get.cat_id');
            //获得报价域名
        if(empty($user_id)){
            session('back_url','Home/User/price/yuming_id/'.$yuming_id);
        }
        $priceid = D('Yuming')
               ->where(array('yuming_id'=>$yuming_id))
               ->field('yuming_name,yuming_id,yuming_introduce,yuming_xiaoshou_price')
               ->select();
        $this->assign('priceid',$priceid);
        $priceid222 = D('Yuming')
               ->alias('y')
               ->join('__YUMING_CAT__ yc on y.yuming_id=yc.yuming_id')
               ->where(array('y.yuming_id'=>$yuming_id))
               ->field('y.yuming_name,y.yuming_id,yc.cat_id,y.yuming_introduce,y.yuming_xiaoshou_price')
               ->select();
        $cat_id = $priceid222[0][cat_id];
        //dump($cat_id);
        //dump($priceid);
        //获得类似报价的域名
         $ls_ids= D('Yuming')
               ->alias('y')
               ->join('__YUMING_CAT__ yc on y.yuming_id=yc.yuming_id')
               ->field('yc.cat_id,y.yuming_name,y.yuming_id')
               ->where(array('yc.cat_id'=>$cat_id,'y.is_sell'=>'0'))
               ->limit(0,9)
               ->order('y.yuming_id desc')
               ->select();
         $this->assign('ls_ids',$ls_ids);
    if(IS_POST){
      $user_baojia = I('post.user_baojia');
         //dump($user_baojia);
        //dump($_POST);die();
      if(!empty($user_baojia)){
        $yuming_id1 = D('Userbaojia')
              ->where(array('user_id'=>$user_id))
              ->field('group_concat(yuming_id) yuming_id')
              ->find();
        $s = strpos($yuming_id1[yuming_id],$yuming_id);//false
        //dump($yuming_id);
        //dump($s);
        //dump($yuming_id1);//die();
         if($s===false){
            if($user_id){
               $user = new \Model\UserbaojiaModel();
               $shuju = $user ->create();
               $shuju['user_id']    =  $user_id;
               $shuju['yuming_id']  =  $yuming_id;
               $shuju['add_time']   =  time();
                   // dump($shuju);
                if($user->add($shuju)){
                $this -> redirect('User/like',array('yuming_id'=>$yuming_id));
                //$this -> success('提交成功',U('Index/index'),1);
                }else{
                   $this -> error('提交失败',U('price'),1);
                }
            }else{
                $this -> redirect('User/login');
            }
        }else{
          //开始
          $user1_id = D('Userbaojia')
                 ->where(array('user_id'=>$user_id))
                 ->field('group_concat(id) id')
                 ->find();
          $user1_id = explode(',',$user1_id[id]);
          //dump($user1_id);
          $yuming1_id = D('Userbaojia')
              ->where(array('yuming_id'=>$yuming_id))
              ->field('group_concat(id) id')
              ->find();
          $yuming1_id = explode(',',$yuming1_id[id]);
          //dump($yuming1_id);
          $id = array_intersect($user1_id,$yuming1_id);
          $id = implode(',',$id);
           //dump($id);//die();
           $del = D('Userbaojia')
                ->delete($id);
            if($user_id){
               $user = new \Model\UserbaojiaModel();
               $shuju = $user ->create();
               $shuju['user_id']    =  $user_id;
               $shuju['yuming_id']  =  $yuming_id;
               $shuju['add_time']   =  time();
                   // dump($shuju);
                if($user->add($shuju)){
                $this -> redirect('User/like',array('yuming_id'=>$yuming_id));
                //$this -> success('提交成功',U('Index/index'),1);
                }else{
                   $this -> error('提交失败',U('price'),1);
                }
            }else{
                $this -> redirect('User/login');
            }
           //dump($id);die();
        }
        //结束
      }else{
        $this -> redirect('User/price',array('yuming_id'=>$yuming_id,'cat_id'=>$cat_id));
      }        
    }  
      $this ->display();
    }  
//验证码
   function verifyImg(){
        $cfg = array(
            'fontSize'  =>  12,              // 验证码字体大小(px)
            'useCurve'  =>  true,            // 是否画混淆曲线
            'useNoise'  =>  false,            // 是否添加杂点  
            'imageH'    =>  30,               // 验证码图片高度
            'imageW'    =>  95,               // 验证码图片宽度
            'length'    =>  4,               // 验证码位数
            'fontttf'   =>  '4.ttf',              // 验证码字体，不设置随机获取
        );
        $very = new \Think\Verify($cfg);
        $very -> entry();
    }
//用户名验证
public function yhm($user_name){
  $user_name = I('get.user_name');
  $user = D('User')
        ->field('user_name')
        ->select();
           //把二维数组$user转换为字符窜
        $sum = '';
        $count = count($user);
        for($i = 0; $i < $count; $i++){
           $sum .= $user[$i]['user_name'];
        }
$countname = strlen($user_name);
  if($countname<5 || $countname>25){
     echo '<i class="err"></i>用户名长度5到25个字符之间！';
  }else if(strpos($sum,$user_name) !==false){
     echo '<i class="err"></i>用户名已经被注册！请重新输入用户名。！';
  }else{
     echo '<i class="ok"></i>OK';
  }  
}
//手机号码验证
public function sjh($user_phone){
  $user_phone = I('get.user_phone');
  $user = D('User')
        ->field('user_phone')
        ->select();
  $sum = '';
    $count = count($user);
      for($i = 0; $i < $count; $i++){
           $sum .= $user[$i]['user_phone'].',';
    }
  $sum = rtrim($sum, ",");
  if(strpos($sum,$user_phone) ===false){
    echo '<i class="ok"></i>OK';
    //echo "该手机号码已经被注册！请重新输入。";
  }else{
    echo '<i class="err"></i>该手机号码已经被注册！请重新输入。';
    //echo "ok";
  }
}
//验证码
public function yzm($user_phone){
   $vry = new \Think\Verify();
   if($vry -> check($_GET['chknumber'])){
     echo "ok";
   }else{
     echo "验证码错误！";
   }
}
//会员注册
//public function register(){
//   if($_POST){
//     $user = new \Model\UserModel();
//     $shuju = $user ->create();
//     $shuju['add_time'] = time();
//     $shuju['upd_time'] = time();
//     $shuju['dl_time'] = time();
//      if($user->add($shuju)){
//        $this -> success('注册成功',U('login',array('cache'=>$cache)),1);
//      }else{
//         $this -> error('注册失败。',U('register',array('cache'=>$cache)),1);
//      }
//    }else{
//      $this ->display();
//    }
//}
public function register(){
  $user = D('User')
      ->field('user_phone')
      ->select();
  //dump($user);
   $sum = '';
    $count = count($user);
      for($i = 0; $i < $count; $i++){
           $sum .= $user[$i]['user_phone'].',';
    }
  $sum = rtrim($sum, ",");
  //dump($sum);
  if(IS_GET){
     $userregister = I('get.');
     $userregister = explode(',', $userregister[cache]);
     $this ->assign('userregister',$userregister);
     //dump($userregister);
  }
  if(IS_POST){
  $userregister = I('post.');
  $cache = implode(',',$userregister);
        //dump($cache);//die();
     if($userregister[user_name]){
           $user = D('User')
                ->field('user_name')
                ->select();
           //把二维数组$user转换为字符窜
            $sum = '';
            $count = count($user);
            for($i = 0; $i < $count; $i++){
                $sum .= $user[$i]['user_name'];
            }
            $countname = strlen($userregister[user_name]);
           if($countname<5){
              $this -> error('用户名长度不够！请重新输入用户名。',U('register',array('cache'=>$cache)),1);
           }
           if($countname>25){
             $this -> error('用户名太长！请重新输入用户名。',U('register',array('cache'=>$cache)),1);
           }
            //dump($count);//die();
          if(strpos($sum,$userregister[user_name])===false){
                $countphone = strlen($userregister[user_phone]);
                    if($countphone!==11){
                        $this -> error('手机号码不正确！请重新输入。',U('register',array('cache'=>$cache)),1);
                    }
                if($userregister[user_phone]){
                    $countpwd = strlen($userregister[user_pwd]);
                    if($countpwd<6){
                        $this -> error('密码长度不够！请重新输入密码。',U('register',array('cache'=>$cache)),1);
                    }
                    if($countpwd>25){
                        $this -> error('密码太长！请重新输入密码。',U('register',array('cache'=>$cache)),1);
                    }
                    if($userregister[user_pwd]=== $userregister[user_pwd1]){
                      $vry = new \Think\Verify();
                        if($vry -> check($_POST['chknumber'])){
                              $user = new \Model\UserModel();
                              $shuju = $user ->create();
                              $shuju['add_time'] = time();
                              $shuju['upd_time'] = time();
                              $shuju['dl_time'] = time();
                              if($user->add($shuju)){
                                $this -> success('注册成功',U('login',array('cache'=>$cache)),1);
                              }else{
                                 $this -> error('注册失败。',U('register',array('cache'=>$cache)),1);
                              }
                        }else{
                          $this -> error('验证码错误。',U('register',array('cache'=>$cache)),1);
                        }
                    }else{
                      $this -> error('前后密码不一致。',U('register',array('cache'=>$cache)),1);
                    }
                }else{
                  $this -> error('手机号码不正确！请重新输入。',U('register',array('cache'=>$cache)),1);
                }
          }else{
            $this -> error('用户名已经被注册！请重新输入用户名。',U('register',array('cache'=>$cache)),1);
          }  
     }else{
       $this -> error('用户名不能为空！请输入用户名。',U('register',array('cache'=>$cache)),1);
     }
  }else{
   $this->display();  
  }
}
//会员注册结束
public function register1(){
      $user_name =I('post.user_name');
      $user_phone =I('post.user_phone');
      if($user_name&&$user_phone){
           $user = D('User')
                ->field('user_name')
                ->select();
           //把二维数组$user转换为字符窜
            $sum = '';
            $count = count($user);
            for($i = 0; $i < $count; $i++){
                $sum .= $user[$i]['user_name'];
            }
          if(strpos($sum,$user_name)===false){
                $vry = new \Think\Verify();
                if($vry -> check($_POST['chknumber'])){
                    $user_pwd   = I('post.user_pwd');
                    $user_pwd1   = I('post.user_pwd1');
                    if( $user_pwd=== $user_pwd1){
                        $user = new \Model\UserModel();
                              $shuju = $user ->create();
                              $shuju['add_time'] = time();
                              $shuju['upd_time'] = time();
                              $shuju['dl_time'] = time();
                              if($user->add($shuju)){
                                   $this -> success('注册成功','login',1);
                              }else{
                                 $this -> error('注册失败','register',1);
                              }

                      }else{
                          $this -> error('前后密码不一致','register',1);
                        }
                   }else{
                         $this -> error('验证码错误','register',1);
                    }
           }else{
                 $this -> error('用户名已经被注册！请重新输入用户名。','register',1);
            }
      }else{
         $this->display();
      }
  }
}