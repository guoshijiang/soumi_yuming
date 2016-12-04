<?php
namespace Model;
use Think\Model;
class CategoryModel extends Model{
     protected function _after_insert($data,$options) {
        //维护两个字段(cat_path和cat_level)的制作和更新
        //获得新记录的主键id值
        /*dump($data);
        array(5) {
          ["cat_name"] => string(12) "品牌列表"
          ["cat_pid"] => int(101)
          ["cat_id"] => string(3) "113"
        }
        */
        //cat_path和cat_level维护
        //1) 维护cat_path 全路径
        if($data['cat_pid']==0){
            //① 顶级权限：  全路径====本身记录id值
            $path = $data['cat_id'];
        }else{
            //② 非顶级权限：  全路径====父级全路径-本身记录id值
            //获得父级权限信息
            $pinfo = $this ->find($data['cat_pid']);
            $path = $pinfo['cat_path']."-".$data['cat_id'];
        }
        $level = substr_count($path,'-');
        //把path和level更新给记录
        $arr = array(
            'cat_id'=>$data['cat_id'],
            'cat_path'=>$path,
            'cat_level'=>$level,
        );
        $this -> save($arr);
    }
}