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
    protected function add($_addFields, $_tables)
    {
        //  先对数据转意
//        $_addData = Tool::setFormString($_addData);
        $_addFields = array();
        $_addValues = array();
        foreach ($_addFields as $_index => $_item) {
            $_addFields[] = $_index;
            $_addValues = $_item;
        }

        $_addFields = implode(',', $_addFields);
        $_addValues = implode("','", $_addValues);
        
        $_sql = "INSERT INTO $_tables[0] ($_addFields) VALUES ('$_addValues')";
        return $this->execute($_sql);
    }


    //  验证一条数据
    protected function isOne($_where, $_tables)
    {
        $_isAnd = '';
        foreach ($_where as $_index => $_item) {
            $_isAnd .= "$_index='$_item' AND ";
        }
        $_isAnd = substr($_isAnd, 0, -4);
        $_sql = "SELECT id FROM $_table[0] WHERE $_isAnd LIMIT 1";
        return $this->execute($_sql);


    }
    


    /**
     * @param $_sql
     * 执行并且返回影响行数
     */
    private function execute($_sql)
    {
        $_stmt = $this->_pdo->prepare($_sql);
        $_stmt->execute();
        return $_stmt->rowCount();
        
    }

    
}

