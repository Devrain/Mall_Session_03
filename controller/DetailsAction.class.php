<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/2
 * Time: 13:45
 */
class DetailsAction extends Action
{
    public function __construct()
    {
        parent::__construct();
    }
    //  實現初始頁面
    public function index()
    {
        $this->_tpl->assign('name', '詳情頁');
        $this->_tpl->display(SMARTY_STYLE . 'details.tpl');
    }


}