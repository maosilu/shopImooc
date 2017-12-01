<?php
/**
 * 配置包含文件，避免每次用到在当前文件都要包含一次
 * User: maosilu
 * Date: 2017/10/19
 * Time: 下午4:56
 */
session_start();
define('ROOT', dirname(__FILE__));
set_include_path(get_include_path().PATH_SEPARATOR.ROOT.'/lib'.PATH_SEPARATOR.ROOT.'/core');
require_once 'common.func.php';
require_once 'image.func.php';
require_once 'mysql.func.php';
require_once 'page.func.php';
require_once 'string.func.php';