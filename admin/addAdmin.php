<?php
require_once '../include.php';
$act = isset($_GET['act']) ? $_GET['act'] : 'addAdmin';
$id = isset($_GET['id']) ? $_GET['id'] : '';
if($act=='editAdmin'){
    $row = getOneAdmin($id);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title><?php echo $act=='editAdmin' ? '修改' : '添加';?>管理员</title>
</head>
<body>
<h3><?php echo $act=='editAdmin' ? '修改' : '添加';?>管理员</h3>
<form action="doAdminAction.php?act=<?php echo $act;?>" method="post">
    <?php if($act=='editAdmin'){?>
    <input type="hidden" name="id" value="<?php echo $id;?>">
    <?php }?>
    <table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
        <tr>
            <td align="right">管理员名称</td>
            <td><input type="text" name="username" value="<?php echo isset($row['username']) ? $row['username'] : '';?>" placeholder="请输入管理员名称"/></td>
        </tr>
        <tr>
            <td align="right">管理员密码</td>
            <td><input type="password" name="password" value="<?php echo isset($row['password']) ? $row['password'] : '';?>"/></td>
        </tr>
        <tr>
            <td align="right">管理员邮箱</td>
            <td><input type="text" name="email" value="<?php echo isset($row['email']) ? $row['email'] : '';?>" placeholder="请输入管理员邮箱"/></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit"  value="<?php echo $act=='editAdmin' ? '修改' : '添加';?>管理员"/></td>
        </tr>

    </table>
</form>
</body>
</html>