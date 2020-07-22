 <?php
    // +----------------------------------------------------------------------
    // | 后台管理作者
    // +----------------------------------------------------------------------
    
    //引用常用的函数
    require_once('../../config/config.php');

    //判断管理员有没有访问的权限,validateAdmin(),在common/helpers.php
    validateAdmin();

    //引入头部
    include('header-layout.php');
?>
 

 <div class="content-wrapper">
        <div class="col-md-10 col-md-offset-1" style="margin-top: 50px">
        <section class="content" id="showcontent">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title text-center">作者信息列表</h3>
                            <div class="box-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <a href="/mycomic/app/admin/add_author.php"><button class="btn btn-success">添加作者</button></a>
                                </div>
                            </div>
                            
                        </div>
                        <p></p>
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                            <thead>
                                    <th>编号</th>
                                    <th>头像</th>
                                    <th>作者笔名</th>
                                    <th>真实姓名</th>
                                    <th>联系方式</th>
                                    <th>国籍</th>
                                    <th>居住地</th>
                                    <th>审核结果</th>
                                    <th>操作事项</th>
                                </thead>
                                <tbody>
                                
                                <?php
                                    //写查询产品的sql语句
                                    $sql = "SELECT * FROM authors ORDER BY id DESC";

                                    //查询所有产品
                                    $authors = fetchAll($link,$sql);
                                    //判断是否是个数组
                                    if(is_array($authors)){
                                        //遍历每一个作者
                                        foreach($authors as $author) {
                                ?>
                                <tr>
                                    <td><?php echo $author['id'] ?></td>
                                    <td><img src="/mycomic/<?php echo $author['author_avatar'] ?>" width="120px" height="100px"></td>
                                    <td><?php echo $author['author_name'] ?></td>
                                    <td><?php echo $author['author_relname'] ?></td>
                                    <td><?php echo $author['author_phone'] ?></td>
                                    <td><?php echo $author['author_guoji'] ?></td>
                                    <td><?php echo $author['author_city'];  ?></td>
                                    <td>
                                        <?php if($author['status'] == 0) { ?>
                                        <button class="btn btn-danger">审核不通过</button>
                                        <?php }else if($author['status'] == 1) { ?>
                                        <button class="btn btn-success">审核通过</button>
                                        <?php }else if($author['status'] == 2){ ?>
                                        <button class="btn btn-danger">等待审核</button>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a class="label label-info" onclick="check_author1(<?php echo $author['id'] ?>)">通过</a>
                                        <a class="label label-info" onclick="check_author0(<?php echo $author['id'] ?>)">不通过</a>
                                        <a class="label label-info" href="/mycomic/app/admin/edit_author.php?id=<?php echo $author['id']?>">修改</a>
                                        <a class="label label-danger" onclick="del(<?php echo $author['id'] ?>,'authors')">删除</a>
                                    </td>
                                </tr>
                                <?php }} ?>
                                </tbody>
                            </table>
                        </div>
                
                    </div>
                </div>
            </div>
        </section>
    </div>

</div>





<script>
    //删除作品的方法
    function del(id,table) {
        if(confirm('确定删除吗？')){
        $.post('/mycomic/app/admin/handler/del_author.handler.php',{id:id,table:table},function(data){
            if(data.result == 1) {
                alert(data.message);
                window.location.reload();
            }

            if(data.result == 0) {
                alert(data.message);
            }
        },'json');
        }else{
            return false;
        }
    }
</script>
<script>
 //审核的方法
 function check_author0(id){
         $.post('/mycomic/app/admin/handler/check_author0.handler.php',{id:id},function(data){
            if(data.result == 1) {
                alert(data.message);
                window.location.reload();
            }

            if(data.result == 0) {
                alert(data.message);
            }
        },'json');
    }
</script>
<script>
 //审核的方法
 function check_author1(id){
         $.post('/mycomic/app/admin/handler/check_author1.handler.php',{id:id},function(data){
            if(data.result == 1) {
                alert(data.message);
                window.location.reload();
            }

            if(data.result == 0) {
                alert(data.message);
            }
        },'json');
    }
</script>