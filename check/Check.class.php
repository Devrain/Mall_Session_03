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

    //  表单提交的数据
    protected $_data = array();

    //初始化
    public function __construct()
    {
        $this->_data = $_POST;
    }

    public function getMessage()
    {
        return $this->_message;
    }
}