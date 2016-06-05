<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/3
 * Time: 12:52
 */
// 验证基类
class Check extends Validate
{
    //  判断验证是否通过
    protected $_flag = true;

//  错误消息集
    protected $_message = array();



    public function getMessage()
    {
        return $this->_message;
    }

    public function oneCheck(Model &$_model, Array $_param)
    {
        if (!$_model->isOne($_param)) {
            $this->_message[] = '找不到指定的数据';
            $this->_flag = false;
        }
        return $this->_flag;
    }
}