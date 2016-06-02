<?php

//TPL继承smarty
class TPL extends Smarty
{
    //用于存放实例化的对象
    static private $_instance;

    //公共静态方法获取实例化的对象
    static public function getInstance()
    {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    //私有克隆
    private function __clone()
    {
    }

    //私有构造
    private function __construct()
    {
        $this->setConfigs();
    }

    //重写Smarty配置
    private function setConfigs()
    {
        //模板目录
        $this->template_dir = ROOT_PATH . '/view/';
        //编译目录
        $this->compile_dir = ROOT_PATH . '/compile/';
        //配置变量目录
        $this->config_dir = ROOT_PATH . '/configs/';
        //缓存目录
        $this->cache_dir = ROOT_PATH . '/cache/';
        //是否开启缓存，网站开发调试阶段，我们应该关闭缓存
        $this->caching = 0;
        //缓存的声明周期
        $this->cache_lifetime = 60 * 60 * 24;
        //左定界符
        $this->left_delimiter = '{';
        //右定界符
        $this->right_delimiter = '}';
    }
}

