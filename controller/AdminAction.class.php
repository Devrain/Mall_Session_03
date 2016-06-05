<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/2
 * Time: 16:17
 */
 
//  後臺控制器
class AdminAction extends Action
{
    public function __construct()
    {
        parent::__construct();
    }
    
    //  後臺初始頁面
    public function index()
    {
        $this->_tpl->display(SMARTY_ADMIN . 'public/admin.tpl');
    }

    //  起始頁
    public function main()
    {
        $this->_tpl->display(SMARTY_ADMIN . 'public/main.tpl');
    }


    //  后台登陆
    public function login()
    {
        $this->_tpl->display(SMARTY_ADMIN . 'public/login.tpl');
    }
}