<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/2
 * Time: 13:31
 */
class Factory
{
    static private $_action = null;

    static public function setAction()
    {
        $_a = isset($_GET['a']) ? $_GET['a'] : 'index';
        if (!file_exists(ROOT_PATH.'/controller/'.$_a.'Action.class.php')) $_a = 'index';
        eval('self::$_action = new ' . ucfirst($_a) . 'Action();');
        return self::$_action;
    }

}