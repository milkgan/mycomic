<?php
    // +----------------------------------------------------------------------
// | 后台添加作者
// +----------------------------------------------------------------------

//引用常用的函数
require_once('../../config/config.php');
//引入头部
include('header-layout.php');


$id = $_SESSION['user']['id'];  //获取用户id
$sql2 = "SELECT * FROM authors WHERE user_id='$id'"; //写获取作者的sql语句
$authors = fetchOne($link, $sql2); //获取作者信息

$sql3 = "SELECT * FROM users WHERE id='$id'"; //写获取用户的sql语句
$user = fetchOne($link,$sql3); //获取用户信息
?>

<div class="container" style="margin-top: 7%;margin-bottom: 20%">
    <?php 
    //引入个人资料菜单
    include('author-layout.php');
    ?>
    <div class="content-wrapper">

        <div class="col-md-9">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;我要投稿</h3>
                </div>

                <div class="panel-body">
                    <form role="form" action="/mycomic/app/home/handler/add_zuopin.handler.php" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="input_title">作品名称</label>
                                <input type="text" class="form-control" id="title" name="zuopin_name" placeholder="请输入作品名称！">
                            </div>
                            <div class="form-group">
                                <label for="input_title">作者</label>

                                <select class="form-control" name="author_id">
                                    <?php 
                                    //获取所有的作者
                                    $sql = "SELECT * FROM authors WHERE user_id='$id' ";
                                    $author = fetchOne($link, $sql);

                                    ?>
                                    <option value="<?php echo $author['id'] ?>"><?php echo $author['author_relname'] ?></option>

                                </select>

                            </div>
                            <div class="form-group">
                                <label for="input_title">作品分类选择</label>

                                <select class="form-control" name="category_id">
                                    <?php 
                                    //获取所有的分类
                                    $sql = "SELECT * FROM categorys";
                                    $categorys = fetchAll($link, $sql);
                                    if (is_array($categorys)) {
                                        foreach ($categorys as $category) {
                                            ?>
                                    <option value="<?php echo $category['id'] ?>"><?php echo $category['category_name'] ?></option>
                                    <?php 
                                }
                            } ?>
                                </select>

                            </div>
                            <div class="form-group">
                                <label for="movieinfo">作品简介</label>
                                <textarea class="form-control" rows="10" name="zuopin_description" id="description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="logo">作品封面</label>
                                <input type="file" id="img" name="zuopin_img">
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">添加</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

