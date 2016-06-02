<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/2
 * Time: 14:52
 */
class DB
{
    //  PDO對象
    private $_pdo;
    //  用於存放實例化對象
    static private $_instance;

    //  公共靜態方法獲取實例化對象
    static protected function getInstance()
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
        try {
            $this->_pdo = new PDO('mysql:host=localhost;dbname=mall', 'root', 'root', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
            ));
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

}