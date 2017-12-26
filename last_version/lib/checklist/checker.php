<?php

namespace Prominado\Bootstrap\Checklist;

use Bitrix\Main\ArgumentException;
use Bitrix\Main\ArgumentNullException;
use Bitrix\Main\Config\Option;
use Bitrix\Main\UserTable;
use Bitrix\Main\IO;
use Bitrix\Main\Application;
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

class Checker
{
    public function checkSiteEmail()
    {
        try {
            $email = Option::get('main', 'email_from');
            if ($email) {
                return [
                    'STATUS'  => true,
                    'MESSAGE' => [
                        'PREVIEW' => Loc::getMessage('PROMINADO_BOOTSTRAP_CHECKER_IS_EMAIL') . $email,
                    ],
                ];
            }
        } catch (ArgumentNullException $exception) {

        }

        return [
            'STATUS'  => false,
            'MESSAGE' => [
                'PREVIEW' => Loc::getMessage('PROMINADO_BOOTSTRAP_CHECKER_NO_EMAIL'),
                'DETAIL'  => Loc::getMessage('PROMINADO_BOOTSTRAP_CHECKER_NO_EMAIL_DESC'),
            ],
        ];
    }

    public function checkAdminsPassword()
    {
        try {
            $users = \CGroup::GetGroupUser(1);
            $res = UserTable::getList(['filter' => ['ID' => $users], 'select' => ['ID', 'LOGIN']])->fetchAll();

            foreach ($res as $user) {
                if ($user['LOGIN'] === 'admin') {
                    return [
                        'STATUS'  => false,
                        'MESSAGE' => [
                            'PREVIEW' => Loc::getMessage('PROMINADO_BOOTSTRAP_CHECKER_IS_ADMIN'),
                            'DETAIL'  => Loc::getMessage('PROMINADO_BOOTSTRAP_CHECKER_ADMIN_RENAME') . ' (' . $user['ID'] . ')',
                        ]
                    ];
                }
            }
        } catch (ArgumentException $exception) {

        }

        return [
            'STATUS'  => true,
            'MESSAGE' => [
                'PREVIEW' => Loc::getMessage('PROMINADO_BOOTSTRAP_CHECKER_NO_ADMIN'),
            ],
        ];
    }

    public function checkDeveloperInfo()
    {
        $dirs = ['bitrix', 'local'];
        $name = '/php_interface/this_site_support.php';
        $find = [];

        foreach ($dirs as $dir) {
            $file = new IO\File(Application::getDocumentRoot() . '/' . $dir . $name);
            if ($file->isExists()) {
                $find[] = '/' . $dir . $name;
            }
        }

        if (is_array($find) && (count($find) > 0)) {
            return [
                'STATUS'  => true,
                'MESSAGE' => [
                    'PREVIEW' => Loc::getMessage('PROMINADO_BOOTSTRAP_CHECKER_DEV_IS') . implode(', ', $find),
                ],
            ];
        }

        return [
            'STATUS'  => false,
            'MESSAGE' => [
                'PREVIEW' => Loc::getMessage('PROMINADO_BOOTSTRAP_CHECKER_DEV_NO'),
                'DETAIL'  => Loc::getMessage('PROMINADO_BOOTSTRAP_CHECKER_DEV_NO_DESC'),
            ],
        ];
    }

    public function checkFavicon()
    {
        $file = new IO\File(Application::getDocumentRoot() . '/favicon.ico');
        if ($file->isExists()) {
            return [
                'STATUS'  => true,
                'MESSAGE' => [
                    'PREVIEW' => Loc::getMessage('PROMINADO_BOOTSTRAP_CHECKER_FAV_IS'),
                ],
            ];
        }

        return [
            'STATUS'  => false,
            'MESSAGE' => [
                'PREVIEW' => Loc::getMessage('PROMINADO_BOOTSTRAP_CHECKER_FAV_NO'),
                'DETAIL'  => Loc::getMessage('PROMINADO_BOOTSTRAP_CHECKER_FAV_NO_DESC'),
            ],
        ];
    }

    public function checkRobots()
    {
        $file = new IO\File(Application::getDocumentRoot() . '/robots.txt');
        if ($file->isExists()) {
            return [
                'STATUS'  => true,
                'MESSAGE' => [
                    'PREVIEW' => Loc::getMessage('PROMINADO_BOOTSTRAP_CHECKER_ROB_IS'),
                ],
            ];
        }

        return [
            'STATUS'  => false,
            'MESSAGE' => [
                'PREVIEW' => Loc::getMessage('PROMINADO_BOOTSTRAP_CHECKER_ROB_NO'),
            ],
        ];
    }

    public function checkNotFound()
    {
        $file = new IO\File(Application::getDocumentRoot() . '/404.php');
        if ($file->isExists()) {
            return [
                'STATUS'  => true,
                'MESSAGE' => [
                    'PREVIEW' => Loc::getMessage('PROMINADO_BOOTSTRAP_CHECKER_404_IS')
                ],
            ];
        }

        return [
            'STATUS'  => false,
            'MESSAGE' => [
                'PREVIEW' => Loc::getMessage('PROMINADO_BOOTSTRAP_CHECKER_404_NO')
            ],
        ];
    }
}