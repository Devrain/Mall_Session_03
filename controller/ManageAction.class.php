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
    private $_level = null;

    public function __construct()
    {
        parent::__construct();
        $this->_level = new LevelModel();


    }

    //  管理員列表
    public function index()
    {
        parent::page($this->_model->total());
        $this->_tpl->assign('AllManage', $this->_model->findAll());
        $this->_tpl->display(SMARTY_ADMIN . 'manage/show.tpl');

    }

    //  添加管理員
    public function add()
    {
        print_r($_POST);
        //  检测post过来的参数
        if (isset($_POST['send'])) $this->_model->add() ? $this->_redirect->succ('?a=manage', '管理员新增成功') : $this->_redirect->error('管理员新增失败');

        $this->_tpl->assign('AllLevel', Tool::setFormItem($this->_level->findAll(), 'id', 'level_name'));
        $this->_tpl->display(SMARTY_ADMIN . 'manage/add.tpl');
    }

    //  删除管理员
    public function delete()
    {
        if (isset($_GET['id'])) $this->_model->delete() ? $this->_redirect->succ(Tool::getPrevPage(), '管理员删除成功') : $this->_redirect->error('管理员删除失败');
    }

    //  修改管理員
    public function update()
    {
        print_r($_POST);
        if (isset($_POST['send'])) $this->_model->update() ? $this->_redirect->succ(Tool::getPrevPage(), '管理员修改成功！') : $this->_redirect->error('管理员修改失败');
        if (isset($_GET['id'])) {
            $this->_tpl->assign('AllLevel', Tool::setFormItem($this->_level->findAll(), 'id', 'level_name'));
            $this->_tpl->assign('OneManage', $this->_model->findOne());
            $this->_tpl->display(SMARTY_ADMIN . 'manage/update.tpl');
        }
    }

    public function isUser()
    {
        $this->_model->isUser();
    }
}