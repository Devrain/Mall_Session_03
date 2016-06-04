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
    public function addCheck(&$_model, $_requestData)
    {
        if (self::isNullString($_requestData['user'])) {
            $this->_message[] = '管理员用户名不得为空';
            $this->_flag = false;
        }
        if (self::checkStrLength($_requestData['user'], 2, 'min')) {
            $this->_message[] = '管理员用户名不得小于2位！';
            $this->_flag = false;
        }

        if (self::checkStrLength($_requestData['user'], 20, 'max')) {
            $this->_message[] = '管理员用户名不得大于20位！';
            $this->_flag = false;
        }

        if (self::checkStrLength($_requestData['pass'], 6, 'min')) {
            $this->_message[] = '管理员密码不得小于6位';
            $this->_flag = false;
        }

        if (!self::checkStrEquals($_requestData['pass'], $_requestData['notpass'])) {
            $this->_message[] = '管理员两次输入密码不一致！';
            $this->_flag = false;
        }

        if (self::isNullString($_requestData['level'])) {
            $this->_message[] = '管理员等级权限为指定';
            $this->_flag = false;
        }

        if ($_model->isOne(array('user' => $_requestData['user']))) {
            $this->_message[] = '管理员用户名被占用';
            $this->_flag = false;
        }

        return $this->_flag;
    }

    public function updateCheck(&$_model, $_requestData)
    {
        if (self::checkStrLength($_requestData['pass'], 6, 'min')) {
            $this->_message[] = '管理员密码不得小于6位';
            $this->_flag = false;
        }
        if (!self::checkStrEquals($_requestData['pass'], $_requestData['notpass'])) {
            $this->_message[] = '管理员密码和确认密码不一致';
            $this->_flag = false;
        }
        if (self::isNullString($_requestData['level'])) {
            $this->_message[] = '管理员等级权限必须选择！';
            $this->_flag = false;
        }
        return $this->_flag;
    }


    //  删除管理员的检查
    public function deleteCheck(&$_model, $_requestData)
    {
        if (!$_model->isOne($_requestData)) {
            $this->_message[] = '找不到要删除的管理员';
            $this->_flag = false;
        }
        return $this->_flag;
    }

    public function oneCheck(&$_model, $_requestData)
    {
        if (!$_model->isOne($_requestData)) {
            $this->_message[] = '找不到要修改的管理员';
            $this->_flag = false;
        }
        return $this->_flag;
    }

    public function ajax(&$_model)
    {
        echo $_model->isOne(array('user' => $_POST['user'])) ? 1 : 2;
    }
}