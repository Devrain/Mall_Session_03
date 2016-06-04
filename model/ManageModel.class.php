<?php

//管理员实体类
class ManageModel extends Model
{
    public function __construct()
    {
        $this->_fields = array('id', 'user', 'pass', 'level', 'login_count', 'last_ip', 'last_time', 'reg_time');
        $this->_tables = array(DB_FREFIX . 'manage');
        parent::__construct();

    }

    public function findAll()
    {
        return parent::select(array('id', 'user', 'level', 'login_count', 'last_ip', 'last_time'), array('limit' => $this->_limit, 'order' => 'reg_time DESC'));
    }

    public function findOne()
    {
        $_oneData = $this->_request->one($this->_fields);
        return parent::select(array('id', 'user', 'level'), array('where' => $_oneData, 'limit' => '1'));
    }

    public function total()
    {
        return parent::total();
    }

    public function add()
    {
        $_addData = $this->_request->add($this->_fields);
        $_addData['pass'] = sha1($_addData['pass']);
        $_addData['last_ip'] = Tool::getIP();
        $_addData['reg_time'] = Tool::getDate();
        return parent::add($_addData);

    }


    public function update()
    {
        $_oneData = $this->_request->one($this->_fields);
        $_updateData = $this->_request->update($this->_fields);
        $_updateData['pass'] = sha1($_updateData['pass']);
        return parent::update($_oneData, $_updateData);
        
    }
    
    public function delete()
    {
        $_deleteData = $this->_request->delete($this->_fields);
        return parent::delete($_deleteData);
    }


    public function isOne($_isOneData)
    {
        return parent::isOne($_isOneData);
    }

    public function isUser()
    {
        $this->_check->ajax($this);
    }

}
