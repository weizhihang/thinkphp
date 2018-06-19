<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
header('content-type:text/html;charset=utf-8');
// [ 应用入口文件 ]
// 定义配置文件目录和应用目录同级
define('CONF_PATH', __DIR__.'/config/');
define('__PATH__', __DIR__.'/public/');
define('__STATIC__', 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'/public/static');

// 定义应用目录
define('APP_PATH', __DIR__ . '/application/');
// 加载框架引导文件
require __DIR__ . '/thinkphp/start.php';
