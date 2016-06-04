<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/4
 * Time: 20:11
 */

class NavCheck extends Check
{
    public function addCheck(&$_model, $_requestData)
    {
        if (self::isNullString($_requestData['name'])) {
            $this->_message[] = '导航名称不得为空';
            $this->_flag = false;
        }
        if (self::checkStrLength($_requestData['name'],2,'min')) {
            $this->_message[] = '导航名称不得小于2位';
            $this->_flag = false;
        }
        if (self::checkStrLength($_requestData['name'],4,'max')) {
            $this->_message[] = '导航名称不得大于4位';
            $this->_flag = false;
        }
        if (self::checkStrLength($_requestData['info'],200,'max')) {
            $this->_message[] = '导航简介不得大于200字符';
            $this->_flag = false;
        }
        return $this->_flag;
    }
}
