<?php
namespace Model;
use Think\Model;
class AuthModel extends Model{
   protected function _after_insert($data,$options){
   	 if($data['auth_pid']==0){
   	 	$path = $data['auth_id'];
   	 }else{
   	 	$ppath = $this
   	 	    ->where(array('auth_id'=>$data['auth_pid']))
   	 	    ->getField('auth_path');
   	 	$path = $ppath.'-'.$data['auth_id'];
   	 }
   	 $level = substr_count($path,'-');
   	// dump($level);
   	 //dump($path);
   	 $arr = array(
   	 	'auth_id'=>$data['auth_id'],
   	 	'auth_path'=>$path,
   	 	'auth_level'=>$level,
   	 	);
   	 $this -> save($arr);
   }
}