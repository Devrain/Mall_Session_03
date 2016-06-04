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
        $this->_tpl->display(SMARTY_ADMIN . 'nav/show.tpl');
    }

    public function add()
    {
        if (isset($_POST['send'])) $this->_model->add() ? $this->_redirect->succ('?a=nav', '导航新增成功！') : $this->_redirect->error('导航新增失败');
        $this->_tpl->display(SMARTY_ADMIN . 'nav/add.tpl');
    }

    public function update()
    {
        $this->_tpl->display(SMARTY_ADMIN . 'nav/update.tpl');
    }

    public function delete()
    {
        
    }
}