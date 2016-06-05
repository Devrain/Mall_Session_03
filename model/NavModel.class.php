<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/4
 * Time: 20:25
 */
class NavModel extends Model
{
    private $_sid = 0;

    public function __construct()
    {
        parent::__construct();
        $this->_fields = array('id', 'name', 'info', 'sort', 'sid');
        $this->_tables = array(DB_FREFIX . 'nav');
        $this->_sid = isset($_GET['sid']) ? Tool::setFormString($_GET['sid']) : 0;
    }

    public function findAll()
    {
        return parent::select(array('id', 'name', 'info', 'sort'),
            array('where' => array('sid' => $this->_sid), 'limit' => $this->_limit, 'order' => 'sort ASC'));
    }

    public function findOne()
    {
        if (isset($_GET['sid'])) {
            return parent::select(array('id', 'name', 'info'), array('where' => array('id' => $this->_sid), 'limit' => '1'));
        }
        $_oneData = $this->getRequest()->one($this->_fields);
        return parent::select(array('id', 'name', 'info'), array('where' => $_oneData, 'limit' => '1'));
    }

    public function total()
    {
        return parent::total(array('where' => array('sid' => $this->_sid)));
    }

    public function add()
    {
        $_addData = $this->getRequest()->add($this->_fields);
        $_addData['sort'] = $this->nextId();
        return parent::add($_addData);
    }

    public function update()
    {
        $_oneData = $this->getRequest()->one($this->_fields);
        $_updateData = $this->getRequest()->update($this->_fields);
        return parent::update($_oneData, $_updateData);
    }

    public function sort()
    {

        foreach ($_POST['sort'] as $_index => $_item) {
            if (!is_numeric($_item)) continue;
            parent::update(array('id' => $_index), array('sort' => $_item));
        }
        return true;

    }

    public function isName()
    {
        $this->_check->ajax($this);
    }


}