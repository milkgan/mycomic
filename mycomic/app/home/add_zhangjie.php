<?php
    // +----------------------------------------------------------------------
    // | 上传漫画作品的章节
    // +----------------------------------------------------------------------
    
    //引用常用的函数
    require_once('../../config/config.php');
   
    //引入头部
    include('header-layout.php');
    $id = $_GET['id'];
    $sql = "SELECT * FROM zuopins WHERE id='$id'";
    $zuopin = fetchOne($link,$sql);

    $id2 = $_SESSION['user']['id'];  //获取用户id
    $sql2 = "SELECT * FROM users WHERE id='$id2'"; //写获取用户的sql语句
    $user = fetchOne($link,$sql2); //获取用户信息
?>

<link rel="stylesheet" href="/mycomic/public/wangEditor/dist/css/wangEditor.min.css">  
<div class="container" style="margin-top: 7%;margin-bottom: 20%">
<?php 
    //引入个人资料菜单
    include('author-layout.php');
    ?>
<div class="content-wrapper">
        <!--内容-->
        <div class="col-md-9">
        <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;上传章节</h3>
                </div>
                <div class="panel-body">
        <section class="content" id="showcontent">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                       
                        <form role="form" action="/mycomic/app/home/handler/add_zhangjie.handler.php" method="post" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="input_title">第几章</label>
                                    <input type="text" class="form-control" name="zhangjie_num" placeholder="请输入作品章节序号，如第五章！">
                                </div>
                                <div class="form-group">
                                    <label for="input_title">章节标题</label>
                                    <input type="text" class="form-control"  name="zhangjie_title" placeholder="请输入章节标题">
                                </div>
                                <div class="form-group">
                                    <label for="movieinfo">作品内容</label>
                                    <div id="div1">
                                    <textarea id="textarea1"  class="form-control"  style="height: 400px;max-height: 400px;" name="zhangjie_content"> </textarea>
                                    </div>
                                </div>
                                <input type="hidden" name="zuopin_id" value="<?php echo $_GET['id'] ?>">
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">上传</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        </div>
    </div>
</div>

<script src="/mycomic/public/wangEditor/dist/js/wangEditor.min.js"></script>
<script>
      var editor = new wangEditor('textarea1');
      editor.config.menus = [
        'img'  
       ];
      editor.config.hideLinkImg = true;//  隐藏网络图片
      editor.config.uploadImgFileName = 'myFileName',
      editor.config.uploadImgUrl = '/mycomic/app/admin/handler/uploadImg.handler.php';   
      editor.create(); 
</script>
 