<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/2
 * Time: 15:10
 */


class UserModel extends Model
{
    public function __construct()
    {
        parent::__construct();
        var_dump($this->_db);
    }
}