<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/2
 * Time: 20:03
 */
//  http 请求类
class Request
{
    //  用戶存放實例化對象
    static private $_instance = null;

    //  公共靜態方法獲取實例化對象
    static public function getInstance(Model &$_model, Check &$_check)
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
        Tool::setRequest();
    }

    public function filter(Array $_fields)
    {
        $_selectData = array();
        if (Validate::isArray($_POST)&& !Validate::isNullArray($_POST)) {
            foreach ($_POST as $_index => $_item) {
                if (Validate::inArray($_index,$_fields)) {
                    $_selectData[$_index] = $_item;
                }
            }

        }
        return $_selectData;
    }


    public function getParam(Array $_param)
    {
        $_getParam = array();
        foreach ($_param as $_index => $_item) {
            if ($_index == 'in') $_item = str_replace(',', "','", $_item);
            $_getParam[] = $_item;
        }
        return $_getParam;
    }



}




















