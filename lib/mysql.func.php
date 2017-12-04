<?php
/**
 * 连接数据库的函数
 * User: maosilu
 * Date: 2017/10/19
 * Time: 上午10:07
 */
/**
 * 链接数据库的操作
*/
function connect(){
    $link = mysqli_connect(DB_HOST, DB_USER, DB_PWD) or die('数据库链接失败Error：'.mysqli_errno().':'.mysqli_error());
    mysqli_set_charset(DB_CHARSET);
    mysqli_select_db(DB_DBNAME) or die('指定数据库打开失败！');
    return $link;
}
/**
 * 完成记录插入的操作
 * @params string $table
 * @params array $array
 * @return int
*/
function insert($table, $array){
    $link = connect();
    $keys = join(',', array_keys($array));
    $values = "'".join("','", array_values($array))."'";
    $sql = "INSERT INTO {$table}{$keys} VALUES({$values})";
    mysqli_query($link, $sql);
    return mysqli_insert_id($link);
}
/**
 * 更新操作，返回受影响的行数
 * @params string $table
 * @params array $array 需要更新的字段
 * @params string $where
 * @return int 受影响的行数
*/
function update($table, $array, $where=null){
    $link = connect();
    $str = '';
    foreach($array as $key=>$value){
        if($str == null){
            $sep = '';
        }else{
            $sep = ',';
        }
        $str .= $sep.$key."='.$value.'";
    }
    $sql = "UPDATE {$table} SET {$str} ".($where==null?null:'WHERE '.$where);
    mysqli_query($link, $sql);
    return mysqli_affected_rows($link);
}
/**
 * 删除操作
 * @params string $table
 * @params string $where
 * @return int
*/
function delete($table, $where=null){
    $link = connect();
    $where = $where==null ? null : " WHERE ".$where;
    $sql = "DELETE FROM {$table} {$where}";
    mysqli_query($link, $sql);
    return mysqli_affected_rows($link);
}
/**
 * 得到制定的单条记录
 * @params tring $sql
 * @params string $result_type
 * @return array
*/
function fetchOne($sql, $result_type=MYSQLI_ASSOC){
    $link = connect();
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result, $result_type);
    return $row;
}
/**
 * 得到结果集中的所有记录
 * @params string $sql
 * @params string $result_type
 * @return array
*/
function fetchAll($sql, $result_type=MYSQLI_ASSOC){
    $link = connect();
    $result = mysqli_query($link, $sql);
    $rows = @mysqli_fetch_all($result, $result_type);
    return $rows;
}
/**
 * 得到结果集中记录的条数
 * @params string $sql
 * @return int 
*/
function getResultNum($sql){
    $link = connect();
    $result = mysqli_query($link, $sql);
    return mysqli_num_rows($result);
}