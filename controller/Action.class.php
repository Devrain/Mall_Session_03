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
    protected function __construct()
    {
        $this->_tpl = TPL::getInstance();
        $this->_model = Factory::setModel();
        $this->_redirect = Redirect::getInstance($this->_tpl);
    }


    protected function page($_page_size = PAGE_SIZE)
    {
        $_page = new Page($this->_model->total(), $_page_size);
        $this->_model->setLimit($_page->getLimit());
        $this->_tpl->assign('page', $_page->showPage());
        $this->_tpl->assign('num', ($_page->getPage() - 1) * $_page_size);
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










