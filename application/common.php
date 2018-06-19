<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
function category($data)
{
    foreach ($data as $value){
        if($value['pid']==0){
            foreach ($data as $item){
                if ($item['pid']==$value['id']){
                    $value['son'][] = $item;
                }
            }
            $arr[] = $value;
        }
    }
    return $arr;
}

