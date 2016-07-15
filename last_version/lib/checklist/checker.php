<?php

namespace Prominado\Bootstrap\Checklist;

use \Bitrix\Main\Config\Option;
use \Bitrix\Main\UserTable;
use \Bitrix\Main\IO;
use \Bitrix\Main\Application;

// TODO: В ланг файлы
class Checker
{
    function checkSiteEmail()
    {
        $email = Option::get("main", "email_from");
        if ($email)
        {
            return array(
                "STATUS" => true,
                "MESSAGE" => array(
                    "PREVIEW" => "В настройках главного модуля указана электронная почта " . $email,
                ),
            );
        }
        else
        {
            return array(
                "STATUS" => false,
                "MESSAGE" => array(
                    "PREVIEW" => "Электронная почта не указана",
                    "DETAIL" => "Адрес электронной почты в настройках главного модуля не указан",
                ),
            );
        }
    }

    function checkAdminsPassword()
    {
        $users = \CGroup::GetGroupUser(1);
        $res = UserTable::getList(Array("filter" => Array("ID" => $users), "select" => Array("ID", "LOGIN")))->fetchAll();

        foreach($res as $user)
        {
            if($user["LOGIN"] == "admin")
            {
                return array(
                    "STATUS" => false,
                    "MESSAGE" => array(
                        "PREVIEW" => "Найден администратор с логином \"admin\"",
                        "DETAIL" => "Переименуйте пользователя \"admin\" (ID=" . $user["ID"] . ")",
                    ),
                );
            }
        }

        return array(
            "STATUS" => true,
            "MESSAGE" => array(
                "PREVIEW" => "Отлично! Администратора с логином \"admin\" не найдено",
            ),
        );
    }

    function checkDeveloperInfo()
    {
        $dirs = Array("bitrix", "local");
        $name = "/php_interface/this_site_support.php";
        $find = [];

        foreach($dirs as $dir)
        {
            $file = new IO\File(Application::getDocumentRoot() . "/" . $dir . $name);
            if($file->isExists())
            {
                $find[] = "/" . $dir . $name;
            }
        }

        if(is_array($find) && (count($find) > 0))
        {
            return array(
                "STATUS" => true,
                "MESSAGE" => array(
                    "PREVIEW" => "Информация о разработчике указана в " . implode(", ", $find),
                ),
            );
        }
        else
        {
            return array(
                "STATUS" => false,
                "MESSAGE" => array(
                    "PREVIEW" => "Информация о разработчике не указана",
                    "DETAIL" => "Файл this_site_support.php отсутствует в папках /bitrix/php_interface/ и /local/php_interface/",
                ),
            );
        }
    }

    function checkFavicon()
    {
        $file = new IO\File(Application::getDocumentRoot() . "/favicon.ico");
        if($file->isExists())
        {
            return array(
                "STATUS" => true,
                "MESSAGE" => array(
                    "PREVIEW" => "Favicon найдена",
                ),
            );
        }
        else
        {
            return array(
                "STATUS" => false,
                "MESSAGE" => array(
                    "PREVIEW" => "Favicon не найдена",
                    "DETAIL" => "Favicon не найдена в корне сайта",
                ),
            );
        }
    }

    function checkRobots()
    {
        $file = new IO\File(Application::getDocumentRoot() . "/robots.txt");
        if($file->isExists())
        {
            return array(
                "STATUS" => true,
                "MESSAGE" => array(
                    "PREVIEW" => "robots.txt создан",
                ),
            );
        }
        else
        {
            return array(
                "STATUS" => false,
                "MESSAGE" => array(
                    "PREVIEW" => "robots.txt отсутсвует",
                ),
            );
        }
    }

    function checkNotFound()
    {
        $file = new IO\File(Application::getDocumentRoot() . "/404.php");
        if($file->isExists())
        {
            return array(
                "STATUS" => true,
                "MESSAGE" => array(
                    "PREVIEW" => "Старница 404 ошибки создана"
                ),
            );
        }
        else
        {
            return array(
                "STATUS" => false,
                "MESSAGE" => array(
                    "PREVIEW" => "Страница 404 ошибки не найдена"
                ),
            );
        }
    }

    function checkHumans()
    {
        $file = new IO\File(Application::getDocumentRoot() . "/humans.txt");
        if($file->isExists())
        {
            return array(
                "STATUS" => true,
                "MESSAGE" => array(
                    "PREVIEW" => "humans.txt создан"
                ),
            );
        }
        else
        {
            return array(
                "STATUS" => false,
                "MESSAGE" => array(
                    "PREVIEW" => "humans.txt не найден"
                ),
            );
        }
    }
}