<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/2
 * Time: 16:17
 */
 
//  管理員控制器
class AdminAction extends Action
{
    public function __construct()
    {
        parent::__construct();
    }
    
    //  後臺初始頁面
    public function index()
    {
        $this->_tpl->display(SMARTY_STYLE . 'admin.tpl');
    }
}