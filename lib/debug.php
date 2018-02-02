<?php

namespace Prominado\Bootstrap;

use Bitrix\Main\Web\Json;
use Bitrix\Main\Diag\Debug as BXDebug;

/**
 * Class Debug
 * @link https://github.com/Prominado-ru/span.bootstrap
 * @package Prominado\Bootstrap
 */
class Debug extends BXDebug
{
    /**
     * @param mixed func_get_args() Debug variables
     */
    public static function toConsole()
    {
        $str = '<script>';
        $str .= 'console.warn("<<<<----- PHP debug start -----");';
        foreach (func_get_args() as $arg) {
            $str .= 'console.log(' . print_r(json_encode($arg, JSON_PARTIAL_OUTPUT_ON_ERROR), true) . ');';
        }
        $str .= 'console.warn("----- PHP debug end ----->>>>");';
        $str .= '</script>';

        echo $str;
    }
}