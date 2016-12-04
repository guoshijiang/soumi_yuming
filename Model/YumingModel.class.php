<?php
namespace Model;
use Think\Model;
class YumingModel extends Model{
    protected function _after_update($data,$options){
        //dump($_POST);die();
           /*if(!empty($_POST['ext_cat'])){
             D('YumingCat')
                 ->where(array('yuming_id'=>$data['yuming_id']))
                 ->delete();
            foreach($_POST['ext_cat'] as $k => $v){
                if($v!="0"){
                    $arr = array(
                          'yuming_id' => $data['yuming_id'],
                          'cat_id'    => $v,
                        );
                   D('YumingCat')->add($arr);
                }
             }
           }*/
    }
    //数据修改之前调用的方法
   protected function _after_insert($data,$options){
   // dump($_POST);die();
     if(!empty($_POST['ext_cat'])){
            //2)添加新的
            //遍历ext_cat,同时给sp_goods_cat添加记录
            foreach($_POST['ext_cat'] as $k => $v){
                if($v != '0'){
                    //有选取具体的扩展分类信息
                    $arr = array(
                        'yuming_id' => $data['yuming_id'],
                        'cat_id' => $v,
                    );
                    D('YumingCat')->add($arr);
                }
            }
        }

    }
}