<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/1
 * Time: 22:09
*/


require dirname(__FILE__) . '/configs/run.inc.php';

global $_tpl;
$_tpl->assign('name', '首頁');
$_tpl->display(SMARTY_STYLE . 'index.tpl');

