<?php
	// +----------------------------------------------------------------------
	// |  后台用户功能
	// | 	比如后台中有篇文章，我们想要删除这篇文章，就用到这个文件下的方法；
	// |设计思路是，我们获取到发送来的数据id（比如文章的id）和表的名字，然后
	// | 就可以通过sql语句进行删除，最后提示删除结果
	// +----------------------------------------------------------------------
	

	//引用常用的函数
	require_once('../../../config/config.php');

	//获取发来的数据
	$id = $_POST['id']; //获取数据的id，比如这篇文章的id
	$table = $_POST['table']; //获取此数据对应的表名，比如此文章对应的数据库表

	//需要同时获取到两个数据，不然提示参数错误
	if(!$id && !$table) {
		ajaxReturn(0,'抱歉，参数错误！');
	}

	//删除用户数据操作,mysql_delete()在common/mysql.php下,我们通过require_once('../../../config/config.php')引入了进来
	 $result = mysql_delete($link,$table,'id='.$id);

	//判断删除成功与否，给予提示
	if($result) {
		ajaxReturn(0,'删除失败！');
	}else{
		//同时删除用户的心得
		mysql_delete($link,'posts','user_id='.$id);



		//同时删除用户的评论
		mysql_delete($link,'comments','user_id='.$id);
		ajaxReturn(1,'删除成功！');
	}