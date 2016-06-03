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

    //  验证对象
    private $_check = null;

    //  公共靜態方法獲取實例化對象
    static public function getInstance(&$_check)
    {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();
            self::$_instance->_check = $_check;
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
        if (Validate::isArray($_POST) && !Validate::isNullArray($_POST)) {
            //  验证数据合法性
            if (!$this->_check->check()) {
                print_r($this->_check->getMessage());
                exit();
            } 
            
            //  帅选准备入库的字段和数据
            foreach ($_POST as $_key => $_value) {
                if (Validate::inArray($_key, $_fields)) {
                    $_addData[$_key] = $_value;

                }
            }

        }
        return $_addData;
    }
}




















