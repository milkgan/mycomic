 <?php
    // +----------------------------------------------------------------------
    // | 后台管理作品
    // +----------------------------------------------------------------------
    
    //引用常用的函数
    require_once('../../config/config.php');

    //判断管理员有没有访问的权限,validateAdmin(),在common/helpers.php
    validateAdmin();

    //引入头部
    include('header-layout.php');
?>
 <div class="content-wrapper">
        <div class="col-md-12 " style="margin-top: 50px">
        <section class="content" id="showcontent">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title text-center">作品信息列表</h3>
                            <div class="box-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <a href="/mycomic/app/admin/add_zuopin.php"><button class="btn btn-success">添加作品</button></a>
                                </div>
                            </div>
                            <p></p>
                            
                        </div>
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <thead>
                                    <th>编号</th>
                                    <th>作品封面</th>
                                    <th>作品名称</th>
                                    <th>作者</th>
                                    <th>作品简介</th>
                                    <th>分类</th>
                                    <th>审核结果</th>
                                    <th>操作事项</th>
                                </thead>
                                <tbody>
                                
                                <?php
                                    //写查询产品的sql语句
                                    $sql = "SELECT zuopins.*,authors.author_name,categorys.category_name FROM zuopins INNER JOIN authors ON zuopins.author_id = authors.id INNER JOIN categorys ON categorys.id=zuopins.category_id ORDER BY zuopins.id DESC";
                                    //查询所有产品
                                    $zuopins = fetchAll($link,$sql);
                                    //判断是否是个数组
                                    if(is_array($zuopins)){
                                        //遍历每一个管理员
                                        foreach($zuopins as $zuopin) {
                                ?>
                                <tr>
                                    <td><?php echo $zuopin['id'] ?></td>
                                    <td><img src="/mycomic/<?php echo $zuopin['zuopin_img'] ?>" width="120px" height="100px"></td>
                                    <td><?php echo $zuopin['zuopin_name'] ?></td>
                                    <td><?php echo $zuopin['author_name'] ?></td>
                                    <td>
                                    <div><?php echo mb_substr($zuopin['zuopin_description'], 0,30,'utf-8');?></div>
                                    <div><?php echo mb_substr($zuopin['zuopin_description'], 30,30,'utf-8');?></div>
                                    <div><?php echo mb_substr($zuopin['zuopin_description'], 60,30,'utf-8');?></div>
                                    <div><?php echo mb_substr($zuopin['zuopin_description'], 90,30,'utf-8');?></div>
                                    <div><?php echo mb_substr($zuopin['zuopin_description'], 120,30,'utf-8');?></div>
                                    <div>......</div>
                                    </td>
                                    
                                    <td><?php echo $zuopin['category_name'] ?></td>
                                    <td>
                                        <?php if($zuopin['status'] == 0) { ?>
                                        <button class="btn btn-danger">审核不通过</button>
                                        <?php }else if($zuopin['status'] == 1) { ?>
                                        <button class="btn btn-success">审核通过</button>
                                        <?php }else if($zuopin['status'] == 2){ ?>
                                        <button class="btn btn-danger">等待审核</button>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a class="label label-info" onclick="check_zuopin1(<?php echo $zuopin['id'] ?>)">通过</a>
                                        <a class="label label-info" onclick="check_zuopin0(<?php echo $zuopin['id'] ?>)">不通过</a>
                                        <a class="label label-info" href="/mycomic/app/admin/zhangjie.php?id=<?php echo $zuopin['id']?>">浏览章节</a>
                                        <a class="label label-danger" onclick="del(<?php echo $zuopin['id'] ?>,'zuopins')">删除</a>
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
        $.post('/mycomic/app/admin/handler/del_zuopin.handler.php',{id:id,table:table},function(data){
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
 function check_zuopin1(id){
         $.post('/mycomic/app/admin/handler/check_zuopin1.handler.php',{id:id},function(data){
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
 function check_zuopin0(id){
         $.post('/mycomic/app/admin/handler/check_zuopin0.handler.php',{id:id},function(data){
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