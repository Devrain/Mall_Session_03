<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/3
 * Time: 16:40
 */
class Redirect
{
    //  用户存放实例化对象
    static private $_instance = null;

    /**
     * Redirect constructor.
     */
    public function __construct()
    {
    }

    //  公共静态方法获取实例化对象
    static public function getInstance(&$_tpl)
    {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();
            self::$_instance->_tpl = $_tpl;

        }
        return self::$_instance;
    }

    private function __clone()
    {

    }

    public function succ($_url, $_info)
    {
        $this->_tpl->assign('message', $_info);
        $this->_tpl->assign('url', $_url);
        $this->_tpl->display(SMARTY_ADMIN . 'public/succ.tpl');
        exit();

    }

    public function error($_info)
    {
        $this->_tpl->assign('message', $_info);
        $this->_tpl->assign('prev', Tool::getPrevPage());
        $this->_tpl->display(SMARTY_ADMIN . 'public/error.tpl');
        exit();
    }
}