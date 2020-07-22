  <?php
    // +----------------------------------------------------------------------
    // | 后台添加作者
    // +----------------------------------------------------------------------
    
    //引用常用的函数
    require_once('../../config/config.php');

    //判断判断管理员有没有访问的权限,如果没有，那么回退到登录页面，validateAdmin(),在common/helpers.php
    validateAdmin();

    //引入头部
    include('header-layout.php');
?>

<link rel="stylesheet" href="/public/wangEditor/dist/css/wangEditor.min.css">  
<div class="content-wrapper">
        <div class="col-md-6 col-md-offset-3" style="margin-top: 50px">
        <section class="content" id="showcontent">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">作者添加</h3>
                        </div>
                        <form role="form" action="/mycomic/app/admin/handler/add_author.handler.php" method="post" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="input_title">作者笔名</label>
                                    <input type="text" class="form-control"  name="author_name" placeholder="请输入作者笔名！">
                                </div>
                                <div class="form-group">
                                    <label for="input_title">真实姓名</label>
                                    <input type="text" class="form-control"  name="author_relname" placeholder="请输入作者姓名!">
                                </div>
                                <div class="form-group">
                                    <label for="input_phone">联系方式</label>
                                    <input id="phone" class="form-control" placeholder="请输入作者的手机联系方式!" name="author_phone" type="text" >
                                </div>
                                <div class="form-group">
                                    <label for="input_title">国籍</label>
                                    <input type="text" class="form-control"  name="author_guoji" placeholder="请输入作者国籍！">
                                </div>
                                <div class="form-group">
                                    <label for="input_title">居住地</label>
                                    <input type="text" class="form-control"  name="author_city" placeholder="请输入作者居住地！">
                                </div>
                                <div class="form-group">
                                    <label for="movieinfo">作者简介</label>
                                    <textarea class="form-control" rows="10" name="author_description" id="description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="logo">上传作者头像图片</label>
                                    <input type="file" id="img" name="author_avatar">   
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">添加</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
        
</div>

<script src="/public/wangEditor/dist/js/wangEditor.min.js"></script>
<script>
      var editor = new wangEditor('textarea1');
      editor.config.menus = [
        'fontsize',
        'bold',
        'italic',
        'eraser',
        'forecolor',
        'fontfamily',
        'head',
        'orderlist',
        'alignleft',
        'aligncenter',
        'alignright',
        'emotion',
        'undo',
        'redo',
        'img'
       ];
        editor.config.uploadImgFileName = 'myFileName',
        editor.config.uploadImgUrl = '/admin/handler/uploadImg.handler.php';   
  </script>
