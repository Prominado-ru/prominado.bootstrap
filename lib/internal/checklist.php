<?php

namespace Prominado\Bootstrap\Internal;

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

class CheckList
{
    static public function onCheckListGet()
    {
        $checkList = ['CATEGORIES' => [], 'POINTS' => []];

        $checkList['CATEGORIES']['PROMINADO'] = [
            'NAME' => 'Prominado'
        ];

        $checkList['CATEGORIES']['PROMINADO_GIT'] = [
            'NAME'   => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_GIT'),
            'PARENT' => 'PROMINADO'
        ];

        $checkList['POINTS']['PROMINADO_QC_GIT_ENABLE'] = [
            'PARENT'      => 'PROMINADO_GIT',
            'REQUIRE'     => 'Y',
            'AUTO'        => 'Y',
            'CLASS_NAME'  => '\\Prominado\\Bootstrap\\\Internal\Checklist\\Checker',
            'METHOD_NAME' => 'checkGit',
            'NAME'        => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_GIT_NAME'),
            'DESC'        => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_GIT_DESCRIPTION'),
            'HOWTO'       => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_GIT_HOWTO'),
        ];

        $checkList['POINTS']['PROMINADO_QC_GIT_DISALLOW'] = [
            'PARENT'      => 'PROMINADO_GIT',
            'REQUIRE'     => 'Y',
            'AUTO'        => 'Y',
            'CLASS_NAME'  => '\\Prominado\\Bootstrap\\\Internal\Checklist\\Checker',
            'METHOD_NAME' => 'checkGitDisallow',
            'NAME'        => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_GIT_DISALLOW_NAME'),
            'DESC'        => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_GIT_DISALLOW_DESCRIPTION'),
            'HOWTO'       => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_GIT_DISALLOW_HOWTO'),
        ];

        $checkList['POINTS']['PROMINADO_QC_GIT_IGNORE'] = [
            'PARENT'      => 'PROMINADO_GIT',
            'REQUIRE'     => 'Y',
            'AUTO'        => 'Y',
            'CLASS_NAME'  => '\\Prominado\\Bootstrap\\\Internal\Checklist\\Checker',
            'METHOD_NAME' => 'checkGitignore',
            'NAME'        => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_GIT_IGNORE_NAME'),
            'DESC'        => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_GIT_IGNORE_DESCRIPTION'),
            'HOWTO'       => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_GIT_IGNORE_HOWTO'),
        ];

        $checkList['CATEGORIES']['PROMINADO_ADMIN'] = [
            'NAME'   => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_ADMIN'),
            'PARENT' => 'PROMINADO'
        ];

        $checkList['POINTS']['PROMINADO_QC_SITE_EMAIL'] = [
            'PARENT'      => 'PROMINADO_ADMIN',
            'REQUIRE'     => 'Y',
            'AUTO'        => 'Y',
            'CLASS_NAME'  => '\\Prominado\\Bootstrap\\\Internal\Checklist\\Checker',
            'METHOD_NAME' => 'checkSiteEmail',
            'NAME'        => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_SITE_EMAIL_NAME'),
            'DESC'        => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_SITE_EMAIL_DESCRIPTION'),
            'HOWTO'       => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_SITE_EMAIL_HOWTO'),
        ];

        $checkList['POINTS']['PROMINADO_QC_USER_ADMIN'] = [
            'PARENT'      => 'PROMINADO_ADMIN',
            'REQUIRE'     => 'Y',
            'AUTO'        => 'Y',
            'CLASS_NAME'  => '\\Prominado\\Bootstrap\\\Internal\Checklist\\Checker',
            'METHOD_NAME' => 'checkAdminsPassword',
            'NAME'        => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_USER_ADMIN_NAME'),
            'DESC'        => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_USER_ADMIN_DESCRIPTION'),
            'HOWTO'       => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_USER_ADMIN_HOWTO'),
        ];

        $checkList['POINTS']['PROMINADO_QC_DEVELOPER'] = [
            'PARENT'      => 'PROMINADO_ADMIN',
            'REQUIRE'     => 'Y',
            'AUTO'        => 'Y',
            'CLASS_NAME'  => '\\Prominado\\Bootstrap\\\Internal\Checklist\\Checker',
            'METHOD_NAME' => 'checkDeveloperInfo',
            'NAME'        => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_DEVELOPER_NAME'),
            'DESC'        => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_DEVELOPER_DESCRIPTION'),
            'HOWTO'       => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_DEVELOPER_HOWTO'),
        ];

        $checkList['CATEGORIES']['PROMINADO_FINAL'] = [
            'NAME'   => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_FINAL'),
            'PARENT' => 'PROMINADO'
        ];

        $checkList['POINTS']['PROMINADO_QC_FAVICON'] = [
            'PARENT'      => 'PROMINADO_FINAL',
            'REQUIRE'     => 'Y',
            'AUTO'        => 'Y',
            'CLASS_NAME'  => '\\Prominado\\Bootstrap\\\Internal\Checklist\\Checker',
            'METHOD_NAME' => 'checkFavicon',
            'NAME'        => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_FAVICON_NAME'),
            'DESC'        => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_FAVICON_DESCRIPTION'),
            'HOWTO'       => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_FAVICON_HOWTO'),
        ];

        $checkList['POINTS']['PROMINADO_QC_ROBOTS_TXT'] = [
            'PARENT'      => 'PROMINADO_FINAL',
            'REQUIRE'     => 'Y',
            'AUTO'        => 'Y',
            'CLASS_NAME'  => '\\Prominado\\Bootstrap\\\Internal\Checklist\\Checker',
            'METHOD_NAME' => 'checkRobots',
            'NAME'        => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_ROBOTS_TXT_NAME'),
            'DESC'        => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_ROBOTS_TXT_DESCRIPTION'),
            'HOWTO'       => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_ROBOTS_TXT_HOWTO'),
        ];

        $checkList['POINTS']['PROMINADO_QC_404'] = [
            'PARENT'      => 'PROMINADO_FINAL',
            'REQUIRE'     => 'Y',
            'AUTO'        => 'Y',
            'CLASS_NAME'  => '\Prominado\\Bootstrap\\Checklist\\Checker',
            'METHOD_NAME' => 'checkNotFound',
            'NAME'        => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_404_NAME'),
            'DESC'        => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_404_DESCRIPTION'),
            'HOWTO'       => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_404_HOWTO'),
        ];

        return $checkList;
    }
}