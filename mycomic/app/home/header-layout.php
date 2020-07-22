<?php
	//这里是系统的共享头部区域
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- zui框架的css -->
    <link rel="stylesheet" href="/mycomic/public/css/zui.min.css">
    <link  rel="stylesheet" href="/mycomic/public/css/buttons.css">
    <link rel="stylesheet" href="/mycomic/public/css/head.css">
    <link rel="stylesheet" href="/mycomic/public/css/style.css">
    <!-- 图标样式的css -->
    <link rel="stylesheet" href="/mycomic/public/css/font-awesome.min.css"> 
    <link rel="stylesheet" href="/mycomic/public/css/create.css"> 
    <!-- 引用jquery -->
    <script src="/mycomic/public/js/jquery-1.12.4.js"></script>
    <script src="/mycomic/public/js/zui.min.js"></script>
   
</head>
<body>

    <div class="row" id="head">
    <nav class="navbar navbar-fixed-top" role="navigation" >
      <div class="container-fluid">
        <!-- 导航头部 -->
        <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="/mycomic/">漫画管理系统</a>
        </div>
        <!-- 导航项目 -->
        <div class="collapse navbar-collapse navbar-collapse-example">
          <!-- 一般导航项目 -->
          <ul class="nav navbar-nav">
            <li class="active"><a href="/mycomic/">主页</a></li>
          </ul>
          <!-- 搜索框结构 -->
          <form class="navbar-form navbar-left" action="/mycomic/app/home/search.php" role="search">
            <div class="form-group">
              <div class="col-xs-10">
              <input type="text" id="search_name" name="keyword" class="form-control" placeholder="搜索漫画名称">
              </div>
            </div>
            <button type="submit" class="btn btn-default">搜索</button>
          </form>


         <?php
            //判断有没有开启session 
            if(!isset($_SESSION)) {
            //如果没有开启，那么开启  
                 @session_start();  
            }
            // 如果有用户存在
            if(isset($_SESSION['user'])) {
              $idmg = $_SESSION['user']['id'];  //获取用户id
              $sql8 = "SELECT * FROM users WHERE id='$idmg'"; //写获取用户的sql语句
              $userimg = fetchOne($link,$sql8); //获取用户信息
         ?>
         <!-- 右侧导航登陆功能 -->
          <ul class="nav navbar-nav navbar-right">
          <!-- 输出头像 -->
            <li><img src="/mycomic/<?php echo $userimg['avatar'] ?>" width="30px" height="30px" class="img-circle"></li>
            <!-- 下拉菜单 -->
            <li class="dropdown">
            <!-- javascript:是伪协议，表示url的内容通过javascript执行。void(0)表示不作任何操作，这样会防止链接跳转到其他页面。这么做往往是为了保留链接的样式，但不让链接执行实际操作 -->
              <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['user']['name'] ?> <b class="caret"></b></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="/mycomic/app/home/profile.php">我的资料</a></li>
                <!-- 退出登录 -->
                <li><a href="javascript:void(0)" onclick="logout()">我要退出啦</a></li>
              </ul>
            </li>
          </ul>
          <!-- 如果用户不存在，就登录和注册按钮 -->
        	<?php }else{ ?>
           <ul class="nav navbar-nav navbar-right">
             <li><a href="/mycomic/app/home/login.php" class="button button-3d button-action button-pill">登录</a></li>
             <li><a href="/mycomic/app/home/register.php" class="button button-3d button-primary button-pill">注册</a></li>
          </ul>
         <?php }?>
        </div>
      </div>
      </div>
      <!-- （html5标签）nav元素是一个可以用来作为页面导航的链接组；其中的导航元素链接到其他页面或当前页面的其他部分。
      并不是所有的链接组都要被放进<nav>元素；例如，在页脚中通常会有一组链接，包括服务条款、首页、版权声明等；
      这时使用<footer>元素是最恰当的，而不需要<nav>元素。 -->
    </nav>
    </div>

<!-- ajax方法实现退出登录和搜索功能 -->
    <script>
        //退出登录的方法
        function logout(){
             //ajax提交退出登录方法
             $.get("/mycomic/app/home/handler/logout.handler.php",{}, function(data){
                if( data.result == 1 ){
                    alert('退出成功！');
                    // 退出成功则回到首页
                    window.location.href="/mycomic/"; 
                }
                if( data.result == 0 ){
                    alert('退出失败！');
                }
                // "json" - 以 JSON 运行响应，并以 JavaScript 对象返回
            },'json');
        }   

        //搜索功能的实现
        function search() {
          // $("#search_name")是id选择器,获得id为userName的标签,通过.val(),获得这个标签的value的值,赋值给你声明的变量
            var search_name = $('#search_name').val();

                    $.post('/mycomic/app/home/handler/search.handler.php',{search_name:search_name},function(data){
                      // 想知道这个函数返回的data值有啥
                        if(data.result == 1) {
                          // 跳到搜索页面
                            window.location.href='/mycomic/app/home/search.php?id='+data.message;
                        }
                        if(data.result == 0) {
                            alert('抱歉，没有找到搜索的信息！');
                        }
                    },'json');
        }
    </script>











