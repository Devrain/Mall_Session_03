<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/2
 * Time: 13:38
 */
class Action
{
    protected $_tpl = null;

    protected $_model = null;

    /**
     * Action constructor.
     */
    protected function __construct(&$_model = null)
    {
        $this->_tpl = TPL::getInstance();
        $this->_model = $_model;
    }

    public function run()
    {
        $_m = isset($_GET['m']) ? $_GET['m'] : 'index';
        method_exists($this, $_m) ? eval('$this->' . $_m . '();') : $this->index();
    }


}










