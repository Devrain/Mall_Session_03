<?php

//管理员实体类
class ManageModel extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->_fields = array('id', 'user', 'pass', 'level', 'login_count', 'last_ip', 'last_time', 'reg_time');
        $this->_tables = array(DB_FREFIX . 'manage');
        $this->_request = Request::getInstance($this, $this->_check);
    }

    public function findAll()
    {
        $this->_tables = array(DB_FREFIX . 'manage a', DB_FREFIX . 'level b');
        return parent::select(array('a.id', 'a.user', 'a.level', 'a.login_count', 'a.last_ip', 'a.last_time','b.level_name'), array('where'=>'a.level=b.id','limit' => $this->_limit, 'order' => 'a.reg_time DESC'));
    }

    public function findOne()
    {
        $_oneData = $this->getRequest()->one($this->_fields);
        return parent::select(array('id', 'user', 'level'), array('where' => $_oneData, 'limit' => '1'));
    }

    public function total()
    {
        return parent::total();
    }

    public function add()
    {
        $_addData = $this->getRequest()->add($this->_fields);
        $_addData['pass'] = sha1($_addData['pass']);
        $_addData['last_ip'] = Tool::getIP();
        $_addData['reg_time'] = Tool::getDate();
        return parent::add($_addData);

    }


    public function update()
    {
        $_oneData = $this->getRequest()->one($this->_fields);
        $_updateData = $this->_request->update($this->_fields);
        $_updateData['pass'] = sha1($_updateData['pass']);
        return parent::update($_oneData, $_updateData);
        
    }
    


    public function isUser()
    {
        $this->_check->ajax($this);
    }

}
