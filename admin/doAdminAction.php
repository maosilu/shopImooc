<?php
/**
 * Created by PhpStorm.
 * User: maosilu
 * Date: 2017/12/4
 * Time: 下午5:22
 */
require_once '../include.php';
$act = $_GET['act'];
if($act == 'logout'){
    logout();
}elseif($act == 'addAdmin'){
    $msg = addAdmin();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title></title>
</head>
<body>
<?php
    if($msg){
        echo $msg;
    }
?>
</body>
</html>
