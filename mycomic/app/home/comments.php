<?php
    // +----------------------------------------------------------------------
    // | 个人资料留言页面
    // +----------------------------------------------------------------------
    //引入配置和常用的函数
    include('../../config/config.php');

    //引入头部公共部分
    include('header-layout.php');

    //获取我的留言数据
    $user_id = $_SESSION['user']['id'];
    $sql = "SELECT * FROM comments WHERE user_id='$user_id'";
    $comments = fetchAll($link,$sql);

    $sql2 = "SELECT * FROM authors WHERE user_id='$user_id'"; //写获取作者的sql语句
    $authors = fetchOne($link,$sql2); //获取作者信息

    $sql3 = "SELECT * FROM users WHERE id='$user_id'"; //写获取用户的sql语句
    $user = fetchOne($link,$sql3); //获取用户信息
  
?>
<div class="container" style="margin-top: 7%;margin-bottom: 20%">

    <?php if($authors['status'] == 1) { 
        include('author-layout.php');
       }else{
         include('profile-layout.php'); 
      }?>

    <div class="col-md-9">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;我的留言</h3>
            </div>
            <div class="panel-body">
            <?php 
             if(is_array($comments)) {
                foreach($comments as $comment) {
            ?>
    			<div class="comment">
    			  <a href="###" class="avatar">
                  <!-- 注意图片的路径 -->
    			    <img src="/mycomic/<?php echo $user['avatar'] ?>" width="50px" height="50px" class="img-circle">
    			  </a>
    			  <div class="content">
    			    <div class="pull-right text-muted"><?php echo $comment['addtime'] ?></div>
    			    <div><a href="###"><strong><?php echo $_SESSION['user']['name'] ?></strong></a></div>
    			    <div class="text"><?php echo $comment['comment_content'] ?></div>
    			  </div>
                </div>
            <?php }}else{

                echo "<h2>抱歉，当前没有发表评论！</h2>";
            } ?>
        </div>
    </div>
</div>
</div>


