<?php
	//这里是系统的共享头部区域
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>漫画管理后台</title>
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
</head>
<body>

    <div class="row" id="head">
    <nav class="navbar navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <!-- 导航头部 -->
        <div class="container">
        <div class="navbar-header">
          <!-- 品牌名称或logo -->
          <a class="navbar-brand" href="/mycomic/">漫画管理后台</a>
        </div>
        
        <div class="collapse navbar-collapse navbar-collapse-example">
        <ul class="nav navbar-nav navbar-center">
           <!-- 样式可能是css3属性 -->
             <li><a href="/mycomic/app/admin/index.php" >类型管理</a></li>
             <li><a href="/mycomic/app/admin/zuopins.php" >漫画管理</a></li>
             <li><a href="/mycomic/app/admin/user.php" >用户管理</a></li>
             <li><a href="/mycomic/app/admin/authors.php" >作者管理</a></li>
             <li><a href="/mycomic/app/admin/comments.php" >留言管理</a></li>
             <li><a href="/mycomic/app/admin/edit_password.php" >管理员管理</a></li>
          </ul>
        
          <div class="nav navbar-nav navbar-right dropdown dropdown-hover">
            <img src="/mycomic/<?php echo $_SESSION['admin']['avatar'] ?>" width="30px" height="30px" class="img-circle">
            <button class="btn" type="button" data-toggle="dropdown"><?php echo $_SESSION['admin']['name'] ?><span class="caret"></span></button>
            <ul class="dropdown-menu">
            <li><a href="javascript:void(0)" onclick="logout()">退出系统</a></li>
            
             </ul>
        </div>
        </div>

                 
        </div><!-- END .navbar-collapse -->
      </div>
      <!-- （html5标签）nav元素是一个可以用来作为页面导航的链接组；其中的导航元素链接到其他页面或当前页面的其他部分。
      并不是所有的链接组都要被放进<nav>元素；例如，在页脚中通常会有一组链接，包括服务条款、首页、版权声明等；
      这时使用<footer>元素是最恰当的，而不需要<nav>元素。 -->
    </nav>
    </div>

    <script>
    //退出登录的方法
    function logout(){
    //ajax提交退出登录方法
        $.get("/mycomic/app/admin/handler/logout.handler.php",{}, function(data){
        if( data.result == 1 ){
        alert('退出成功！');
        window.location.href="/mycomic/app/home/login.php"; 
        }
        if( data.result == 0 ){
        alert('退出失败！');
        }
        },'json');
        }   
    </script>


        




















<!-- <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>后台</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" href="/mycomic/public/admin/base/images/logo.png">
    <link rel="stylesheet" href="/mycomic/public/admin/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/mycomic/public/admin/fonts/css/font-awesome.min.css">
    <link rel="stylesheet" href="/mycomic/public/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="/mycomic/public/admin/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="/mycomic/public/admin/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" type="text/css" href="/mycomic/public/admin/plugins/datepicker/datepicker3.css">
    <script src="/mycomic/public/admin/plugins/jQuery/jQuery-2.2.0.min.js"></script>
    <style>
        *{
            font-family:"Microsoft YaHei";
        }
        .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{
            vertical-align:middle;
            text-align:center;
        }
    </style>
</head>
<body class="hold-transition skin-blue sidebar-mini" style="margin-top: -25px">
<div class="wrapper">
    <header class="main-header">
        <a href="index.php" class="logo">
            <span class="logo-mini">后台管理</span>
            <span class="logo-lg">漫画管理后台</span>
        </a>
        <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">下拉菜单</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="/dongmanguanli/<?php echo $_SESSION['admin']['avatar'] ?>"
                                 class="user-image" alt="User Image">
                            <?php if(isset($_SESSION['admin'])) ?>
                            <span class="hidden-xs"><?php echo $_SESSION['admin']['name']  ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-header">
                                <img src="/dongmanguanli/<?php echo $_SESSION['admin']['avatar'] ?>"
                                     class="img-circle" alt="User Image">
                                <p>
                                    admin
                                    <small><?php echo date('Y-m-d',time()) ?></small>
                                </p>
                            </li>
                            <li class="user-footer">
                                
                                <div class="pull-right">
                                    <a href="javascript:void(0)" class="btn btn-default btn-flat" onclick="logout()">退出系统</a>
                                </div>
                            </li>
                             <script>
                                //退出登录的方法
                                function logout(){
                                     //ajax提交退出登录方法
                                     $.get("/dongmanguanli/app/admin/handler/logout.handler.php",{}, function(data){
                                        if( data.result == 1 ){
                                            alert('退出成功！');
                                            window.location.href="/dongmanguanli/app/home/login.php"; 
                                        }
                                        if( data.result == 0 ){
                                            alert('退出失败！');
                                        }
                                    },'json');
                                }   
                            </script>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <aside class="main-sidebar">
        <section class="sidebar">
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="/dongmanguanli/<?php echo $_SESSION['admin']['avatar'] ?>" class="img-circle"
                         alt="User Image">
                </div>
                <div class="pull-left info">
                     <?php if(isset($_SESSION['admin'])) ?>
                    <p><?php echo $_SESSION['admin']['name']  ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> 在线</a>
                </div>
            </div>
       
            <ul class="sidebar-menu">
                <li class="header">管理菜单</li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-tags" aria-hidden="true"></i>
                        <span>漫画管理</span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="/dongmanguanli/app/admin/category.php">
                                <i class="fa fa-circle-o"></i> 漫画类型管理
                            </a>
                        </li>
                        <li>
                            <a href="/dongmanguanli/app/admin/authors.php">
                                <i class="fa fa-circle-o"></i> 漫画作者管理 
                            </a>
                        </li>
                       
                    </ul>
                </li>
                 <li class="treeview">
                    <a href="/dongmanguanli/app/admin/zuopins.php">
                        <i class="fa fa-book" aria-hidden="true"></i>
                        <span>漫画上传</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-send-o " aria-hidden="true"></i>
                        <span>资讯管理</span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="/dongmanguanli/app/admin/news.php">
                                <i class="fa fa-circle-o"></i>资讯列表
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="/dongmanguanli/app/admin/comments.php">
                        <i class="fa fa-comments" aria-hidden="true"></i>
                        <span>评论管理</span>
                    </a>
                </li>
                
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <span>会员管理</span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="/dongmanguanli/app/admin/user.php">
                                <i class="fa fa-circle-o"></i> 会员列表
                            </a>
                        </li>
                    </ul>
                </li>
                   <li class="treeview">
                    <a href="#">
                        <i class="fa fa-user-circle" aria-hidden="true"></i>
                        <span>管理员管理</span>
                      
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="/dongmanguanli/app/admin/edit_password.php">
                                <i class="fa fa-circle-o"></i> 修改密码
                            </a>
                        </li>
                        <li>
                            <a href="/dongmanguanli/app/admin/admin.php">
                                <i class="fa fa-circle-o"></i> 信息查看
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </section>
    </aside> -->