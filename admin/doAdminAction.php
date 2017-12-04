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
}