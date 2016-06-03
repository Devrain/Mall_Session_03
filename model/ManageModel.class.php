<?php

//管理员实体类
class ManageModel extends Model
{
    public function __construct()
    {
        parent::__construct($this,Factory::setCheck());
        $this->_fields = array('id', 'user', 'pass', 'level', 'login_count', 'last_ip', 'last_time', 'reg_time');
        $this->_tables = array(DB_FREFIX . 'manage');

    }

    public function add()
    {
        $_addData = $this->_request->add($this->_fields);
        $_addData['pass'] = sha1($_addData['pass']);
        $_addData['last_ip'] = Tool::getIP();
        $_addData['reg_time'] = Tool::getDate();
        return parent::add($_addData, $this->_tables);
        
    }

    public function isOne($_where, $_tables)
    {
        return parent::isOne($_where, $_tables); 
    }

    public function isUser()
    {
        $this->_check->ajax($this);
    }

}
