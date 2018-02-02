<?php

namespace Prominado\Bootstrap\Internal\Checklist;

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
    public function checkGit()
    {
        $dir = new IO\Directory(Application::getDocumentRoot() . '/.git/');
        if ($dir->isExists()) {
            return [
                'STATUS'  => true,
                'MESSAGE' => [
                    'PREVIEW' => Loc::getMessage('PROMINADO_BOOTSTRAP_CHECKER_GIT_IS')
                ],
            ];
        }

        return [
            'STATUS'  => false,
            'MESSAGE' => [
                'PREVIEW' => Loc::getMessage('PROMINADO_BOOTSTRAP_CHECKER_GIT_NO')
            ],
        ];
    }

    public function checkGitDisallow()
    {
        $file = new IO\File(Application::getDocumentRoot() . '/.git/.htaccess');
        if ($file->isExists()) {
            try {
                $content = explode(PHP_EOL, $file->getContents());
                foreach ($content as $row) {
                    if (mb_strtolower($row) === 'deny from all') {
                        return [
                            'STATUS'  => true,
                            'MESSAGE' => [
                                'PREVIEW' => Loc::getMessage('PROMINADO_BOOTSTRAP_CHECKER_GIT_DISALLOW_YES'),
                            ],
                        ];
                    }
                }
            } catch (IO\FileNotFoundException $exception) {

            }
        }

        return [
            'STATUS'  => false,
            'MESSAGE' => [
                'PREVIEW' => Loc::getMessage('PROMINADO_BOOTSTRAP_CHECKER_GIT_DISALLOW_NO')
            ],
        ];
    }

    public function checkGitignore()
    {
        $file = new IO\File(Application::getDocumentRoot() . '/.gitignore');
        if ($file->isExists()) {
            return [
                'STATUS'  => true,
                'MESSAGE' => [
                    'PREVIEW' => Loc::getMessage('PROMINADO_BOOTSTRAP_CHECKER_GIT_IGNORE_YES'),
                ],
            ];
        }

        return [
            'STATUS'  => false,
            'MESSAGE' => [
                'PREVIEW' => Loc::getMessage('PROMINADO_BOOTSTRAP_CHECKER_GIT_IGNORE_NO')
            ],
        ];
    }

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
            try {
                $content = explode(PHP_EOL, $file->getContents());
                foreach ($content as $row) {
                    $data = array_map('trim', explode(':', $row));

                    if ((mb_strtolower($data[0]) === 'disallow') && ($data[1] === '/')) {
                        return [
                            'STATUS'  => false,
                            'MESSAGE' => [
                                'PREVIEW' => Loc::getMessage('PROMINADO_BOOTSTRAP_CHECKER_ROB_DISALLOW'),
                            ],
                        ];
                    }
                }

                return [
                    'STATUS'  => true,
                    'MESSAGE' => [
                        'PREVIEW' => Loc::getMessage('PROMINADO_BOOTSTRAP_CHECKER_ROB_IS'),
                    ],
                ];
            } catch (IO\FileNotFoundException $exception) {

            }
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