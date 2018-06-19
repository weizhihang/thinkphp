<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/31
 * Time: 11:35
 */

namespace app\admin\model;

use think\Model;

class Video extends Model
{
    //自定义初始化
    protected function initialize()
    {
        //需要调用`Model`的`initialize`方法
        parent::initialize();
        //TODO:自定义的初始化
    }
    protected $autoWriteTimestamp = true;
    protected $auto = ['ip'];
    protected $insert = ['status' => 1];
    protected $update = [];

//    public function add_user($content)
//    {
//        $user = new User;
//        $user->data($content);
//        $user->save();
//        return $user->id;
//    }
//    public function add_users($content)
//    {
//        $user = new User;
////        $list = [
////            ['name'=>'thinkphp','email'=>'thinkphp@qq.com'],
////            ['name'=>'onethink','email'=>'onethink@qq.com']
////        ];
//        $user->saveAll($content,false);
//    }
//    public function save_user($content,$id)
//    {
//
//        $user = new User();
//// 过滤post数组中的非数据表字段数据
//        $user->allowField(true)->save($content,['id' => $id]);
//    }
//    public function save_users($content)
//    {
//        $user = new User;
////        $list = [
////            ['id'=>1, 'name'=>'thinkphp', 'email'=>'thinkphp@qq.com'],
////            ['id'=>2, 'name'=>'onethink', 'email'=>'onethink@qq.com']
////        ];
//        $res = $user->isUpdate()->saveAll($content);//isUpdate参数 true 或 false
//        return $res;
//    }

}
