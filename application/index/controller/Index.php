<?php
namespace app\index\controller;
use think\Controller;
//use app\index\controller\Common;
use think\Db;
use think\Input;
use app\admin\model\Article;
class Index extends Common
{
    public function _initialize()
    {
        parent::_initialize();
    }
    public function test()
    {
        echo 1223;
        $user = Db::table('bf_user')->select();
        print_r($user);
    }
    public function index1()
    {
//        return '<style type="text/css">*{ padding: 0; margin: 0; } .think_default_text{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5<br/><span style="font-size:30px">十年磨一剑 - 为API开发设计的高性能框架</span></p><span style="font-size:22px;">[ V5.0 版本由 <a href="http://www.qiniu.com" target="qiniu">七牛云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="https://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="https://e.topthink.com/Public/static/client.js"></script><think id="ad_bd568ce7058a1091"></think>';
    return $this->fetch();
    }
    public function index()
    {
//        echo 1452;die;
//        echo __STATIC__;
//        echo "<br>";
//        echo __PATH__;
//        echo "<br>";
//        echo $_SERVER['HTTP_HOST'];
//        echo "<br>";
//        echo $_SERVER['REQUEST_URI']."<br>";
//        echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];;
        return $this->fetch();
    }
    public function about()
    {
        return $this->fetch();
    }
    public function gbook()
    {
        return $this->fetch();
    }
    public function info()
    {
//        $model = new Article();
        // 查询单个数据
//        $data = $model->where('id', 5)->find();
//        print_r($dara);
//        $category_id = $data['category_id'];
        $data = Db::table('bf_article')
            ->alias('a')
//            ->join('bf_label c','a.label_id = c.id')
            ->join('bf_admin_user u','a.author = u.id')
            ->where('a.id',5)
//            ->where('a.id',5)
            ->field('a.*,u.username')
            ->find();
        $label_id = explode(',',$data['label_id']);
        $data['label'] = Db::table('bf_label')->where('id','in',$label_id)->select();
        $this->assign('data',$data);
        return $this->fetch();
    }
    public function life()
    {
        return $this->fetch();
    }
    public function study()
    {
        return $this->fetch('list');
    }
    public function share()
    {
        return $this->fetch();
    }
    public function time()
    {
        $data = Db::table('bf_article')->field('id,title,create_time')->select();
        $this->assign('list',$data);
        return $this->fetch();
    }

}
