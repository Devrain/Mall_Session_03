<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/1
 * Time: 22:43
 */

//  定義錯誤級別
error_reporting(E_ALL);

//  創建一個實際路徑
define('ROOT_PATH', substr(dirname(__FILE__), 0, -8));
//  引入系統配置文件
require ROOT_PATH . '/configs/profile.inc.php';
//  引入smarty
require ROOT_PATH . '/smarty/Smarty.class.php';

//  自動加載類
function __autoload($_className)
{
    if (substr($_className, -6) == 'Action') {
        require ROOT_PATH . '/controller/' . $_className . '.class.php';

    } elseif (substr($_className, -5) == 'Model') {
        require ROOT_PATH . '/model/' . $_className . '.class.php';

    }elseif (substr($_className,-5)=='Check') {
        require ROOT_PATH . '/check/' . $_className . '.class.php';
    }  else {
        require ROOT_PATH . '/public/' . $_className . '.class.php';

    }


}


//  單入口
//$_tpl=TPL::getInstance();
Factory::setAction()->run();

