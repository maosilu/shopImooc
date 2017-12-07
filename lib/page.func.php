<?php
/**
 * 分页函数
 * User: maosilu
 * Date: 2017/10/19
 * Time: 上午10:10
 */
require_once '../include.php';
$sql = "SELECT * FROM imooc_admin";
$totalRows = getResultNum($sql);
$pageSize = 2;
//得到总页码数
$totalPage = ceil($totalRows/$pageSize);
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if($page<1 || $page==null || !is_numeric($page)){
    $page = 1;
}
if($page >= $totalPage) $page = $totalPage;
$offset = ($page-1)*$pageSize;

$sql = "SELECT * FROM imooc_admin LIMIT {$offset}, {$pageSize}";
$res = fetchAll($sql);
echo "<pre>";
var_dump($res);
echo showPage($page, $totalPage, 'cid=5');
function showPage($page, $totalPage, $where=null, $sep="&nbsp;"){
    $where = $where==null ? null : '&'.$where;
    $url = $_SERVER['PHP_SELF'];
    $pre_num = $page-1;
    $next_num = $page+1;
    $str = '总共'.$totalPage.'页／当前是第'.$page.'页';
    $index = $page==1 ? '首页' : "<a href='{$url}?page=1{$where}'>首页</a>";
    $end = $page==$totalPage ? '尾页' : "<a href='{$url}?page={$totalPage}{$where}'>尾页</a>";
    $pre = $page==1 ? '上一页' : "<a href='{$url}?page=$pre_num{$where}'>上一页</a>";
    $next = $page==$totalPage ? '下一页' : "<a href='{$url}?page=$next_num{$where}'>下一页</a>";
    $pageBanner = '';
    for($i=1; $i<=$totalPage; $i++){
        if($page == $i){
            $pageBanner .= "[{$i}]";
        }else{
            $pageBanner .= "<a href='{$url}?page={$i}{$where}'>[{$i}]</a>";
        }
    }
    $pageStr =  $str.$sep.$index.$sep.$pre.$sep.$pageBanner.$sep.$next.$sep.$end;
    return $pageStr;
}