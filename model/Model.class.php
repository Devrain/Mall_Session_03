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
    protected $_limit = '';

    protected function __construct()
    {
        $this->_db = parent::getInstance();
    }


    protected function add($_addData)
    {
        return $this->_db->add($this->_tables, $_addData);
    }

    protected function update(Array $_param,Array $_updateData)
    {
        return $this->_db->update($this->_tables, $_param, $_updateData);
    }


    protected function select(Array $_field,Array  $_param = array())
    {
        return $this->_db->select($this->_tables, $_field, $_param);
    }

    protected function total($_param=array())
    {
        return $this->_db->total($this->_tables,$_param);
    }

    protected function nextId()
    {
        return $this->_db->nextId($this->_tables);
    }

    protected function getRequest()
    {
        return Request::getInstance($this, $this->_check);
    }

    protected function delete(Array $_param)
    {
        return $this->_db->delete($this->_tables, $_param);
    }

    protected function isOne(Array $_param)
    {
        return $this->_db->isOne($this->_tables, $_param);
    }


    public function setLimit($_limit)
    {
        $this->_limit = $_limit;

    }


}
