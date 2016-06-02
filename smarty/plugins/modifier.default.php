<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty admin modifier plugin
 *
 * Type:     modifier<br>
 * Name:     admin<br>
 * Purpose:  designate admin value for empty variables
 * @link http://smarty.php.net/manual/en/language.modifier.default.php
 *          admin (Smarty online manual)
 * @author   Monte Ohrt <monte at ohrt dot com>
 * @param string
 * @param string
 * @return string
 */
function smarty_modifier_default($string, $default = '')
{
    if (!isset($string) || $string === '')
        return $default;
    else
        return $string;
}

/* vim: set expandtab: */

?>
