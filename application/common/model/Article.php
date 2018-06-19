<?php

namespace app\common\model;

use think\Model;

class Article extends Model
{
    protected function initialize()
    { //需要调用`Model`的`initialize`方法
        parent::initialize(); //TODO:自定义的初始化
    }
    protected $autoWriteTimestamp = true;
//    protected $auto = ['ip'];
    protected $insert = ['status' => 1];
//    protected $update = [];

}