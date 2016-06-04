<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/4
 * Time: 16:22
 */
class LevelModel extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->_fields = array('id', 'level_name');
        $this->_tables = array(DB_FREFIX . 'level');
    }


    public function findAll()
    {
        return parent::select(array('id', 'level_name'));
    }

    public function update()
    {
        $_oneData = $this->getRequest()->one($this->_fields);
        $_updateData = $this->getRequest()->update($this->_fields);
        $_updateData['pass'] = sha1($_updateData['pass']);
        return parent::update($_oneData, $_updateData);

    }

}