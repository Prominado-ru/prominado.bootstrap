<?php

namespace Prominado\Bootstrap\Checklist;

use \Bitrix\Main\Config\Option;
use \Bitrix\Main\UserTable;
use \Bitrix\Main\IO;
use \Bitrix\Main\Application;
use \Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

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
                    "PREVIEW" => Loc::getMessage("PROMINADO_BOOTSTRAP_CHECKER_IS_EMAIL") . " " .  $email,
                ),
            );
        }
        else
        {
            return array(
                "STATUS" => false,
                "MESSAGE" => array(
                    "PREVIEW" => Loc::getMessage("PROMINADO_BOOTSTRAP_CHECKER_NO_EMAIL"),
                    "DETAIL" => Loc::getMessage("PROMINADO_BOOTSTRAP_CHECKER_NO_EMAIL_DESC"),
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
                        "PREVIEW" => Loc::getMessage("PROMINADO_BOOTSTRAP_CHECKER_IS_ADMIN"),
                        "DETAIL" => Loc::getMessage("PROMINADO_BOOTSTRAP_CHECKER_ADMIN_RENAME") . " (ID=" . $user["ID"] . ")",
                    ),
                );
            }
        }

        return array(
            "STATUS" => true,
            "MESSAGE" => array(
                "PREVIEW" => Loc::getMessage("PROMINADO_BOOTSTRAP_CHECKER_NO_ADMIN"),
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
                    "PREVIEW" => Loc::getMessage("PROMINADO_BOOTSTRAP_CHECKER_DEV_IS") . implode(", ", $find),
                ),
            );
        }
        else
        {
            return array(
                "STATUS" => false,
                "MESSAGE" => array(
                    "PREVIEW" => Loc::getMessage("PROMINADO_BOOTSTRAP_CHECKER_DEV_NO"),
                    "DETAIL" => Loc::getMessage("PROMINADO_BOOTSTRAP_CHECKER_DEV_NO_DESC"),
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
                    "PREVIEW" => Loc::getMessage("PROMINADO_BOOTSTRAP_CHECKER_FAV_IS"),
                ),
            );
        }
        else
        {
            return array(
                "STATUS" => false,
                "MESSAGE" => array(
                    "PREVIEW" => Loc::getMessage("PROMINADO_BOOTSTRAP_CHECKER_FAV_NO"),
                    "DETAIL" => Loc::getMessage("PROMINADO_BOOTSTRAP_CHECKER_FAV_NO_DESC"),
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
                    "PREVIEW" => Loc::getMessage("PROMINADO_BOOTSTRAP_CHECKER_ROB_IS"),
                ),
            );
        }
        else
        {
            return array(
                "STATUS" => false,
                "MESSAGE" => array(
                    "PREVIEW" => Loc::getMessage("PROMINADO_BOOTSTRAP_CHECKER_ROB_NO"),
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
                    "PREVIEW" => Loc::getMessage("PROMINADO_BOOTSTRAP_CHECKER_404_IS")
                ),
            );
        }
        else
        {
            return array(
                "STATUS" => false,
                "MESSAGE" => array(
                    "PREVIEW" => Loc::getMessage("PROMINADO_BOOTSTRAP_CHECKER_404_NO")
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
                    "PREVIEW" => Loc::getMessage("PROMINADO_BOOTSTRAP_CHECKER_HUMANS_IS")
                ),
            );
        }
        else
        {
            return array(
                "STATUS" => false,
                "MESSAGE" => array(
                    "PREVIEW" => Loc::getMessage("PROMINADO_BOOTSTRAP_CHECKER_HUMANS_NO")
                ),
            );
        }
    }
}