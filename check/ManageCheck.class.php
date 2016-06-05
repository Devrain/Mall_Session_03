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
    public function addCheck(Model &$_model, Array $_requestData, Array $_param)
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

        if ($_model->isOne($_param)) {
            $this->_message[] = '管理员用户名被占用';
            $this->_flag = false;
        }

        return $this->_flag;
    }

    public function updateCheck(Model &$_model, Array $_requestData)
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


    public function ajax(Model &$_model, Array $_param)
    {
        echo $_model->isOne($_param) ? 1 : 2;
    }

    public function ajaxLogin(Model &$_model, Array $_param)
    {
        echo !$_model->isOne($_param) ? 1 : 2;
    }

    public function ajaxCode(Model &$_model, Array $_code)
    {
        echo !self::checkStrEquals(strtoupper($_SESSION['code']), strtoupper($_code)) ? 1 : 2;
    }

    public function loginCheck(Model &$_model, Array $_requestData,Array $_param)
    {
        if (self::isNullString($_requestData['user'])) {
            $this->_message[] = '管理员姓名不得为空！';
            $this->_flag = false;
        }
        if (self::isNullString($_requestData['pass'])) {
            $this->_message[] = '管理员密码不得为空！';
            $this->_flag = false;
        }
        if (self::isNullString($_requestData['code'])) {
            $this->_message[] = '验证码不得为空！';
            $this->_flag = false;
        }
        if (!self::checkStrEquals(strtoupper($_SESSION['code']), strtoupper($_requestData['code']))) {
            $this->_message[] = '验证码不正确！';
            $this->_flag = false;
        }
        if (!$_model->isOne($_param)) {
            $this->_message[] = '用户名或密码不正确！';
            $this->_flag = false;
        }
        return $this->_flag;
    }

}