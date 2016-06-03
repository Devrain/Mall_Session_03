<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/2
 * Time: 20:13
 */
class Validate
{
    //  判斷是否是數組
    static public function isArray($_array)
    {
        return is_array($_array) ? true : false;
    }

    //  判斷數組是否有元素
    static public function isNullArray($_array)
    {
        return count($_array) == 0 ? true : false;

    }

    //  判斷數組是否存在此元素
    static public function inArray($_data, $_array)
    {
        return in_array($_data, $_array) ? true : false;
    }

    //  判断字符串是否为空
    static public function inNullString($_string)
    {
        return empty($_string) ? true : false;
    }

    //  判断字符长度是否合法

    static public function checkStrLength($_string, $_length, $_flag, $_charset = 'utf-8')
    {
        if ($_flag == 'min') {
            if (mb_strlen(trim($_string), $_charset) < $_length) {
                return true;
            }
            return false;
        } elseif ($_flag == 'max') {
            if (mb_strlen(trim($_string), $_charset) > $_length) {
                return true;
            }
            return false;
        } elseif ($_flag == 'equals') {
            if (mb_strlen(trim($_string), $_charset) != $_length) {
                return true;
            }
            return false;
        }
    }

    //  判断数据是否一致
    static public function checkStrEquals($_string, $_otherString)
    {
        if (trim($_string) == trim($_otherString)) {
            return true;
        }
        return false;
    }

}