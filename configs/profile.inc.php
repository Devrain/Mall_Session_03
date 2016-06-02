<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/1
 * Time: 22:42
 */


//  smarty配置文件  樣式替換
define('SMARTY_FRONT', 'default/'); //  前臺皮膚
define('SMARTY_ADMIN', 'admin/');
define('SMARTY_COMPILE_DIR', ROOT_PATH . '/compile/');
define('SMARTY_TEMPLATE_DIR', ROOT_PATH . '/view/');
define('SMARTY_CONFIG_DIR', ROOT_PATH . '/configs/');
define('SMARTY_CACHE_DIR', ROOT_PATH . '/cache/');
define('SMARTY_CACHING', 0);
define('SMARTY_CACHE_LIFETIME', 60 * 60 * 24);
define('SMARTY_LEFT_DELIMITER', '{');
define('SMARTY_RIGHT_DELIMITER', '}');

//  設置數據庫鏈接參數
define('DB_DNS', 'mysql:host=localhost;dbname=mall');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_CHARSET', 'UTF8');
