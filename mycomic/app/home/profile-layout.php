    <div class="col-md-3">
    <nav class="menu" data-ride="menu" style="width: 200px">
          <ul id="treeMenu" class="tree tree-menu" data-ride="tree">
            <li style="background-color: #f39c12">
                
                <img src="/mycomic/<?php echo $user['avatar'] ?>" width="50px" height="50px" class="img-circle center-block">
                <p class="text-center" style="font-size: 20px"><?php echo $_SESSION['user']['name'] ?></p>
            </li>
            <li><a href="/mycomic/app/home/profile.php"><i class="fa fa-file-text-o"></i>我的信息</a></li>
            <li><a href="/mycomic/app/home/comments.php"><i class="fa fa-commenting-o"></i>我的留言</a></li>
            <li><a href="/mycomic/app/home/collects.php"><i class="fa fa-star"></i>我的收藏</a></li>
            <li><a href="/mycomic/app/home/password.php"><i class="fa fa-unlock-alt"></i>修改密码</a></li>
            <li><a href="/mycomic/app/home/renzheng.php"><i class="fa fa-user"></i>作者认证</a></li>
          </ul>
        </nav>
    </div>