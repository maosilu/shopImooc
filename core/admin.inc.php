<?php
/**
 * 检查管理员是否存在
 * User: maosilu
 * Date: 2017/12/4
 * Time: 下午2:33
 */
function checkAdmin($sql){
    return fetchOne($sql);
}
/**
 * 检查管理员是否登录
 */
function checkLogined()
{
    if ($_SESSION['adminId'] == '') {
        alertMsg('请先登录！', 'login.php');
    }
}
/**
 * 注销管理员
*/
function logout(){
    $_SESSION = array();
    if(isset($_COOKIE[session_name()])){
        setcookie(session_name(), '', time()-1);
    }
    session_destroy();
    header('location:login.php');
}