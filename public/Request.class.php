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

    //  验证对象
    private $_check = null;

    //  模板对象
    private $_tpl = null;

    //  实体对象
    private $_model = null;

    //  公共靜態方法獲取實例化對象
    static public function getInstance(Model &$_model, Check &$_check)
    {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();
            self::$_instance->_model = $_model;
            self::$_instance->_check = $_check;
            self::$_instance->_tpl = TPL::getInstance();
        }
        return self::$_instance;
    }


    //  私有克隆
    private function __clone()
    {

    }

    //  私有構造
    /**
     * Request constructor.
     */
    private function __construct()
    {
        Tool::setRequest();
    }

    //  處理新增數據請求
    public function add(Array $_fields)
    {
        $_addData = array();
        if (Validate::isArray($_POST) && !Validate::isNullArray($_POST)) {
            $_addData = $this->selectData($_POST, $_fields);
        }
        return $_addData;
    }

    public function update(Array $_fields)
    {
        $_updateData = array();
        if (Validate::isArray($_POST) && !Validate::isNullArray($_POST)) {
            if (!$this->_check->updateCheck($this->_model, $_POST)) $this->check();
            $_updateData = $this->selectData($_POST, $_fields);
        }
        return $_updateData;
    }


    public function one(Array $_param)
    {
        if (!$this->_check->oneCheck($this->_model, $_param)) $this->check();
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


    /**
     * @param $_GET
     * @param $_fields
     */
    private function selectData($_requestData, $_fields)
    {
        $_selectData = array();
        foreach ($_requestData as $_index => $_item) {
            if (Validate::inArray($_index, $_fields)) {
                $_selectData[$_index] = $_item;
            }
        }
        return $_selectData;
    }



}




















