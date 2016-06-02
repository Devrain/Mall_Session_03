<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/2
 * Time: 14:01
 */
class ListAction extends Action
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->_tpl->assign('name', '列表頁');
        $this->_tpl->display(SMARTY_STYLE . 'list.tpl');

    }
    public function update()
    {
        echo '更新';

    }


}