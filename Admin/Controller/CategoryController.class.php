<?php
namespace Admin\Controller;
//use Think\Controller;
use Tools\AdminController;
class CategoryController extends AdminController {
    //权限列表展示
    public function showlist(){
        $daohang = array(
            'title1' => '分类管理',
            'title2' => '分类列表',
            'act' => '添加',
            'act_link' => U('tianjia'),
        );
        //assign给模板的变量信息，"普通模板和布局模板"都可以使用
        $this -> assign('daohang',$daohang);
        $info = D('Category')-> order('cat_path')->select();
        $this -> assign('info',$info);
        $this -> display();
    }

function tianjia(){
        $Category = new \Model\CategoryModel();
        if(IS_POST){
            $shuju = $Category -> create();//收集到2个字段数据
            if($Category -> add($shuju)){
                $this -> success('添加分类成功',U('showlist'),1);
            }else{
                $this -> error('添加分类失败',U('tianjia'),1);
            }
        }else{
            $daohang = array(
                'title1' => '分类管理',
                'title2' => '添加分类',
                'act' => '返回',
                'act_link' => U('showlist'),
            );
            $this -> assign('daohang',$daohang);
            //获得供选取的上级(cat_level=0/1)并传递给模板
            $cateinfo = D('Category')
                ->order('cat_path')
                ->where(array('cat_level'=>array('in','0,1')))
                ->select();
            $this -> assign('cateinfo',$cateinfo);
            $this -> display();
        }

    }
public function del($cat_id){
        $cate = new \Model\CategoryModel();
        if(IS_GET){
            $shuju = $cate
            ->where(array('cat_id'=>'$cat_id')) 
            ->delete($cat_id);
            echo "删除成功";
            $this -> redirect('Category/showlist');
        }else{
            $this->display();   
        }
    }
    //获得分类类型
function getCateByType(){
        $cat_id = I('get.cat_id');
        //dump($cat_id);die();
        $cdt = array();
        if($cat_id>0){
            $cdt['c.cat_id']=$cat_id;
        }
        $cateinfo = D('Category')
            ->alias('c')
            ->join('left join sp_yuming as y on c.cat_id=y.cat_id')
            ->field('c.*,t.type_name')
            ->where($cdt)
            ->select();
            echo json_encode($cateinfo);
    }
    //类型父获子
function getCatByPid(){
    $cat_id = I('get.cat_id');
    $cateinfo = D('Category')
        ->where(array('cat_pid'=>$cat_id))
        ->select();
    echo json_encode($cateinfo);
    //dump($cateinfo);die();
}
 private function updCate($cat_pid,$cat_id){
        if($cat_pid=='0'){
             $cat_path = $cat_id;
             return $cat_path;
        }else{
             $cat_path = $cat_pid.'-'.$cat_id;
             return $cat_path;
        }
    }
public function upd(){
        $daohang = array(
            'title1' => '分类管理',
            'title2' => '修改分类',
            'act' => '返回',
            'act_link' => U('showlist'),
        );
        //assign给模板的变量信息，"普通模板和布局模板"都可以使用
        $this -> assign('daohang',$daohang);
        $cate1 = new \Model\CategoryModel();
        $cate_id = I('get.cat_id');
        $cate = new \Model\CategoryModel();
        if(IS_POST){
            //dump($_POST);
            $cat_pid  = I('post.cat_pid');
            $cat_id   = I('post.cat_id');
            $cat_name = I('post.cat_name');
            $cat_path = $this -> updCate($cat_pid,$cat_id);
            //dump($auth_path);
            $cat_level = substr_count($cat_path,'-');
            $arr = array(
                'cat_id'    => $cat_id,
                'cat_name'  => $cat_name,
                'cat_pid'   => $cat_pid,
                'cat_level' => $cat_level,
                'cat_path'  => $cat_path,
            );
             //dump($arr);die();
              if($cate ->save($arr)){
                $this -> success('修改数据成功',U('showlist'),1);
            }else{
                $this -> error('修改数据失败',U('upd',array('cat_id'=>$cat_id)),1);
            }
        }else{
            $info1 = $cate1 -> order('cat_path')->select();
            $this -> assign('info1',$info1);
            $info = $cate ->find($cate_id);
            $this -> assign('info',$info);
            $this->display();
        }
    }
}