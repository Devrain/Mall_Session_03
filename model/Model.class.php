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
    protected $_limit = '';

    protected function __construct(&$_model,&$_check,$_tables)
    {
        $this->_db = parent::getInstance($_tables);
        $this->_check = $_check;
        $this->_request = Request::getInstance($_model, $_check);
    }

    protected function add($_addData)
    {
        return $this->_db->add($_addData);
    }

    protected function isOne($_where)
    {
        return $this->_db->isOne($_where);
    }

    protected function select($_field,$_param=array())
    {
        return $this->_db->select($_field,$_param);
    }

    protected function total()
    {
        return $this->_db->total();
    }

    public function setLimit($_limit)
    {
        $this->_limit = $_limit;

    }


}