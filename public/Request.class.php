<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/2
 * Time: 20:03
 */
class Request
{
    //  用戶存放實例化對象
    static private $_instance = null;

    //  公共靜態方法獲取實例化對象
    static public function getInstance()
    {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();

        }
        return self::$_instance;
    }


    //  私有克隆
    private function __clone()
    {

    }

    //  私有構造
    private function __construct()
    {

    }

    //  處理新增數據請求
    public function add($_fields)
    {
        $_addData = array();
        if (Validata::isArray($_POST) && !Validata::isNull($_POST)) {
            foreach ($_POST as $_key => $_value) {
                if (Validata::inArray($_key, $_fields)) {
                    $_addData[$_key] = $_value;

                }
            }

        }
        return $_addData;
    }
}




















