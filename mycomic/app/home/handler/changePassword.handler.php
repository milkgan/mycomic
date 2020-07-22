<?php
    // +----------------------------------------------------------------------
    // | 修改密码
    // +----------------------------------------------------------------------

    //引用常用的函数
    require_once('../../../config/config.php');

    //获取原密码
    $oldpassword = $_POST['oldpassword'];
    //获取新密码
    $password = $_POST['password'];
    //获取重复密码
    $repassword = $_POST['repassword'];

    //判断用户输入的旧密码是否为空
    if (!$oldpassword) {
        //如果为空，返回提示信息
        echo "<script>alert('请输入旧密码');history.back();</script>";
        exit();
    }

    //判断用户输入的新密码是否为空
    if (!$password) {
           echo "<script>alert('请输入新密码');history.back();</script>";
        exit();
    }


    //判断用户输入的重复密码是否为空
    if ($repassword != $password) {
           echo "<script>alert('两次输入的密码不一致，请重新输入');history.back();</script>";
        exit();
    }

    //判断用户输入的原密码是否正确
    $user_id = $_SESSION['user']['id'];
    $sql = "SELECT * FROM users WHERE id='$user_id'";

    $user = fetchOne($link,$sql);

    if($oldpassword != $user['password']) {
        echo "<script>alert('抱歉，输入的旧密码错误，请重新输入');history.back();</script>";
        exit();
    }


    //更新新的密码
    $where = "id='$user_id'";
    $data = array(
        "password"=>$password
    );

    $result = update($link,$data,'users',$where);

    if($result) {
        echo "<script>alert('密码更新成功');history.back();</script>";
        exit();
    }else{
        echo "<script>alert('密码更新失败');history.back();</script>";
        exit();
    }



