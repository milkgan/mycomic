<?php

	// +----------------------------------------------------------------------
	// | 注册功能
	// | 设计思路，首先判断用户输入的数据是否正确，在判断用户的邮箱有没有注
	// | 过，满足条件，注册成功，ajaxReturn函数在include.php中
	// +----------------------------------------------------------------------

	//引用常用的函数
	require_once('../../../config/config.php');

	//获取前台发来的数据
	$author_avatar = $_FILES['avatar'];
    $author_name = $_POST['name'];//获取作者笔名
	$author_relname = $_POST['relname'];//获取真实姓名
	$author_guoji = $_POST['guoji'];
	$author_city = $_POST['city'];
	$author_phone = $_POST['phone'];//获取手机号
	
	$author_description = $_POST['info'];
	$user_id = $_SESSION['user']['id']; 
	
	//先自定义个错误提示信息
	$error = '';

	//判断后台的信息有没有填写完整
	if(empty($author_name)) {
		$error = '请输入作者笔名';
		exit($error);
	}

	//判断有没有上传图片
	if(empty($author_relname)) {
		$error ='请输入作者真实姓名';
		exit($error);
	}

	//判断有没有上传链接
	if(empty($author_city)) {
		$error = '请输入作者居住城市';
		exit($error);
	}

	//判断后台的信息有没有填写完整
	if(empty($author_description)) {
		$error = '请输入作者简介';
		exit($error);
	}

	//判断后台的信息有没有填写完整
	if(empty($author_guoji)) {
		$error = '请输入作者国籍';
		exit($error);
	}

	if(empty($author_avatar)) {
		$error = '请上传正确的头像（JPG,PNG）';
		exit($error);
	}

	if(empty($author_phone)) {
		$error = '请输入联系方式';
		exit($error);
	}


	
	
		$author_avatar = uploadImg($author_avatar,'../../../public/uploads');

		//如果上传图片失败，提示
		if(!$author_avatar) {
			exit('上传图片失败！');
		}
	

	$data = array(
        'author_name'=>$author_name,
		'author_relname'=>$author_relname,
		'author_guoji'=>$author_guoji,
		'author_city'=>$author_city,
        'author_phone'=>$author_phone,
		'author_avatar' => $author_avatar,
		'author_description'=>$author_description,
		'user_id'=>$user_id,

		'addtime'=>date('Y-m-d H:i:s')
	);

	//保存用户的注册信息到users表,其中的$link在include.php里
	$result2 = insert($link,$data,'authors');

	// if(!$result2) {
	// 	ajaxReturn(0,'注册失败！');
	// }else{
	// 	ajaxReturn(1,'恭喜你注册成功');
	// }

	
	if($result2) {
		echo "<script>alert('信息提交成功！');window.location.href='/mycomic/app/home/renzheng.php';</script>";
	}else{
		echo "<script>alert('提交失败，请重试！');window.location.href='/mycomic/app/home/renzheng.php';</script>";
	}

