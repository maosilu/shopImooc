<?php
/**
 * 公用函数
 * User: maosilu
 * Date: 2017/10/19
 * Time: 上午10:11
 */
function alertMsg($msg, $url){
    echo "<script>alert('{$msg}');</script>";
    echo "<script>window.location='{$url}';</script>>";
}