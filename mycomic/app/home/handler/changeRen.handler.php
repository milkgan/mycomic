<?php

	// +---------------------------------------------------------------------------------------------
	// | 用户上传个人资料
	// +----------------------------------------------------------------------------------------------
	
	//引用常用帮助的函数
	require_once('../../../config/config.php');


	//获取发送来的数据
	$author_avatar = $_FILES['avatar'];
    $author_name = $_POST['name'];//获取作者笔名
	$author_relname = $_POST['relname'];//获取真实姓名
	$author_guoji = $_POST['guoji'];
	$author_city = $_POST['city'];
	$author_phone = $_POST['phone'];//获取手机号	
	$author_description = $_POST['info'];
	$user_id = $_SESSION['user']['id']; 
	
	//具体上传头像操作,其中上传图片的函数在common/helpers.php里
	// 参数$avatar是文件  ，第二个是保存的地址
	if(!empty($author_avatar['tmp_name'])) {

        $author_avatar = uploadImg($author_avatar,'../../../public/uploads');

		//如果上传图片失败，提示
		if(!$author_avatar) {
			exit('上传图片失败！');
		}

		//组装数据
		$data = array(
            'author_name'=>$author_name,
            'author_relname'=>$author_relname,
            'author_guoji'=>$author_guoji,
            'author_city'=>$author_city,
            'author_phone'=>$author_phone,
            'author_avatar' => $author_avatar,
            'author_description'=>$author_description,
            'addtime'=>date('Y-m-d H:i:s')
		);

		$where = "user_id=".$user_id;
		$result2 = update($link,$data,'authors',$where);
		// 这里可以改一下跳转页面，重新登录就可以看到自己的信息被保存
		if($result2) {
			echo "<script>alert('信息修改成功！');window.location.href='/mycomic/app/home/renzheng.php';</script>";
		}else{
			echo "<script>alert('修改失败，请重试！');window.location.href='/mycomic/app/home/renzheng.php';</script>";
		}
	}


	$data = array(
        'author_name'=>$author_name,
        'author_relname'=>$author_relname,
        'author_guoji'=>$author_guoji,
        'author_city'=>$author_city,
        'author_phone'=>$author_phone,
        'author_description'=>$author_description,
        'addtime'=>date('Y-m-d H:i:s')
    );

    $where = "user_id=".$user_id;
    $result2 = update($link,$data,'authors',$where);
    // 这里可以改一下跳转页面，重新登录就可以看到自己的信息被保存
    if($result2) {
        echo "<script>alert('信息修改成功！');window.location.href='/mycomic/app/home/renzheng.php';</script>";
    }else{
        echo "<script>alert('修改失败，请重试！');window.location.href='/mycomic/app/home/renzheng.php';</script>";
    }





