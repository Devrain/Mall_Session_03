<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/4
 * Time: 20:18
 */
class NavAction extends Action
{

    /**
     * NavAction constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        parent::page();
        $this->_tpl->assign('AllNav', $this->_model->findAll());
        $this->_tpl->display(SMARTY_ADMIN . 'nav/show.tpl');
    }

    public function add()
    {
        if (isset($_POST['send'])) $this->_model->add() ? $this->_redirect->succ('?a=nav', '导航新增成功！') : $this->_redirect->error('导航新增失败');
        $this->_tpl->display(SMARTY_ADMIN . 'nav/add.tpl');
    }

    public function update()
    {
        if (isset($_POST['send'])) $this->_model->update() ? $this->_redirect->succ(Tool::getPrevPage(), '导航名称修改成功') : $this->_redirect->error('导航名称修改失败');
        if (isset($_GET['id'])) {
            $this->_tpl->assign('OneNav', $this->_model->findOne());
            $this->_tpl->display(SMARTY_ADMIN . 'nav/update.tpl');
        }
    }

    public function delete()
    {
        if (isset($_GET['id'])) $this->_model->delete() ? $this->_redirect->succ(Tool::getPrevPage(), '导航删除成功') : $this->_redirect->error('导航删除失败');
    }

    public function isName()
    {
        $this->_model->isName();
    }
}