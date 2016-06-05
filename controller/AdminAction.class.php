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

    private $_manage = null;

    public function __construct()
    {
        parent::__construct();
        $this->_manage = new ManageModel();
    }

    //  後臺初始頁面
    public function index()
    {
        if (isset($_SESSION['admin'])) {
            $this->_tpl->assign('admin', $_SESSION['admin']);
            $this->_tpl->display(SMARTY_ADMIN . 'public/admin.tpl');
        }else {
            $this->_redirect->succ('?a=admin&m=login');
        }

    }

    //  起始頁
    public function main()
    {
        $this->_tpl->display(SMARTY_ADMIN . 'public/main.tpl');
    }


    //  后台登陆
    public function login()
    {
        if (isset($_POST['send'])) {
            $_SESSION['admin']['user'] = 'lee';
            $_SESSION['admin']['level'] = '订单处理专员';
            if ($this->_manage->login()) $this->_redirect->succ('?a=admin', '后台登陆成功');
        }
        $this->_tpl->display(SMARTY_ADMIN . 'public/login.tpl');
    }
}