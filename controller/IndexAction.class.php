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

        $this->_tpl->assign('name', '首頁');
        $this->_tpl->display(SMARTY_FRONT . 'public/index.tpl');
    }




}