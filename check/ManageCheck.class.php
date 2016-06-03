<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/3
 * Time: 12:57
 */
 


class ManageCheck extends Check
{
    public function check()
    {
        if (self::inNullString($this->_data['user'])) {
            $this->_message = '管理员用户名不得为空';
            $this->_flag = false;

        }
        return $this->_flag;
    }
}