 <?php
    // +----------------------------------------------------------------------
    // | 后台上传漫画章节信息
    // +----------------------------------------------------------------------
    //引用常用的函数
    require_once('../../config/config.php');
    //判断管理员有没有访问的权限,validateAdmin(),在common/helpers.php
    validateAdmin();
    //引入头部
    include('header-layout.php');

    //获取作品id，和名称
    $id = $_GET['id'];
    $sql = "SELECT * FROM zuopins WHERE id='$id'";
    $zuopin = fetchOne($link,$sql);
?>
 <div class="content-wrapper">
        <div class="col-md-12 " style="margin-top: 50px">
        <section class="content" id="showcontent">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title text-center"><?php echo $zuopin['zuopin_name'] ?>章节信息列表</h3>
                            <div class="box-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <a href="/mycomic/app/admin/add_zhangjie.php?zuopin_id=<?php echo $id ?> "><button class="btn btn-success">添加章节</button></a>
                                </div>
                                <p></p>
                            </div>
                            
                        </div>
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <thead>
                                    <th>编号</th>
                                    <th>章节</th>
                                    <th>章节名称</th>
                                    <th>上传时间</th>
                                    <th>操作事项</th>
                                </thead>
                                <tbody>
                               
                                <?php
                                    //写查询章节的sql语句
                                    $sql2 = "SELECT * FROM zhangjies WHERE zuopin_id='$id'";
                                    //查询所有章节
                                    $zhangjies = fetchAll($link,$sql2);
                                    //判断是否是个数组
                                    if(is_array($zhangjies)){
                                        //遍历每一个管理员
                                        foreach($zhangjies as $zhangjie) {
                                ?>
                                <tr>
                                    <td><?php echo $zhangjie['id'] ?></td>
                                    <td><?php echo $zhangjie['zhangjie_num'] ?></td>
                                    <td><?php echo $zhangjie['zhangjie_title'] ?></td>
                                    <td><?php echo $zhangjie['addtime'] ?></td>
                                    <td>
                                        <a class="label label-danger" onclick="del(<?php echo $zhangjie['id'] ?>,'zhangjies')">删除</a>
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
        $.post('/mycomic/app/admin/handler/del.handler.php',{id:id,table:table},function(data){
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