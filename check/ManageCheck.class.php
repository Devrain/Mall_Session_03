<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/3
 * Time: 12:57
 */
class ManageCheck extends Check
{
    //  用户名不得包含制定非法词组 敏感词
    //  密码不能纯数字 纯字母  
    public function check(&$_model)
    {
        if (self::isNullString($this->_data['user'])) {
            $this->_message[] = '管理员用户名不得为空';
            $this->_flag = false;
        }
        if (self::checkStrLength($this->_data['user'], 2, 'min')) {
            $this->_message[] = '管理员用户名不得小于2位！';
            $this->_flag = false;
        }

        if (self::checkStrLength($this->_data['user'], 20, 'max')) {
            $this->_message[] = '管理员用户名不得大于20位！';
            $this->_flag = false;
        }

        if (self::checkStrLength($this->_data['pass'], 6, 'min')) {
            $this->_message[] = '管理员密码不得小于6位';
            $this->_flag = false;
        }

        if (!self::checkStrEquals($this->_data['pass'], $this->_data['notpass'])) {
            $this->_message[] = '管理员两次输入密码不一致！';
            $this->_flag = false;
        }

        if (self::isNullString($this->_data['level'])) {
            $this->_message[] = '管理员等级权限为指定';
            $this->_flag = false;
        }

        if ($_model->isOne(array('user' => $this->_data['user']))) {
            $this->_message[] = '管理员用户名被占用';
            $this->_flag = false;
        }

        return $this->_flag;
    }


    public function ajax(&$_model)
    {
        echo $_model->isOne(array('user' => $_POST['user'])) ? 1 : 2;
    }
}