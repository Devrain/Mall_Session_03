<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/2
 * Time: 15:04
 */

//  model 基類
class Model extends DB
{
    protected $_db;

    public function __construct()
    {
//        $this->_db = parent::getInstance();
        var_dump($this->_db);
    }
}