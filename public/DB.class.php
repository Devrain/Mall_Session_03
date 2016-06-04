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
    //  数据表
    private $_tables = array();

    //  用於存放實例化對象
    static private $_instance = null;

    //  公共靜態方法獲取實例化對象
    static protected function getInstance($_tables)
    {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();
            self::$_instance->_tables = $_tables;
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
    protected function add($_tables, $_addData)
    {
        //  先对数据转意
//        $_addData = Tool::setFormString($_addData);
        $_addFields = array();
        $_addValues = array();
        foreach ($_addData as $_index => $_item) {
            $_addFields[] = $_index;
            $_addValues[] = $_item;
        }

        $_addFields = implode(',', $_addFields);
        $_addValues = implode("','", $_addValues);

        $_sql = "INSERT INTO $_tables[0] ($_addFields) VALUES ('$_addValues')";
        return $this->execute($_sql)->rowCount();
    }


    protected function update($_tables, $_oneData, $_updateData)
    {
        $_isAnd = '';
        foreach ($_oneData as $_index => $_item) {
            $_isAnd .= "$_index='$_item' AND ";
        }
        $_isAnd = substr($_isAnd, 0, 4);
        $_setData = '';
        foreach ($_updateData as $_index => $_item) {
            $_setData .= "$_index'$_item',";
        }
        $_setData = substr($_setData, 0, -1);
        $_sql = "UPDATE $_tables[0] SET $_setData WHERE $_isAnd LIMIT 1";
        return $this->execute($_sql)->rowCount();


    }

    //  验证一条数据
    protected function isOne($_tables, $_isOneData)
    {
        $_isAnd = '';
        foreach ($_isOneData as $_index => $_item) {
            $_isAnd .= "$_index='$_item' AND ";
        }
        $_isAnd = substr($_isAnd, 0, -4);
        $_sql = "SELECT id FROM $_tables[0] WHERE $_isAnd LIMIT 1";
        return $this->execute($_sql)->rowCount();


    }


    //  删除
    protected function delete($_tables, $_deleteData)
    {
        $_isAnd = '';
        foreach ($_deleteData as $_index => $_item) {
            $_isAnd .= "$_index='$_item' AND ";
        }
        $_isAnd = substr($_isAnd, 0, -4);
        $_sql = "DELETE FROM $_tables[0] WHERE $_isAnd LIMIT 1";
        return $this->execute($_sql)->rowCount();

    }


    //  查询
    protected function select($_tables, $_field, $_param = array())
    {
        $_limit = $_order = $_where = $_inAnd = '';


        if (Validate::isArray($_param) && !Validate::isNullArray($_param)) {
            $_limit = isset($_param['limit']) ? 'LIMIT ' . $_param['limit'] : '';
            $_order = isset($_param['order']) ? 'ORDER BY ' . $_param['order'] : '';
            if (isset($_param['where'])&& Validate::isArray($_param['where'])) {
                foreach ($_param['where'] as $_index => $_item) {
                    $_isAnd .= "$_index='$_item' AND ";
                }
                $_where = ' WHERE ' . substr($_isAnd, 0, -4);
            }elseif (isset($_param['where'])) {
                $_where = ' WHERE ' . $_param['where'];
            }
        }
        $_selectFields = implode(',', $_field);
        $_table = isset($_tables[1]) ? ($_tables[0] . ',' . $_tables[1]) : $_tables[0];
        $_sql = "SELECT $_selectFields FROM $_table $_where $_order $_limit";
        echo $_sql;
        $_stmt = $this->execute($_sql);
        $_result = array();
        while (!!$_objs = $_stmt->fetchObject()) {
            $_result[] = $_objs;
        }
        return Tool::setHtmlString($_result);
    }


    //  总记录
    protected function total($_tables)
    {
        $_sql = "SELECT COUNT(*) as count FROM $_tables[0]";
        $_stmt = $this->execute($_sql);
        return $_stmt->fetchObject()->count;
    }

    /**
     * @param $_sql
     * 执行并且返回影响行数
     */
    private function execute($_sql)
    {
        $_stmt = $this->_pdo->prepare($_sql);
        $_stmt->execute();
        return $_stmt;

    }


}

