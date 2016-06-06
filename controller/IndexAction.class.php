<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/2
 * Time: 13:49
 */
class IndexAction extends Action
{
    private $_nav = null;

    public function __construct()
    {
        parent::__construct();
        $this->_nav = new NavModel();
    }

    public function index()
    {

        $this->_tpl->assign('FrontTenNav', $this->_nav->findFrontTenNav());
        $this->_tpl->display(SMARTY_FRONT . 'public/index.tpl');
    }

    //  验证码
    public function validateCode()
    {
        $_vc = new ValidateCode();
        $_vc->doimg();
        $_SESSION['code'] = $_vc->getCode();
    }


}