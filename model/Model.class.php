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

    protected function __construct()
    {
        $this->_db = parent::getInstance($this->_tables);
        $this->_check = Factory::setCheck();
        $this->_request = Request::getInstance($this, $this->_check);
    }

    public function update($_oneData, $_updateData)
    {
        return $this->_db->update($_oneData, $_updateData);
    }

    protected function add($_addData)
    {
        return $this->_db->add($this->_tables, $_addData);
    }

    protected function delete($_deleteData)
    {
        return $this->_db->delete($this->_tables, $_deleteData);
    }

    protected function isOne($_OneData)
    {
        return $this->_db->isOne($this->_tables, $_OneData);
    }


    protected function select($_field, $_param = array())
    {
        return $this->_db->select($this->_tables,$_field, $_param);
    }

    protected function total()
    {
        return $this->_db->total($this->_tables);
    }

    public function setLimit($_limit)
    {
        $this->_limit = $_limit;

    }


}