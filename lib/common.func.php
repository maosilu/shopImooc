<?php
/**
 * 公用函数
 * User: maosilu
 * Date: 2017/10/19
 * Time: 上午10:11
 */
/**
 * 显示相应的操作结果，并跳转到相应页面
*/
function alertMsg($msg, $url){
    echo "<script>alert('{$msg}');</script>";
    echo "<script>window.location='{$url}';</script>>";
}
/**
 * 判断是否登录
*/
function checkLogined(){
    if($_SESSION['adminId'] == ''){
        alertMsg('请先登录！', 'login.php');
    }
}
