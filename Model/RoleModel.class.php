<?php
namespace Model;
use Think\Model;
class RoleModel extends Model{
    /* protected function _before_update(&$data,$options){
     	$authinfo = D('Auth')->select($data['role_auth_ids']);
     	$tmp = array();
     	foreach($authinfo as $k => $v){
     		if(!empty($v['auth_c']) && !empty($v['auth_a'])){
     			$tmp[] = $v['auth_c']."-".$v['auth_a'];
     		}
     	}
     	$tmp_s = implode(',',$tmp);
     	$data['role_auth_ac'] = $tmp_s;
     }*/
}