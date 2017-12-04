<?php
/**
 * 登录验证
 * User: maosilu
 * Date: 2017/10/19
 * Time: 下午5:21
 */
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$verify = $_POST['verify'];
$verify1 = $_SESSION['verifyCode'];
