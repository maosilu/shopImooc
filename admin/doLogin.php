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
    $res = checkAdmin($sql);
    var_dump($res);
}else{
    echo "<script>alert('验证码错误！');</script>";
    echo "<script>window.location='index.php';</script>>";
}
