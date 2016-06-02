<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/1
 * Time: 23:06
 */
class TPL extends Smarty
{
    //  用於存放實例化對象
    static private $_instance;

    //  公共靜態方法獲取實例化對象
    static public function getInstance()
    {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();

        }
        return self::$_instance;

    }

    //  私有克隆
    private function __clone()
    {

    }

    //  私有構造
    private function __construct()
    {
        $this->setConfigs();

    }

    //  重寫Smarty配置
    private function setConfigs()
    {
        $this->template_dir = ROOT_PATH . '/view/';
        $this->compile_dir = ROOT_PATH . '/compile/';
        $this->config_dir = ROOT_PATH . '/configs/';
        $this->cache_dir = ROOT_PATH . '/cache/';
        $this->caching = 0;
        $this->left_delimiter = '{';
        $this->right_delimiter = '}';
        $this->cache_lifetime = 60 * 60 * 24;
    }


}