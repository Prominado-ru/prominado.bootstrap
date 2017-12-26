<?php

namespace Prominado\Bootstrap;

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Application;
use Bitrix\Main\Web\HttpClient;

Loc::loadMessages(__FILE__);


/**
 * Class Functions
 * @link https://github.com/Prominado-ru/span.bootstrap
 * @package Prominado\Bootstrap
 */
class Helper
{

    /**
     * @param int $size
     * @return string
     */
    public static function getFileSize($size)
    {
        $langArray = [Loc::getMessage('PROMINADO_BOOTSTRAP_FUNC_KB'), Loc::getMessage('PROMINADO_BOOTSTRAP_FUNC_MB')];
        $code = 0;
        $s = ($size / 1024);
        if ($s >= 1024) {
            $s /= 1024;
            $code = 1;
        }

        return number_format($s, 2, ', ', ' ') . '&nbsp;' . $langArray[$code];
    }

    /**
     * @param string $url
     * @return array
     */
    public static function getYoutube($url)
    {
        $result = [];
        if (preg_match('/watch\?v=([^&]*)/ui', $url, $matches)) {
            $result['link'] = '//www.youtube.com/embed/' . $matches[1] . '?wmode=opaque';
            $result['code'] = $matches[1];
            $result['img'] = 'http://img.youtube.com/vi/' . $matches[1] . '/maxresdefault.jpg';
        }

        return $result;
    }

    /**
     * @param int $n
     * @param array $forms
     * @return string
     */
    public static function declension($n, $forms)
    {
        return $n % 10 === 1 && $n % 100 !== 11 ? $forms[0] : ($n % 10 >= 2 && $n % 10 <= 4 && ($n % 100 < 10 || $n % 100 >= 20) ? $forms[1] : $forms[2]);
    }

    /**
     * @return bool
     */
    public static function isAjax()
    {
        $server = Application::getInstance()->getContext()->getServer()->toArray();

        return (isset($server['HTTP_X_REQUESTED_WITH']) && ($server['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest'));
    }

    /**
     * @param string $ip
     * @return \SimpleXMLElement[]
     */
    public static function getIPInfo($ip = '')
    {
        $server = Application::getInstance()->getContext()->getServer()->toArray();
        if (!$ip) {
            $ip = $server['REMOTE_ADDR'];
        }

        $http = new HttpClient();
        $http->setTimeout(3);
        $xml = $http->get('http://ipgeobase.ru:7020/geo?ip=' . $ip);
        $xml = simplexml_load_string($xml);

        return $xml->ip;
    }

    /**
     * @param string $address
     * @return array
     */
    public static function getCoordsByAddress($address)
    {
        $params = [
            'geocode' => $address,
            'format'  => 'json',
        ];

        $http = new HttpClient();
        $data = json_decode($http->get('http://geocode-maps.yandex.ru/1.x/?' . http_build_query($params, '', '&')));

        return explode(' ', $data->response->GeoObjectCollection->featureMember[0]->GeoObject->Point->pos);
    }
}