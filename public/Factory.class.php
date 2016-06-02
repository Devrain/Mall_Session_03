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
        eval('self::$_action = new ' . ucfirst(isset($_GET['a']) ? $_GET['a'] : 'index') . 'Action();');
        return self::$_action;
    }

}