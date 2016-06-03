<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/2
 * Time: 20:17
 */
//  工具類  封裝函數和算法


class Tool
{
    //  獲取客戶端ip
    static public function getIP()
    {
        return $_SERVER["REMOTE_ADDR"];
    }

    //  獲取目前時間
    static public function getDate()
    {
        date_default_timezone_set("Asia/Shanghai");
        return date("Y-m-d H:i:s");
    }

    //  表单定义字符转义
    static public function setFormString($_string)
    {
        if (!get_magic_quotes_gpc()) {
            if (Validate::isArray($_string)) {
                foreach ($_string as $_index => $_item) {
                    $_string[$_index] = self::setFormString($_item);
                }

            } else {
                //  不支持get_magic_quotes_gpc就用addslashes
                return addslashes($_string);

            }
        }
        return $_string;

    }

}

