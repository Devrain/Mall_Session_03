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
    private $_pdo = null;
    //  用於存放實例化對象
    static private $_instance = null;

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
            $this->_pdo = new PDO(DB_DNS, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES ' . DB_CHARSET));
            $this->_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    //  新增
    protected function add($_addData,$_tables)
    {
        $_addData = array();
        $_addValues = array();
        foreach ($_addData as $_index => $_item) {
            $_addFields[] = $_index;
            $_addValues9 = $_item;
        }

        $_addFields = implode(',', $_addFields);
        $_addValues = implode("','", $_addValues);
        
        $_sql = "INSERT INTO $_tables[0] ($_addFields) VALUES ('$_addValues')";
        $_stmt = $this->_pdo->prepare($_sql);
        $_stmt->execute();
        return $_stmt->rowCount();
    }
}