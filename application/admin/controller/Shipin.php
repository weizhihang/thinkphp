<?php

namespace app\admin\controller;

use app\admin\model\Video;
use think\Controller;
use think\Db;
use think\Input;

class Shipin extends Controller
{
    public function index()
    {
//        echo ROOT_PATH ;
//        echo "<br>";
//        echo __PUBLIC__;
//        echo __STATIC__;
//        echo ROOT_PATH.'public/static/admin';
        $user = Db::table('bf_video')->select();
//        $user = Db::table('bf_video')->field('id,title,name,click,url,create_time,update_time,status')->select();
//        $str = '[';
//        foreach ($user as $value) {
//            if($value['status']==1){
//                $stutas = "上架";
//            }else{
//                $stutas = "下架";
//            }
////            $str .= "['<label><input type=\"checkbox\" class=\"ace\"><span class=\"lbl\"></span></label>'," .$value['id'].
////                "," . $value['title'] . "," . $value['click'] . ",'234.50','促销化妆品'," . date('Y-m-d H:i:s', $value['create_time']) .
////                "," . date('Y-m-d H:i:s', $value['update_time']) . ",<span class=\"label label-success label-sm\">".$stutas.
////                "</span>,<a href='javascript:ovid()' onclick=\"picture_stop(this,'10001')\" class='btn bg-green operation_btn'>下架</a> <a href=\"javascript:ovid()\" onclick='picture_edit(this,\"123\")' class='btn bg-deep-blue operation_btn'>修改</a> <a href=\"javascript:ovid()\" onclick=\"picture_del(this,'+10001+')\" class='btn btn-danger operation_btn'>删除</a> <a href='javascript:ovid()' onclick=\"picture_img(this,'+232+'))\" class='btn bg-deep-blue operation_btn'>图片</a>'],";
////            $str .= "[\'<label><input type=\"checkbox\" class=\"ace\"><span class=\"lbl\"></span></label>\'," . $value['id'] . "," . $value['title'] . "," . $value['click'] . ",'234.50','促销化妆品'," . date('Y-m-d H:i:s', $value['create_time']) . "," . date('Y-m-d H:i:s', $value['update_time']) . ",'<span class=\"label label-success label-sm\">".$stutas."</span>',' <a href=\"javascript:ovid()\" onclick=\"picture_stop(this,\"10001\")\" class=\"btn bg-green operation_btn\">下架</a> <a href=\"javascript:ovid()\" onclick=\"picture_edit(this,\"123\")\" class=\"btn bg-deep-blue operation_btn\">修改</a> <a href=\"javascript:ovid()\" onclick=\"picture_del(this,'+10001+')\" class=\"btn btn-danger operation_btn\">删除</a> <a href=\"javascript:ovid()\" onclick=\"picture_img(this,'+232+'))\" class=\"btn bg-deep-blue operation_btn\">图片</a>'],";
//            $str .= "['<label><input type=\"checkbox\" class=\"ace\"><span class=\"lbl\"></span></label>','1233', '贝德玛（Bioderma）温和卸妆水净妍/舒妍洁肤液卸妆水','55','234.50','促销化妆品','4567','2016-03-12 10:34:12','<span class=\"label label-success label-sm\">上架</span>',' <a href=\"javascript:ovid()\" onclick=\"picture_stop(this,\"10001\")\" class=\"btn bg-green operation_btn\">下架</a> <a href=\"javascript:ovid()\" onclick=\"picture_edit(this,\"123\")\" class=\"btn bg-deep-blue operation_btn\">修改</a> <a href=\"javascript:ovid()\" onclick=\"picture_del(this,'+10001+')\" class=\"btn btn-danger operation_btn\">删除</a> <a href=\"javascript:ovid()\" onclick=\"picture_img(this,'+232+'))\" class=\"btn bg-deep-blue operation_btn\">图片</a>']
//";
//        }
//        $str .= ']';
//        ['<label><input type="checkbox" class="ace"><span class="lbl"></span></label>','1233', '贝德玛（Bioderma）温和卸妆水净妍/舒妍洁肤液卸妆水','55','234.50','促销化妆品','4567','2016-03-12 10:34:12','<span class="label label-success label-sm">上架</span>',' <a href="javascript:ovid()" onclick="picture_stop(this,"10001")" class="btn bg-green operation_btn">下架</a> <a href="javascript:ovid()" onclick="picture_edit(this,"123")" class="btn bg-deep-blue operation_btn">修改</a> <a href="javascript:ovid()" onclick="picture_del(this,'+10001+')" class="btn btn-danger operation_btn">删除</a> <a href="javascript:ovid()" onclick="picture_img(this,'+232+'))" class="btn bg-deep-blue operation_btn">图片</a>']
        // 查询数据集
//        $list = $user->select();
//        echo '<pre>';
//        print_r($user);
//        $this->assign('data',$str);
        $this->assign('list', $user);
        return $this->fetch();
//        return '<style type="text/css">*{ padding: 0; margin: 0; } .think_default_text{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5<br/><span style="font-size:30px">十年磨一剑 - 为API开发设计的高性能框架</span></p><span style="font-size:22px;">[ V5.0 版本由 <a href="http://www.qiniu.com" target="qiniu">七牛云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="https://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="https://e.topthink.com/Public/static/client.js"></script><think id="ad_bd568ce7058a1091"></think>';
    }

    public function add_video()
    {
        return $this->fetch();
    }

    public function add_post()
    {
        $post = Input('');
        $file = request()->file('file');
        $info = $file->move(__PUBLIC__. '/uploads/video');
        if ($info) {
            $savename = $info->getSaveName();
            $data['video'] = 'uploads/video/'.$savename;
            $data['video_status'] = 1;
        } else {
            // 上传失败获取错误信息
            echo $file->getError();
        }
        $data['title'] = $post['title'];
        $data['name'] = $post['name'];
        $data['create_time'] = time();
        $data['update_time'] = time();
        Db::name('video')->insert($data);
        $res = Db::name('video')->getLastInsID();
        $data1['id'] = $res;
        $data1['url'] = "http://kyk.lo-ok.com.cn/bf/public/index.php/index/Shipin/index?id=$res";
        Db::name('video')->update($data1);

//        print_r($data1);
//
////        print_r($data);
        if ($res) {
            $this->success('上传成功！', "index", 1);
        } else {
            $this->error('保存失败，请重试！');
        }
    }
    public function video_del(){
        $id = input('post.id');
        Db::table('bf_video')->delete($id);
        $res = Db::name('bf_video')->getLastInsID();
        if($res){
            $data['status'] = 1;
            $data['msg'] = '已删除！';
        }else{
            $data['status'] = 99;
            $data['msg'] = '未删除！';
        }
        exit(json_encode($data));
    }
    public function edit_post()
    {
        $id = I('get.id');
//        print_r($a);die;
        if (I('video')) {
            $data['video'] = I('video');
            $data['video_status'] = 2;

        } else {
            $upload = new Upload();// 实例化上传类
//        $upload->maxSize = 3145728000 ;// 设置附件上传大小
            $upload->exts = array('jpg', 'gif', 'png', 'jpeg', "mp4", "wmv");//设置附件上传类型
            $upload->rootPath = './Public/Uploads/video/'; // 设置附件上传目录
            $upload->autoSub = false; //拒绝创建子目录
// 上传文件
            $info = $upload->upload();
            echo "<pre>";
            print_r($info);
//        var_dump($info);
            //上传图片的时候就可以，但是上传视频的时候 会显示 false
//            $upload = new \Think\Upload();// 实例化上传类
////            $upload->maxSize   =     3145728 ;// 设置附件上传大小
////            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
//            $upload->rootPath  =      './Public/Uploads/company/'.date('Ymd'); // 设置附件上传根目录
//            // 上传单个文件
//            $info   =   $upload->uploadOne($_FILES['photo1']);
            if (!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            } else {// 上传成功 获取上传文件信息
                $data['video'] = 'Uploads/video/' . $info['file-2']['savename'];
                $data['video_status'] = 1;
            }
        }
        $data['id'] = $id;
        $data['update_time'] = time();
        $res = M('brand')->save($data);
        print_r($data);
        if ($res) {
            $this->success('上传成功！', "video_edit?id=$id", 1);
        } else {
//            $this->error('上传失败，请重试！');
        }
//////////////////////////////////////////////////////
//            $upload=new Upload();
//            $root=$upload->rootPath  = './Public/Uploads/company'.date('Ymd'); // 设置附件上传目录
//            $upload->autoSub  = false;
//            $upload->savePath="$this->name/";
//            $arr=$info   =   $upload->upload();
//            $save=$arr['file-2']['savepath'];
//            $savename=$arr['file-2']['savename'];
//            $path=$root.$save.$savename;
//            $data['video']=$save.$savename;
//        $res = M('brand')->save($data);
//        if($res){
//            echo '修改成功';
////            $this->redirect("index");
//        }else{
//            echo '修改失败';
//
//        }
//        print_r($info);

    }
//    public function fileupload()
//    {
//
//        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
//        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
//        header("Cache-Control: no-store, no-cache, must-revalidate");
//        header("Cache-Control: post-check=0, pre-check=0", false);
//        header("Pragma: no-cache");
//        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
//            exit; // finish preflight CORS requests here
//        }
//        if (!empty($_REQUEST['debug'])) {
//            $random = rand(0, intval($_REQUEST['debug']));
//            if ($random === 0) {
//                header("HTTP/1.0 500 Internal Server Error");
//                exit;
//            }
//        }
//// header("HTTP/1.0 500 Internal Server Error");
//// exit;
//// 5 minutes execution time
//        @set_time_limit(5 * 60);
//// Uncomment this one to fake upload time
//// usleep(5000);
//// Settings
//// $targetDir = ini_get("upload_tmp_dir") . DIRECTORY_SEPARATOR . "plupload";
//        $targetDir = './public/Uploads/video_tmp/';
//        $uploadDir = './public/Uploads/video/';
//        $cleanupTargetDir = true; // Remove old files
//        $maxFileAge = 5 * 3600; // Temp file age in seconds
//// Create target dir
//        if (!file_exists($targetDir)) {
//            @mkdir($targetDir);
//        }
//
//// Create target dir
//        if (!file_exists($uploadDir)) {
//            @mkdir($uploadDir);
//        }
//
//// Get a file name
//        if (isset($_REQUEST["name"])) {
//            $fileName = $_REQUEST["name"];
//        } elseif (!empty($_FILES)) {
//            $fileName = $_FILES["file"]["name"];
//        } else {
//            $fileName = uniqid("file_");
//        }
//        $filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;
//        $uploadPath = $uploadDir . DIRECTORY_SEPARATOR . $fileName;
//
//// Chunking might be enabled
//        $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
//        $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 1;
//// Remove old temp files
//        if ($cleanupTargetDir) {
//            if (!is_dir($targetDir) || !$dir = opendir($targetDir)) {
//                die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
//            }
//
//            while (($file = readdir($dir)) !== false) {
//                $tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;
//
//                // If temp file is current file proceed to the next
//                if ($tmpfilePath == "{$filePath}_{$chunk}.part" || $tmpfilePath == "{$filePath}_{$chunk}.parttmp") {
//                    continue;
//                }
//
//                // Remove temp file if it is older than the max age and is not the current file
//                if (preg_match('/\.(part|parttmp)$/', $file) && (@filemtime($tmpfilePath) < time() - $maxFileAge)) {
//                    @unlink($tmpfilePath);
//                }
//            }
//            closedir($dir);
//        }
//// Open temp file
//        if (!$out = @fopen("{$filePath}_{$chunk}.parttmp", "wb")) {
//            die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
//        }
//
//        if (!empty($_FILES)) {
//            if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"])) {
//                die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
//            }
//
//            // Read binary input stream and append it to temp file
//            if (!$in = @fopen($_FILES["file"]["tmp_name"], "rb")) {
//                die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
//            }
//        } else {
//            if (!$in = @fopen("php://input", "rb")) {
//                die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
//            }
//        }
//
//        while ($buff = fread($in, 4096)) {
//            fwrite($out, $buff);
//        }
//
//        @fclose($out);
//        @fclose($in);
//
//        rename("{$filePath}_{$chunk}.parttmp", "{$filePath}_{$chunk}.part");
//
//        $index = 0;
//        $done = true;
//        for ($index = 0; $index < $chunks; $index++) {
//            if (!file_exists("{$filePath}_{$index}.part")) {
//                $done = false;
//                break;
//            }
//        }
//        if ($done) {
//            if (!$out = @fopen($uploadPath, "wb")) {
//                die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
//            }
//
//            if (flock($out, LOCK_EX)) {
//                for ($index = 0; $index < $chunks; $index++) {
//                    if (!$in = @fopen("{$filePath}_{$index}.part", "rb")) {
//                        break;
//                    }
//
//                    while ($buff = fread($in, 4096)) {
//                        fwrite($out, $buff);
//                    }
//
//                    @fclose($in);
//                    @unlink("{$filePath}_{$index}.part");
//                }
//
//                flock($out, LOCK_UN);
//            }
//            @fclose($out);
//        }
//
//// Return Success JSON-RPC response
//        die('{"jsonrpc" : "2.0", "result" : null, "id" : "id"}');
//    }
}
