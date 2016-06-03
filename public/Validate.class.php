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
}