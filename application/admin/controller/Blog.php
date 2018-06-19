<?php
namespace app\admin\controller;
use app\admin\model\Article;
use think\Controller;
use think\Db;
use think\Input;
class Blog extends Controller
{
    public function index()
    {
//        echo ROOT_PATH ;
//        echo "<br>";
//        echo __PUBLIC__;
//        echo __STATIC__;
//        echo ROOT_PATH.'public/static/admin';
        $article = Db::table('bf_article')->select();
        for($i=0;$i<count($article);$i++){
            $arr[$i][] = '<label><input type="checkbox" class="ace"><span class="lbl"></span></label>';
            $arr[$i][] = $article[$i]['id'];
            $arr[$i][] = $article[$i]['title'];
            $arr[$i][] = $article[$i]['category_id'];
            $arr[$i][] = $article[$i]['descr'];
            $arr[$i][] = $article[$i]['keyword'];
            $arr[$i][] = $article[$i]['click'];
            $arr[$i][] = $article[$i]['heart'];
            $arr[$i][] = date("Y-m-d",$article[$i]['create_time']);
            $arr[$i][] = '<a href="javascript:ovid()" onclick="picture_stop(this,\'+10001+\')" class="btn bg-green operation_btn">查看</a> <a href="javascript:ovid()" onclick="picture_edit(this,\'+123+\')" class="btn bg-deep-blue operation_btn">修改</a> <a href="javascript:ovid()" onclick="picture_del(this,\'+10001+\')" class="btn btn-danger operation_btn">删除</a>';

        }
//        echo "<pre>";
//        print_r($arr);die;
        $this->assign('data',json_encode($arr));
        return $this->fetch();
//        return '<style type="text/css">*{ padding: 0; margin: 0; } .think_default_text{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5<br/><span style="font-size:30px">十年磨一剑 - 为API开发设计的高性能框架</span></p><span style="font-size:22px;">[ V5.0 版本由 <a href="http://www.qiniu.com" target="qiniu">七牛云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="https://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="https://e.topthink.com/Public/static/client.js"></script><think id="ad_bd568ce7058a1091"></think>';
    }
    public function add()
    {
        $label = Db::table('bf_label')->select();
        $category = Db::table('bf_category')->select();
//        print_r($user);
        $this->assign('label',$label);
        $this->assign('category',$category);
        return $this->fetch();
    }
    public function add_post()
    {
        $input = input('');

        $model = new Article();
        $model->title = $input['title'];
        $model->descr = $input['descr'];
        $model->keyword = $input['keyword'];
        $model->label = implode(',',$input['label_id']);
        $model->text = $input['editorValue'];
        $model->save();
        if($model){
            echo '成功！';
        }else{
            echo '失败！';
        }

//        echo '成功';
    }
}
