<?php
/**
 * 验证操作
 * User: maosilu
 * Date: 2017/12/4
 * Time: 下午2:33
 */
function checkAdmin($sql){
    return fetchOne($sql);
}