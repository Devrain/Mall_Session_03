<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/2
 * Time: 13:49
 */
class IndexAction extends Action
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        new UserModel();
        $this->_tpl->assign('name', '首頁');
        $this->_tpl->display(SMARTY_STYLE . 'index.tpl');
    }

    public function add()
    {
        echo '新增';
    }


}