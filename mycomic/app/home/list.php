<?php 
    // +----------------------------------------------------------------------
    // | 作品分类页面
    // +----------------------------------------------------------------------
    include('../../config/config.php');

    include('header-layout.php');

    //获取分类信息
    $id = $_GET['id'];
    $sql3 = "SELECT * FROM categorys WHERE id='$id' ";
    $category = fetchOne($link,$sql3);
?>

<div class="container" style="margin-top: 75px">

	 <div class="row"> 
	 	<h2 class="text-center" style="margin-top: 40px"> <?php echo $category['category_name'] ?>分类下作品 </h2>
	 </div>


	 <div class="row">
		<div class="cards">
			<?php
   			    $limit = 8;	

			    //写查询的sql语句,获取分类下的所有信息
			    $sql = "SELECT * FROM zuopins WHERE category_id = '$id'";

			    $num_max = getTotalRows($link,$sql);
			    if(isset($_REQUEST['start'])) { 
			    	$start = $_REQUEST['start']; 
			    }else { 
			    	$start = 0; 
			    } 
			    $sql2 = "SELECT * FROM zuopins WHERE category_id = '$id'  limit $start,$limit"; 
			    $pre = $start-$limit;
			    $next = $start + $limit;
			    //查询所有信息
			    $zuopins = fetchAll($link,$sql2);
			    //判断是否是个数组
			        if(is_array($zuopins)){
			            //遍历每一个标签
			                foreach($zuopins as $zuopin) {
			   
			?>
		   <div class="col-md-4 col-sm-6 col-lg-3">
				    <div class="card"><a href="/mycomic/app/home/zhangjie.php?id=<?php echo $zuopin['id'] ?>"><img src="/mycomic/<?php echo $zuopin['zuopin_img'] ?>" width="274px" height="184px" alt=""></a></div>
				    <p class="fen-title"><?php echo $zuopin['zuopin_name'] ?></p>
				  </div>
		  <?php }}else{
		  	echo "<h2 class='text-center'>抱歉，暂时没有相关作品信息</h2>";
		  } ?>
		</div>
	 </div>
</div>




