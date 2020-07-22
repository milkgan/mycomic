<?php
	// +----------------------------------------------------------------------
	// | 后台添加作者信息
	// +----------------------------------------------------------------------

	//引用常用帮助的函数
	require_once('../../../config/config.php');

	//获取发送来的数据
	$author_name = $_POST['author_name'];
	$author_relname = $_POST['author_relname'];
	$author_city = $_POST['author_city'];
	$author_avatar = $_FILES['author_avatar'];
	$author_description = $_POST['author_description'];
	$author_guoji = $_POST['author_guoji'];
	$author_phone = $_POST['author_phone'];


	//先自定义个错误提示信息
	$error = '';

	//判断后台的信息有没有填写完整
	if(empty($author_name)) {
		$error = '请输入作者姓名';
		exit($error);
	}

	//判断有没有上传图片
	if(empty($author_relname)) {
		$error ='请输入作者真实姓名';
		exit($error);
	}

	if(empty($author_guoji)) {
		$error = '请输入作者国籍';
		exit($error);
	}
	//判断有没有上传链接
	if(empty($author_city)) {
		$error = '请输入作者居住地';
		exit($error);
	}
	if(empty($author_phone)) {
		$error = '请输入作者的联系方式';
		exit($error);
	}

	//判断后台的信息有没有填写完整
	if(empty($author_description)) {
		$error = '请输入作者简介';
		exit($error);
	}

	//判断后台的信息有没有填写完整
	

	if(empty($author_avatar)) {
		$error = '请上传正确的头像（JPG,PNG）';
		exit($error);
	}
	

	
	//具体上传图片操作,其中上传图片的函数在common/helpers.php里
	// 参数$img是视频文件  ，第二个是保存的地址
	$author_avatar = uploadImg($author_avatar,'../../../public/uploads');

	//如果上传图片失败，提示
	if(!$author_avatar) {
		exit('上传图片失败！');
	}
	
		//组装要插入数据库的数据
		$data = array(
			'author_name' =>$author_name,                                           
			'author_relname'=>$author_relname,
			'author_city'=>$author_city,
			'author_avatar'=>$author_avatar,
			'author_description'=>$author_description,
			'author_guoji'=>$author_guoji,
			'author_phone'=>$author_phone,
			'addtime'=>date('Y-m-d H:i:s'),
		);

		$result = insert($link,$data,'authors');

		if($result) {
			echo "<script>alert('数据保存成功！');window.location.href='/mycomic/app/admin/authors.php';</script>";
		}else{
			echo "<script>alert('保存失败，请重试！');window.location.href='/mycomic/app/admin/add_author.php';</script>";
		}





