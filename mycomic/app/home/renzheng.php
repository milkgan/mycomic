<?php
    // +----------------------------------------------------------------------
    // | 个人显示资料 页面
    // +----------------------------------------------------------------------
    
    //引入配置和常用的函数
    include('../../config/config.php');
    
    //引入头部公共部分
    include('header-layout.php');

    //获取当前用户的个人信息
    $id = $_SESSION['user']['id'];  //获取用户id
    $sql = "SELECT * FROM users WHERE id='$id'"; //写获取用户的sql语句
    $user = fetchOne($link,$sql); //获取用户信息

    $sql2 = "SELECT * FROM authors WHERE user_id='$id'"; //写获取用户的sql语句
    $authors = fetchOne($link,$sql2); //获取用户信息


     //判断用户有没有登录，如果没有登录转跳到登录页面
    if (empty($_SESSION['user'])){
            echo "<script>alert('抱歉，请先登录后再发布信息')</script>";
            redirect('/mycomic/app/home/login.php');
    } 

  
?>

<?php if($authors['status'] == 0) { ?>
<div class="container" style="margin-top: 7%;margin-bottom: 20%">
    <?php 
      //引入个人资料菜单
        include('profile-layout.php');
    ?>
    <div class="col-md-9">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;申请成为作者</h3>
            </div>
            <div class="panel-body">
                <form role="form" action="/mycomic/app/home/handler/renzheng.handler.php" method="post" enctype=multipart/form-data>
                    <fieldset>
                            <div class="form-group">
                                <label for="input_phone"><span class="glyphicon glyphicon-name"></span>&nbsp;笔名</label>
                                <input id="name" class="form-control" placeholder="笔名" name="name" type="text" autofocus>
                            </div>
                            <div class="col-md-12" id="error_email"></div>
                            <div class="form-group">
                                <label for="input_phone"><span class="glyphicon glyphicon-relname"></span>&nbsp;真实姓名</label>
                                <input id="relname" class="form-control" placeholder="真实姓名" name="relname" type="text" autofocus>
                            </div>
                            <div class="col-md-12" id="error_email"></div>
                            <div class="form-group">
                                <label for="input_phone"><span class="glyphicon glyphicon-relname"></span>&nbsp;国籍</label>
                                <input id="guoji" class="form-control" placeholder="国籍" name="guoji" type="text" autofocus>
                            </div>
                            <div class="col-md-12" id="error_email"></div>
                            <div class="form-group">
                                <label for="input_phone"><span class="glyphicon glyphicon-relname"></span>&nbsp;所在城市</label>
                                <input id="city" class="form-control" placeholder="所在城市" name="city" type="text" autofocus>
                            </div>
                            <div class="col-md-12" id="error_email"></div>
                            <div class="form-group">
                                <label for="input_phone"><span class="glyphicon glyphicon-phone"></span>&nbsp;手机</label>
                                <input id="phone" class="form-control" placeholder="手机" name="phone" type="text" autofocus>
                            </div>
                            <div class="col-md-12" id="error_email"></div>
                            <div class="form-group">
                                <label for="input_face"><span class="glyphicon glyphicon-picture"></span>&nbsp;作者头像</label>
                                <input id="avatar" class="form-control" name="avatar" type="file" autofocus>
                            </div>
                            <div class="col-md-12" id="error_face"></div>
                            <div class="form-group">
                                <label for="input_info"><span class="glyphicon glyphicon-edit"></span>&nbsp;作者简介</label>
                                <textarea id="info" class="form-control" rows="10" name="info"></textarea>
                            </div>
                            <div class="col-md-12" id="error_face"></div>
                            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-saved"></span>&nbsp;提交</button>
                    </fieldset>
            
                </form>
            </div>
        </div>
    </div>

</div>

<?php }else if($authors['status'] == 1) { ?>
    <div class="container" style="margin-top: 7%;margin-bottom: 20%">
    <?php 
      //引入个人资料菜单
        include('author-layout.php');
    ?>
    <div class="col-md-9">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;恭喜你审核成功</h3>
            </div>
            <div class="panel-body">
                <form role="form" action="/mycomic/app/home/handler/changeRen.handler.php" method="post" enctype=multipart/form-data>
                    <fieldset>
                            <div class="form-group">
                                <label for="input_phone"><span class="glyphicon glyphicon-name"></span>&nbsp;笔名</label>
                                <input id="name" class="form-control" placeholder="笔名" value="<?php echo $authors['author_name'] ?>" name="name" type="text" autofocus>
                            </div>
                            <div class="col-md-12" id="error_email"></div>
                            <div class="form-group">
                                <label for="input_phone"><span class="glyphicon glyphicon-relname"></span>&nbsp;真实姓名</label>
                                <input id="relname" class="form-control" placeholder="真实姓名" value="<?php echo $authors['author_relname'] ?>" name="relname" type="text" autofocus>
                            </div>
                            <div class="col-md-12" id="error_email"></div>
                            <div class="form-group">
                                <label for="input_phone"><span class="glyphicon glyphicon-relname"></span>&nbsp;国籍</label>
                                <input id="guoji" class="form-control" placeholder="国籍" value="<?php echo $authors['author_guoji'] ?>" name="guoji" type="text" autofocus>
                            </div>
                            <div class="col-md-12" id="error_email"></div>
                            <div class="form-group">
                                <label for="input_phone"><span class="glyphicon glyphicon-relname"></span>&nbsp;所在城市</label>
                                <input id="city" class="form-control" placeholder="所在城市" value="<?php echo $authors['author_city'] ?>" name="city" type="text" autofocus>
                            </div>
                            <div class="col-md-12" id="error_email"></div>
                            <div class="form-group">
                                <label for="input_phone"><span class="glyphicon glyphicon-phone"></span>&nbsp;手机</label>
                                <input id="phone" class="form-control" placeholder="手机" value="<?php echo $authors['author_phone'] ?>" name="phone" type="text" autofocus>
                            </div>
                            <div class="col-md-12" id="error_email"></div>
                            <div class="form-group">
                                <label for="input_face"><span class="glyphicon glyphicon-picture"></span>&nbsp;作者头像</label>
                                <input id="avatar" class="form-control" name="avatar" type="file" autofocus>
                            </div>
                            <div class="col-md-12" id="error_face"></div>
                            <div class="form-group">
                                <label for="input_info"><span class="glyphicon glyphicon-edit"></span>&nbsp;作者简介</label>
                                <textarea id="info" class="form-control" rows="10" name="info"><?php echo $authors['author_description'] ?></textarea>
                            </div>
                            <div class="col-md-12" id="error_face"></div>
        
                            <div class="col-md-12" id="error_info"></div>
                            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-saved"></span>&nbsp;保存修改</button>
                           
                    </fieldset>
            
                </form>
            </div>
        </div>
    </div>

</div>

<?php }else if($authors['status'] == 2){ ?>
    <div class="container" style="margin-top: 7%;margin-bottom: 20%">
    <?php 
      //引入个人资料菜单
        include('profile-layout.php');
    ?>
     <div class="col-md-9">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;申请成为作者</h3>
            </div>
            <div class="panel-body">
            <h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;等待审核</h3>
            </div>
        </div>
    </div>

</div>
                                        
<?php } ?>

<script>
    //注册的方法
    function register(){
         var name = $('#name').val();
         var relname = $('#relname').val();
         var guoji = $('#guoji').val();
         var city = $('#city').val();
         var phone = $('#phone').val();
         var avatar = $('#avatar').val();
         var info = $('#info').val();
         $.post("/mycomic/app/home/handler/renzheng.handler.php",{name:name,relname:relname,guoji:guoji,city:city,phone:phone,avatar:avatar,info:info}, function(data){
            if( data.result == 1 ){
                alert('提交成功');
                window.location.href="/mycomic/app/home/check.php"; 
            }
            if(data.result == 0 ) {
                alert(data.message);
            }
        },'json');
    }   
</script>


