<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/2
 * Time: 13:31
 */
//  控制器工厂
class Factory
{
    static private $_obj = null;

    static public function setAction()
    {
        $_a = self::getAction();
        //  再判断控制器是否存在 不存在依然给默认Index控制器
        if (!file_exists(ROOT_PATH . '/controller/' . $_a . 'Action.class.php')) $_a = 'Index';
        //  返回实例化控制器  首字母大写处理
        eval('self::$_obj = new ' . ucfirst($_a) . 'Action();');
        return self::$_obj;
    }

    static public function setModel()
    {
        $_a = self::getAction();
        if (file_exists(ROOT_PATH.'/model/'.$_a.'Model.class.php')) {
            eval('self::$_obj = new ' . ucfirst($_a) . 'Model();');
        }
        return self::$_obj;
    }
    
    static public function setCheck()
    {
        $_a = self::getAction();
        if (file_exists(ROOT_PATH.'/check/'.$_a.'Check.class.php')) {
            eval('self::$_obj = new ' . ucfirst($_a) . 'Check();');
            return self::$_obj;
        } 
    }   

    //  获取动作 如果没有就默认给Index控制器
    static public function getAction()
    {
        if (isset($_GET['a']) && !empty($_GET['a'])) {
            return $_GET['a'];
        }
        return "Index";
    }
}

