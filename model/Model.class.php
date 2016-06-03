<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/2
 * Time: 15:04
 */
//  model 基類
class Model extends DB
{
    protected $_db = null;
    protected $_fields = array();
    protected $_tables = array();
    protected $_check = null;
    protected $_request = null;

    protected function __construct(&$_model,&$_check)
    {
        $this->_db = parent::getInstance();
//        var_dump($this->_db);
        $this->_check = $_check;
        $this->_request = Request::getInstance($_model, $_check);
    }

    protected function add($_addData,$_tables)
    {
        return $this->_db->add($_addData,$_tables);
    }

    protected function isOne($_where, $_tables)
    {
        return $this->_db->isOne($_where, $_tables);
    }

}