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


    protected function update($_tables, Array  $_param, Array  $_updateData)
    {
        $_where = $_setDate = '';
        foreach ($_param as $_index => $_item) {
            $_where .= $_item . ' AND ';
        }
        $_where = 'WHERE ' . substr($_where, 0, -4);
        $_setData = '';
        foreach ($_updateData as $_index => $_item) {
            if (Validate::isArray($_item)) {
                $_setData .= "$_index=$_item[0],";
            } else {
                $_setData .= "$_index='$_item',";
            }


        }
        $_setData = substr($_setData, 0, -1);
        $_sql = "UPDATE $_tables[0] SET $_setData  $_where LIMIT 1";
        echo $_sql;
        return $this->execute($_sql)->rowCount();


    }

    //  验证一条数据
    protected function isOne($_tables, Array $_param)
    {
        $_where = '';
        foreach ($_param as $_index => $_item) {
            $_where .= $_item . ' AND ';
        }
        $_where = 'WHEARE ' . substr($_where, 0, -4);
        $_sql = "SELECT id FROM $_tables[0]  $_where LIMIT 1";
        return $this->execute($_sql)->rowCount();


    }


    //  删除
    protected function delete($_tables, Array $_param)
    {
        $_where = '';
        foreach ($_param as $_index => $_item) {
            $_where .= $_item . ' AND ';
        }
        $_where = 'WHERE ' . substr($_where, 0, -4);
        $_sql = "DELETE FROM $_tables[0] WHERE $_where LIMIT 1";
        return $this->execute($_sql)->rowCount();

    }


    //  查询
    protected function select($_tables, Array  $_field, Array $_param = array())
    {
        $_limit = $_order = $_where =  '';


        if (Validate::isArray($_param) && !Validate::isNullArray($_param)) {
            $_limit = isset($_param['limit']) ? 'LIMIT ' . $_param['limit'] : '';
            $_order = isset($_param['order']) ? 'ORDER BY ' . $_param['order'] : '';
            if (isset($_param['where'])) {
                foreach ($_param['where'] as $_index => $_item) {
                    $_where .= $_item . ' AND ';
                }
                $_where = 'WHERE ' . substr($_where, 0, -4);
            } 


        }
        $_selectFields = implode(',', $_field);
        $_table = isset($_tables[1]) ? ($_tables[0] . ',' . $_tables[1]) : $_tables[0];
        $_sql = "SELECT $_selectFields FROM $_table $_where $_order $_limit";
        $_stmt = $this->execute($_sql);
        $_result = array();
        while (!!$_objs = $_stmt->fetchObject()) {
            $_result[] = $_objs;
        }
        return Tool::setHtmlString($_result);
    }


    //  总记录
    protected function total($_tables, $_param = array())
    {
        $_where = '';
        if (isset($_param['where'])) {
            foreach ($_param['where'] as $_index => $_item) {
                $_where .= "$_index='$_item' AND ";
            }
            $_where = 'WHERE ' . substr($_where, 0, -4);
        }
        $_sql = "SELECT COUNT(*) as count FROM $_tables[0] $_where";
        $_stmt = $this->execute($_sql);
        return $_stmt->fetchObject()->count;
    }


    //  得到下一个ID、
    protected function nextId($_tables)
    {
        $_sql = "SHOW TABLE STATUS LIKE '$_tables[0]'";
        $_stmt = $this->execute($_sql);
        return $_stmt->fetchObject()->Auto_increment;
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

