<?php

//管理员实体类
class ManageModel extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->_fields = array('id', 'user', 'pass', 'level', 'login_count', 'last_ip', 'last_time', 'reg_time');
        $this->_tables = array(DB_FREFIX . 'manage');

    }

    public function add(&$_request)
    {
        $_addData = $_request->add($this->_fields);
        $_addData['pass'] = sha1($_addData['pass']);
        $_addData['last_ip'] = Tool::getIP();
        $_addData['reg_time'] = Tool::getDate();
        return parent::add($_addData, $this->_tables);
        
    }
}
