  <?php
    // +----------------------------------------------------------------------
    // | 后台管理员修改密码
    // +----------------------------------------------------------------------
    
    //引用常用的函数
    require_once('../../config/config.php');

    //判断判断管理员有没有访问的权限,validateAdmin(),在common/helpers.php
    validateAdmin();

    //引入头部
    include('header-layout.php');
?>

<div class="col-md-6 col-md-offset-4" style="margin-top: 100px">
        <div class="panel panel-warning" style="margin-right: 50%">
            <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;管理员密码修改</h3>
            </div>
            <div class="panel-body">
                <form role="form" action="/mycomic/app/admin/handler/edit_password.handler.php" method="post" enctype=multipart/form-data>
                    <fieldset>
                            <div class="form-group">
                                <label for="input_name"><span class="glyphicon glyphicon-user"></span>&nbsp;输入旧密码</label>
                                <input id="input_name" class="form-control"  placeholder="请输入旧密码"  name="oldpassword" type="password">
                            </div>
                            <div class="form-group">
                                <label for="input_name"><span class="glyphicon glyphicon-user"></span>&nbsp;输入新密码</label>
                                <input id="input_name" class="form-control"  placeholder="请输入新密码"  name="password" type="password">
                            </div>
                            <div class="col-md-12" id="error_name"></div>
                            <div class="form-group">
                                <label for="input_email"><span class="glyphicon glyphicon-envelope"></span>&nbsp;重复输入新密码</label>
                                <input id="input_email" class="form-control" placeholder="重复输入新密码" name="repassword" type="password">
                            </div>
                            <div class="col-md-12" id="error_info"></div>
                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-saved"></span>&nbsp;保存修改</button>
                        </fieldset>
            
                </form>
            </div>
        </div>
    </div>





