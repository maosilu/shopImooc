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
    if (!isset($_SESSION['adminId']) && !isset($_COOKIE['adminId'])) {
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
    if(isset($_COOKIE['adminId'])){
        setcookie('adminId', '', time()-1);
    }
    if(isset($_COOKIE['adminName'])){
        setcookie('adminName', '', time()-1);
    }
    session_destroy();
    header('location:login.php');
}
function addAdmin(){
    $arr = $_POST;
    $arr['password'] = md5($_POST['password']);
    if(insert('imooc_admin', $arr)){
        $msg = "添加成功！<a href='addAdmin.php'>继续添加</a>|<a href='listAdmin.php'>查看管理员列表</a>";
    }else{
        $msg = "添加失败！<a href='addAdmin.php'>重新添加</a>";
    }
    return $msg;
}