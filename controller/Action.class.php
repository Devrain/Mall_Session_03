<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/2
 * Time: 13:38
 */
class Action
{
    /**
     * @var null|TPL
     */
    protected $_tpl = null;

    /**
     * @var null
     */
    protected $_model = null;

    protected $_redirect = null;

    /**
     * Action constructor.
     */
    protected function __construct( &$_model = null)
    {
        $this->_tpl = TPL::getInstance();
        $this->_model = $_model;
        $this->_redirect = Redirect::getInstance($this->_tpl);
    }


    /**
     *  控制器默认运行方法
     */
    public function run()
    {
        //  尝试获取有没有方法名 如add updata等
        $_m = isset($_GET['m']) ? $_GET['m'] : 'index';
        //  检查这个方法是否存在  不存在就返回index
        method_exists($this, $_m) ? eval('$this->' . $_m . '();') : $this->index();
    }


}










