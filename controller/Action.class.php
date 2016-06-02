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

    /**
     * Action constructor.
     */
    protected function __construct()
    {
        $this->_tpl = TPL::getInstance();
    }
    public function run()
    {
        $_m = isset($_GET['m']) ? $_GET['m'] : 'index';
        method_exists($this, $_m) ? eval('$this->' . $_m . '();') : $this->index();
    }


}










