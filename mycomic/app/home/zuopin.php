<?php
    // +----------------------------------------------------------------------
// | 后台添加作者
// +----------------------------------------------------------------------
require_once('../../config/config.php');
//引用常用的函数
require_once('../../config/config.php');
//引入头部
include('header-layout.php');


$id = $_SESSION['user']['id'];  //获取用户id
$sql2 = "SELECT * FROM authors WHERE user_id='$id'"; //写获取用户的sql语句
$author = fetchOne($link, $sql2); //获取用户信息

$author_id = $author['id'];
$sql3 = "SELECT * FROM zuopins WHERE author_id='$author_id'";
$zuopin = fetchOne($link, $sql3);

$cid = $zuopin['category_id'];
$sql4 = "SELECT * FROM categorys WHERE id='$cid'";
$category = fetchOne($link, $sql4);

$sql5 = "SELECT * FROM users WHERE id='$id'"; //写获取用户的sql语句
$user = fetchOne($link, $sql5); //获取用户信息

?>
<div class="container" style="margin-top: 7%;margin-bottom: 20%">
    <?php 
    //引入个人资料菜单
    include('author-layout.php');
    ?>
    <!-- 控制面板的宽度 -->
    <div class="col-md-9">
        <div class="panel panel-warning">

            <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;我的作品</h3>
            </div>
            <div class="panel-body">
                <div class="content-wrapper">
                    <!--内容-->
                    <section class="content" id="showcontent">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-hover">
                                    <tbody>
                                        <tr>

                                            <th>作品封面</th>
                                            <th>作品名称</th>
                                            <th>作者</th>
                                            <th>分类</th>
                                            <th>审核结果</th>
                                            <th>操作事项</th>

                                        </tr>

                                        <tr>

                                            <td><img src="/mycomic/<?php echo $zuopin['zuopin_img'] ?>" width="120px" height="100px"></td>
                                            <td><?php echo $zuopin['zuopin_name'] ?></td>
                                            <td><?php echo $author['author_relname'] ?></td>


                                            <td><?php echo $category['category_name'] ?></td>
                                            <td>
                                                <?php if ($zuopin['status'] == 0) { ?>
                                                <button class="btn btn-danger">审核不通过</button>
                                                <?php 
                                            } else if ($zuopin['status'] == 1) { ?>
                                                <button class="btn btn-success">审核通过</button>
                                                <?php 
                                            } else if ($zuopin['status'] == 2) { ?>
                                                <button class="btn btn-danger">等待审核</button>
                                                <?php 
                                            } ?>
                                            </td>
                                            <td>
                                                <?php if ($zuopin['status'] == 1) { ?>
                                                <a href="/mycomic/app/home/add_zhangjie.php?id=<?php echo $zuopin['id'] ?>"><button class="btn btn-success">上传章节</button></a>

                                                <a href="/mycomic/app/home/zhangjie.php?id=<?php echo $zuopin['id'] ?>"><button class="btn btn-success">阅读</button></a>
                                                <?php 
                                            } ?>
                                            </td>

                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                </div>
            </div>
            </section>
        </div>
    </div>
</div> 