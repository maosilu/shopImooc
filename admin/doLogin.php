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
$verify1 = $_SESSION['verifyCode'];
if($verify == $verify1){
    $sql = "SELECT * FROM imooc_admin WHERE username='{$username}' AND password='{$password}'";
    $row = checkAdmin($sql);
    if($row){
        $_SESSION['adminName'] = $row['username'];
        echo $_SESSION['adminName'];
        alertMsg('登录成功！', 'index.php');
    }else{
        alertMsg('登录失败，请重新登录！', 'login.php');
    }
}else{
    alertMsg('验证码错误！', 'login.php');
}
