<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Input;
class Common extends Controller
{
    public function _initialize()
    {
        parent::_initialize();
        $this->navigation();
    }
    public function navigation()
    {
//        echo "<pre>";
        $nav = Db::table('bf_navigation')->order('sort asc')->select();
//        print_r($nav);
        foreach ($nav as $value){
            if($value['pid']==0){
                foreach ($nav as $item){
                    if ($item['pid']==$value['id']){
                        $value['son'][] = $item;
                    }
                }
                $arr[] = $value;
            }
        }
        $this->assign('nav',$arr);
//        print_r($arr);
    }
}
