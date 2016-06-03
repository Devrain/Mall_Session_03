<?php

//管理员实体类
class ManageModel extends Model
{
    public function __construct()
    {
        $this->_fields = array('id', 'user', 'pass', 'level', 'login_count', 'last_ip', 'last_time', 'reg_time');
        $this->_tables = array(DB_FREFIX . 'manage');
        parent::__construct($this, Factory::setCheck(), $this->_tables);

    }

    public function findAll()
    {
        return parent::select(array('user', 'level', 'login_count', 'last_ip', 'last_time'));
    }
    public function add()
    {
        $_addData = $this->_request->add($this->_fields);
        $_addData['pass'] = sha1($_addData['pass']);
        $_addData['last_ip'] = Tool::getIP();
        $_addData['reg_time'] = Tool::getDate();
        return parent::add($_addData);
        
    }

    public function isOne($_where)
    {
        return parent::isOne($_where);
    }

    public function isUser()
    {
        $this->_check->ajax($this);
    }

}
