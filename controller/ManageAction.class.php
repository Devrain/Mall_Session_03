<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/2
 * Time: 18:36
 */
 
//  管理員控制器


class ManageAction extends Action
{
    public function __construct()
    {
        parent::__construct(Factory::setModel(),Factory::setCheck());


    }

    //  管理員列表
    public function index()
    {
        $this->_tpl->display(SMARTY_ADMIN . 'manage/manage.tpl');

    }

    //  添加管理員
    public function add()
    {
        //  检测post过来的参数
        if (isset($_POST['send'])) $this->_model->add(Request::getInstance($this->_model,$this->_check));
        $this->_tpl->display(SMARTY_ADMIN . 'manage/add.tpl');
    }

    //  修改管理員
    public function update()
    {
        $this->_tpl->display(SMARTY_ADMIN . 'manage/update.tpl');
    }

    public function ajax()
    {
        $this->_check->ajax($this->_model);
    }
}