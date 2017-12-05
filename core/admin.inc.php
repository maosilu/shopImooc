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
/**
 * 添加管理员
*/
function addAdmin(){
    $arr = $_POST;
    $arr['password'] = md5($_POST['password']);
    if(insert('imooc_admin', $arr)){
        $msg = "添加成功！<a href='addAdmin.php'>继续添加</a>|<a href='listAdmin.php'>查看管理员列表</a>";
    }else{
        $msg = "添加失败！<a href='addAdmin.php'>重新添加</a>";
    }
    echo $msg;die;
    return $msg;
}
/**
 * 修改管理员
*/
function editAdmin(){
    $arr = $_POST;
    $row = fetchOne("SELECT username,password,email FROM imooc_admin WHERE id={$arr['id']}");
    if($row['password'] == $arr['password']){
        $res = update('imooc_admin', $arr, "id={$arr['id']}");
    }else{
        $arr['password'] = md5($arr['password']);
        $res = update('imooc_admin', $arr, "id={$arr['id']}");
    }
    if($res){
        $msg = "修改成功！|<a href='listAdmin.php'>查看管理员列表</a>";
    }else{
        $msg = "修改失败！|<a href='listAdmin.php'>请重新修改</a>";
    }

    unset($arr);
    unset($row);
    unset($res);

    return $msg;
}
/**
 * 删除管理员
*/
function delAdmin(){
    $id = $_GET['id'];
    $res = delete('imooc_admin', "id={$id}");
    if($res){
        $msg = "删除成功！|<a href='listAdmin.php'>查看管理员列表</a>";
    }else{
        $msg = "删除失败！|<a href='listAdmin.php'>请重新删除</a>";
    }
    unset($res);
    return $msg;
}
/**
 * 获取所有管理员
*/
function getAllAdmin(){
    return fetchAll("SELECT id,username,email FROM imooc_admin");
}
/**
 * 获取指定管理员
*/
function getOneAdmin($id){
    return fetchOne("SELECT username,password,email FROM imooc_admin WHERE id={$id}");
}