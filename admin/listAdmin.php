<?php
require_once '../include.php';
$res = getAllAdmin();
if(!$res){
    alertMsg('Sorry,没有管理员，请添加！', 'addAdmin.php');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Insert title here</title>
    <link rel="stylesheet" href="../public/admin/styles/backstage.css">
</head>
<body>
<div class="details">
    <div class="details_operation clearfix">
        <div class="bui_select">
            <input type="button" value="添&nbsp;&nbsp;加" class="add"  onclick="addAdmin()">
        </div>

    </div>
    <!--表格-->
    <table class="table" cellspacing="0" cellpadding="0">
        <thead>
        <tr>
            <th width="15%">编号</th>
            <th width="25%">管理员名称</th>
            <th width="25%">管理员邮箱</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $i = 1;
            foreach($res as $row){
        ?>
            <tr>
                <!--这里的id和for里面的c1 需要循环出来-->
                <td><input type="checkbox" id="c1" class="check"><label for="c1" class="label"><?php echo $i;?></label></td>
                <td><?php echo $row['username'];?></td>
                <td><?php echo $row['email'];?></td>
                <td align="center"><input type="button" value="修改" class="btn" onclick="editAdmin('editAdmin', <?php echo $row['id'];?>)"><input type="button" value="删除" class="btn"  onclick="delAdmin(<?php echo $row['id'];?>)"></td>
            </tr>
        <?php $i++;}?>
        <?php if($totalRows>$pageSize):?>
            <tr>
                <td colspan="4"><?php echo showPage($page, $totalPage);?></td>
            </tr>
        <?php endif;?>
        </tbody>
    </table>
</div>
</body>
<script type="text/javascript">
    //修改操作
    function editAdmin(act, id){
        window.location='addAdmin.php?act='+act+'&id='+id;
    }
    //删除操作
    function delAdmin(id){
        window.location='doAdminAction.php?act=delAdmin&id='+id;
    }
</script>
</html>