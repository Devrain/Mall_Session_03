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
    static public function getInstance(&$_model, &$_check)
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
    private function __construct()
    {

    }

    //  處理新增數據請求
    public function add($_fields)
    {
        $_addData = array();
        if (Validate::isArray($_POST) && !Validate::isNullArray($_POST)) {
            if (!$this->_check->addCheck($this->_model, $_POST)) $this->_check;
            $_addData = $this->selectData($_POST, $_fields);

        }
        return $_addData;
    }

    public function update($_fields)
    {
        $_updateData = array();
        if (Validate::isArray($_POST) && !Validate::isNullArray($_POST)) {
            if (!$this->_check->updateCheck($this->_model, $_POST)) $this->check();
        }
        return $_updateData;
    }


    public function one($_fields)
    {
        $_oneDate = array();
        if (Validate::isArray($_GET) && !Validate::isNullArray($_GET)) {
            $_oneDate = $this->selectData($_GET, $_fields);
            if (!$this->_check->oneCheck($this->_model, $_oneDate)) $this->check();
        }
        return $_oneDate;
    }

    //  处理删除数据请求
    public function delete($_fields)
    {
        $_deleteData = array();
        if (Validate::isArray($_GET) && !Validate::isNullArray($_GET)) {
            $_deleteData = $this->selectData($_GET, $_fields);
            if (!$this->_check->oneCheck($this->_model, $_deleteData)) $this->check();
        }
        return $_deleteData;
    }

    public function ligin()
    {
        if (Validate::isArray($_POST) && !Validate::isNullArray($_POST)) {
            if (!$this->_check->loginCheck($this->_model, $_POST)) $this->check();
        }
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

    private function check()
    {
        $this->_tpl->assign('message', $this->_check->getMessage());
        $this->_tpl->assign('prev', Tool::getPrevPage());
        $this->_tpl->display(SMARTY_ADMIN . 'public/error.tpl');
        exit();
    }

    //  验证数据的合法性

}




















