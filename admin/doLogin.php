<?php
/**
 * 登录验证
 * User: maosilu
 * Date: 2017/10/19
 * Time: 下午5:21
 */
require_once '../include.php';
$username = htmlspecialchars($_POST['username']);
$password = md5(htmlspecialchars($_POST['password']));
$verify = htmlspecialchars($_POST['verify']);
$autoFlag = $_POST['autoFlag'];
$verify1 = $_SESSION['verifyCode'];
if($verify == $verify1){
    $sql = "SELECT * FROM imooc_admin WHERE username='{$username}' AND password='{$password}'";
    $row = checkAdmin($sql);
    if($row){
        //如果选择一周内自动登录
        if($autoFlag){
            setcookie('adminId', $row['id'], time()+7*24*3600);
            setcookie('adminName', $row['username'], time()+7*24*3600);
        }
        $_SESSION['adminName'] = $row['username'];
        $_SESSION['adminId'] = $row['id'];
        alertMsg('登录成功！', 'index.php');
    }else{
        alertMsg('登录失败，请重新登录！', 'login.php');
    }
}else{
    alertMsg('验证码错误！', 'login.php');
}
