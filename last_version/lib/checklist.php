<?php

namespace Prominado\Bootstrap;

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
        $checkList['CATEGORIES']['PROMINADO_CONTENT'] = [
            'NAME'   => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_CONTENT'),
            'PARENT' => 'PROMINADO'
        ];
        $checkList['POINTS']['PROMINADO_QC_DEV_SERVER'] = [
            'PARENT'  => 'PROMINADO_CONTENT',
            'REQUIRE' => 'Y',
            'AUTO'    => 'N',
            'NAME'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_DEV_NAME'),
            'DESC'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_DEV_DESCRIPTION'),
            'HOWTO'   => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_DEV_HOWTO'),
        ];
        $checkList['POINTS']['PROMINADO_QC_TEST_CONTENT'] = [
            'PARENT'  => 'PROMINADO_CONTENT',
            'REQUIRE' => 'Y',
            'AUTO'    => 'N',
            'NAME'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_TEST_NAME'),
            'DESC'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_TEST_DESCRIPTION'),
            'HOWTO'   => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_TEST_HOWTO'),
        ];
        $checkList['POINTS']['PROMINADO_QC_PRINT'] = [
            'PARENT'  => 'PROMINADO_CONTENT',
            'REQUIRE' => 'N',
            'AUTO'    => 'N',
            'NAME'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_PRINT_NAME'),
            'DESC'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_PRINT_DESCRIPTION'),
            'HOWTO'   => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_PRINT_HOWTO'),
        ];
        $checkList['CATEGORIES']['PROMINADO_VALID'] = [
            'NAME'   => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_VALID'),
            'PARENT' => 'PROMINADO'
        ];
        $checkList['POINTS']['PROMINADO_QC_HTML'] = [
            'PARENT'  => 'PROMINADO_VALID',
            'REQUIRE' => 'Y',
            'AUTO'    => 'N',
            'NAME'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_HTML_NAME'),
            'DESC'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_HTML_DESCRIPTION'),
            'HOWTO'   => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_HTML_HOWTO'),
        ];
        $checkList['POINTS']['PROMINADO_QC_CSS'] = [
            'PARENT'  => 'PROMINADO_VALID',
            'REQUIRE' => 'Y',
            'AUTO'    => 'N',
            'NAME'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_CSS_NAME'),
            'DESC'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_CSS_DESCRIPTION'),
            'HOWTO'   => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_CSS_HOWTO'),
        ];
        $checkList['POINTS']['PROMINADO_QC_JS'] = [
            'PARENT'  => 'PROMINADO_VALID',
            'REQUIRE' => 'Y',
            'AUTO'    => 'N',
            'NAME'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_JS_NAME'),
            'DESC'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_JS_DESCRIPTION'),
            'HOWTO'   => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_JS_HOWTO'),
        ];
        $checkList['CATEGORIES']['PROMINADO_TEST'] = [
            'NAME'   => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_TEST'),
            'PARENT' => 'PROMINADO'
        ];
        $checkList['POINTS']['PROMINADO_QC_FORMS'] = [
            'PARENT'  => 'PROMINADO_TEST',
            'REQUIRE' => 'N',
            'AUTO'    => 'N',
            'NAME'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_FORMS_NAME'),
            'DESC'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_FORMS_DESCRIPTION'),
            'HOWTO'   => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_FORMS_HOWTO'),
        ];
        $checkList['POINTS']['PROMINADO_QC_IS_ADMIN'] = [
            'PARENT'  => 'PROMINADO_TEST',
            'REQUIRE' => 'Y',
            'AUTO'    => 'N',
            'NAME'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_ADMIN_NAME'),
            'DESC'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_ADMIN_DESCRIPTION'),
            'HOWTO'   => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_ADMIN_HOWTO'),
        ];
        $checkList['POINTS']['PROMINADO_QC_REGISTER'] = [
            'PARENT'  => 'PROMINADO_TEST',
            'REQUIRE' => 'N',
            'AUTO'    => 'N',
            'NAME'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_REGISTER_NAME'),
            'DESC'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_REGISTER_DESCRIPTION'),
            'HOWTO'   => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_REGISTER_HOWTO'),
        ];
        $checkList['POINTS']['PROMINADO_QC_RECOVERY'] = [
            'PARENT'  => 'PROMINADO_TEST',
            'REQUIRE' => 'N',
            'AUTO'    => 'N',
            'NAME'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_RECOVERY_NAME'),
            'DESC'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_RECOVERY_DESCRIPTION'),
            'HOWTO'   => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_RECOVERY_HOWTO'),
        ];
        $checkList['POINTS']['PROMINADO_QC_BROWSER'] = [
            'PARENT'  => 'PROMINADO_TEST',
            'REQUIRE' => 'Y',
            'AUTO'    => 'N',
            'NAME'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_BROWSER_NAME'),
            'DESC'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_BROWSER_DESCRIPTION'),
            'HOWTO'   => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_BROWSER_HOWTO'),
        ];
        $checkList['POINTS']['PROMINADO_QC_MAIL'] = [
            'PARENT'  => 'PROMINADO_TEST',
            'REQUIRE' => 'N',
            'AUTO'    => 'N',
            'NAME'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_MAIL_NAME'),
            'DESC'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_MAIL_DESCRIPTION'),
            'HOWTO'   => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_MAIL_HOWTO'),
        ];
        $checkList['POINTS']['PROMINADO_QC_DISABLED_JS'] = [
            'PARENT'  => 'PROMINADO_TEST',
            'REQUIRE' => 'N',
            'AUTO'    => 'N',
            'NAME'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_DISABLED_JS_NAME'),
            'DESC'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_DISABLED_JS_DESCRIPTION'),
            'HOWTO'   => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_DISABLED_JS_HOWTO'),
        ];
        $checkList['POINTS']['PROMINADO_QC_CHPU'] = [
            'PARENT'  => 'PROMINADO_TEST',
            'REQUIRE' => 'N',
            'AUTO'    => 'N',
            'NAME'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_CHPU_NAME'),
            'DESC'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_CHPU_DESCRIPTION'),
            'HOWTO'   => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_CHPU_HOWTO'),
        ];
        $checkList['POINTS']['PROMINADO_QC_SCHEMA'] = [
            'PARENT'  => 'PROMINADO_TEST',
            'REQUIRE' => 'N',
            'AUTO'    => 'N',
            'NAME'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_SCHEMA_NAME'),
            'DESC'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_SCHEMA_DESCRIPTION'),
            'HOWTO'   => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_SCHEMA_HOWTO'),
        ];
        $checkList['POINTS']['PROMINADO_QC_BROKEN_LINKS'] = [
            'PARENT'  => 'PROMINADO_TEST',
            'REQUIRE' => 'Y',
            'AUTO'    => 'N',
            'NAME'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_BROKEN_LINKS_NAME'),
            'DESC'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_BROKEN_LINKS_DESCRIPTION'),
            'HOWTO'   => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_BROKEN_LINKS_HOWTO'),
        ];
        $checkList['CATEGORIES']['PROMINADO_ADMIN'] = [
            'NAME'   => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_ADMIN'),
            'PARENT' => 'PROMINADO'
        ];
        $checkList['POINTS']['PROMINADO_QC_TEMPLATE_NAME'] = [
            'PARENT'  => 'PROMINADO_ADMIN',
            'REQUIRE' => 'Y',
            'AUTO'    => 'N',
            'NAME'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_TEMPLATE_NAME_NAME'),
            'DESC'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_TEMPLATE_NAME_DESCRIPTION'),
            'HOWTO'   => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_TEMPLATE_NAME_HOWTO'),
        ];
        $checkList['POINTS']['PROMINADO_QC_SITE_NAME'] = [
            'PARENT'  => 'PROMINADO_ADMIN',
            'REQUIRE' => 'Y',
            'AUTO'    => 'N',
            'NAME'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_SITE_NAME_NAME'),
            'DESC'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_SITE_NAME_DESCRIPTION'),
            'HOWTO'   => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_SITE_NAME_HOWTO'),
        ];
        $checkList['POINTS']['PROMINADO_QC_SITE_EMAIL'] = [
            'PARENT'      => 'PROMINADO_ADMIN',
            'REQUIRE'     => 'Y',
            'AUTO'        => 'Y',
            'CLASS_NAME'  => '\\Prominado\\Bootstrap\\Checklist\\Checker',
            'METHOD_NAME' => 'checkSiteEmail',
            'NAME'        => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_SITE_EMAIL_NAME'),
            'DESC'        => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_SITE_EMAIL_DESCRIPTION'),
            'HOWTO'       => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_SITE_EMAIL_HOWTO'),
        ];
        $checkList['POINTS']['PROMINADO_QC_USER_ADMIN'] = [
            'PARENT'      => 'PROMINADO_ADMIN',
            'REQUIRE'     => 'Y',
            'AUTO'        => 'Y',
            'CLASS_NAME'  => '\\Prominado\\Bootstrap\\Checklist\\Checker',
            'METHOD_NAME' => 'checkAdminsPassword',
            'NAME'        => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_USER_ADMIN_NAME'),
            'DESC'        => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_USER_ADMIN_DESCRIPTION'),
            'HOWTO'       => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_USER_ADMIN_HOWTO'),
        ];
        $checkList['POINTS']['PROMINADO_QC_IBLOCKS'] = [
            'PARENT'  => 'PROMINADO_ADMIN',
            'REQUIRE' => 'Y',
            'AUTO'    => 'N',
            'NAME'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_IBLOCKS_NAME'),
            'DESC'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_IBLOCKS_DESCRIPTION'),
            'HOWTO'   => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_IBLOCKS_HOWTO'),
        ];
        $checkList['POINTS']['PROMINADO_QC_IBLOCKS_PATH'] = [
            'PARENT'  => 'PROMINADO_ADMIN',
            'REQUIRE' => 'Y',
            'AUTO'    => 'N',
            'NAME'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_IBLOCKS_PATH_NAME'),
            'DESC'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_IBLOCKS_PATH_DESCRIPTION'),
            'HOWTO'   => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_IBLOCKS_PATH_HOWTO'),
        ];
        $checkList['POINTS']['PROMINADO_QC_INDEX'] = [
            'PARENT'  => 'PROMINADO_ADMIN',
            'REQUIRE' => 'Y',
            'AUTO'    => 'N',
            'NAME'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_INDEX_NAME'),
            'DESC'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_INDEX_DESCRIPTION'),
            'HOWTO'   => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_INDEX_HOWTO'),
        ];
        $checkList['POINTS']['PROMINADO_QC_SEARCH_EXCEPTION'] = [
            'PARENT'  => 'PROMINADO_ADMIN',
            'REQUIRE' => 'Y',
            'AUTO'    => 'N',
            'NAME'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_SEARCH_EXCEPTION_NAME'),
            'DESC'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_SEARCH_EXCEPTION_DESCRIPTION'),
            'HOWTO'   => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_SEARCH_EXCEPTION_HOWTO'),
        ];
        $checkList['POINTS']['PROMINADO_QC_SITEMAP'] = [
            'PARENT'  => 'PROMINADO_ADMIN',
            'REQUIRE' => 'Y',
            'AUTO'    => 'N',
            'NAME'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_SITEMAP_NAME'),
            'DESC'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_SITEMAP_DESCRIPTION'),
            'HOWTO'   => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_SITEMAP_HOWTO'),
        ];
        $checkList['POINTS']['PROMINADO_QC_DEVELOPER'] = [
            'PARENT'      => 'PROMINADO_ADMIN',
            'REQUIRE'     => 'Y',
            'AUTO'        => 'Y',
            'CLASS_NAME'  => '\\Prominado\\Bootstrap\\Checklist\\Checker',
            'METHOD_NAME' => 'checkDeveloperInfo',
            'NAME'        => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_DEVELOPER_NAME'),
            'DESC'        => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_DEVELOPER_DESCRIPTION'),
            'HOWTO'       => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_DEVELOPER_HOWTO'),
        ];
        $checkList['CATEGORIES']['PROMINADO_SECURITY'] = [
            'NAME'   => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_SECURITY'),
            'PARENT' => 'PROMINADO'
        ];
        $checkList['POINTS']['PROMINADO_QC_ACCESS'] = [
            'PARENT'  => 'PROMINADO_SECURITY',
            'REQUIRE' => 'Y',
            'AUTO'    => 'N',
            'NAME'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_ACCESS_NAME'),
            'DESC'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_ACCESS_DESCRIPTION'),
            'HOWTO'   => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_ACCESS_HOWTO'),
        ];

        $checkList['POINTS']['PROMINADO_QC_DISK_QUOTA'] = [
            'PARENT'  => 'PROMINADO_SECURITY',
            'REQUIRE' => 'Y',
            'AUTO'    => 'N',
            'NAME'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_DISK_QUOTA_NAME'),
            'DESC'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_DISK_QUOTA_DESCRIPTION'),
            'HOWTO'   => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_DISK_QUOTA_HOWTO'),
        ];
        $checkList['POINTS']['PROMINADO_QC_CRON'] = [
            'PARENT'  => 'PROMINADO_SECURITY',
            'REQUIRE' => 'N',
            'AUTO'    => 'N',
            'NAME'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_CRON_NAME'),
            'DESC'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_CRON_DESCRIPTION'),
            'HOWTO'   => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_CRON_HOWTO'),
        ];
        $checkList['POINTS']['PROMINADO_QC_CRASH'] = [
            'PARENT'  => 'PROMINADO_SECURITY',
            'REQUIRE' => 'N',
            'AUTO'    => 'N',
            'NAME'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_CRASH_NAME'),
            'DESC'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_CRASH_DESCRIPTION'),
            'HOWTO'   => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_CRASH_HOWTO'),
        ];
        $checkList['CATEGORIES']['PROMINADO_PERFORMANCE'] = [
            'NAME'   => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_PERFORMANCE'),
            'PARENT' => 'PROMINADO'
        ];
        $checkList['POINTS']['PROMINADO_QC_PICTURES'] = [
            'PARENT'  => 'PROMINADO_PERFORMANCE',
            'REQUIRE' => 'N',
            'AUTO'    => 'N',
            'NAME'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_PICTURES_NAME'),
            'DESC'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_PICTURES_DESCRIPTION'),
            'HOWTO'   => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_PICTURES_HOWTO'),
        ];
        $checkList['POINTS']['PROMINADO_QC_CACHE'] = [
            'PARENT'  => 'PROMINADO_PERFORMANCE',
            'REQUIRE' => 'Y',
            'AUTO'    => 'N',
            'NAME'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_CACHE_NAME'),
            'DESC'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_CACHE_DESCRIPTION'),
            'HOWTO'   => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_CACHE_HOWTO'),
        ];
        $checkList['POINTS']['PROMINADO_QC_SITE_SPEED'] = [
            'PARENT'  => 'PROMINADO_PERFORMANCE',
            'REQUIRE' => 'N',
            'AUTO'    => 'N',
            'NAME'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_SITE_SPEED_NAME'),
            'DESC'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_SITE_SPEED_DESCRIPTION'),
            'HOWTO'   => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_SITE_SPEED_HOWTO'),
        ];
        $checkList['CATEGORIES']['PROMINADO_FINAL'] = [
            'NAME'   => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_FINAL'),
            'PARENT' => 'PROMINADO'
        ];
        $checkList['POINTS']['PROMINADO_QC_FAVICON'] = [
            'PARENT'      => 'PROMINADO_FINAL',
            'REQUIRE'     => 'Y',
            'AUTO'        => 'Y',
            'CLASS_NAME'  => '\\Prominado\\Bootstrap\\Checklist\\Checker',
            'METHOD_NAME' => 'checkFavicon',
            'NAME'        => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_FAVICON_NAME'),
            'DESC'        => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_FAVICON_DESCRIPTION'),
            'HOWTO'       => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_FAVICON_HOWTO'),
        ];
        $checkList['POINTS']['PROMINADO_QC_ROBOTS_TXT'] = [
            'PARENT'      => 'PROMINADO_FINAL',
            'REQUIRE'     => 'Y',
            'AUTO'        => 'Y',
            'CLASS_NAME'  => '\\Prominado\\Bootstrap\\Checklist\\Checker',
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

        $checkList['POINTS']['PROMINADO_QC_SOCIAL_SHARE'] = [
            'PARENT'  => 'PROMINADO_FINAL',
            'REQUIRE' => 'N',
            'AUTO'    => 'N',
            'NAME'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_SOCIAL_SHARE_NAME'),
            'DESC'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_SOCIAL_SHARE_DESCRIPTION'),
            'HOWTO'   => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_SOCIAL_SHARE_HOWTO'),
        ];
        $checkList['POINTS']['PROMINADO_QC_MOBILE_ICONS'] = [
            'PARENT'  => 'PROMINADO_FINAL',
            'REQUIRE' => 'N',
            'AUTO'    => 'N',
            'NAME'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_MOBILE_ICONS_NAME'),
            'DESC'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_MOBILE_ICONS_DESCRIPTION'),
            'HOWTO'   => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_MOBILE_ICONS_HOWTO'),
        ];
        $checkList['POINTS']['PROMINADO_QC_MOBILE_VERSION'] = [
            'PARENT'  => 'PROMINADO_FINAL',
            'REQUIRE' => 'N',
            'AUTO'    => 'N',
            'NAME'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_MOBILE_VERSION_NAME'),
            'DESC'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_MOBILE_VERSION_DESCRIPTION'),
            'HOWTO'   => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_MOBILE_VERSION_HOWTO'),
        ];
        $checkList['POINTS']['PROMINADO_QC_VIEWPORT'] = [
            'PARENT'  => 'PROMINADO_FINAL',
            'REQUIRE' => 'Y',
            'AUTO'    => 'N',
            'NAME'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_VIEWPORT_NAME'),
            'DESC'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_VIEWPORT_DESCRIPTION'),
            'HOWTO'   => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_VIEWPORT_HOWTO'),
        ];
        $checkList['POINTS']['PROMINADO_QC_TITLES'] = [
            'PARENT'  => 'PROMINADO_FINAL',
            'REQUIRE' => 'Y',
            'AUTO'    => 'N',
            'NAME'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_TITLES_NAME'),
            'DESC'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_TITLES_DESCRIPTION'),
            'HOWTO'   => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_TITLES_HOWTO'),
        ];
        $checkList['POINTS']['PROMINADO_QC_COUNTERS'] = [
            'PARENT'  => 'PROMINADO_FINAL',
            'REQUIRE' => 'N',
            'AUTO'    => 'N',
            'NAME'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_COUNTERS_NAME'),
            'DESC'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_COUNTERS_DESCRIPTION'),
            'HOWTO'   => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_COUNTERS_HOWTO'),
        ];
        $checkList['POINTS']['PROMINADO_QC_REDIRECT'] = [
            'PARENT'  => 'PROMINADO_FINAL',
            'REQUIRE' => 'Y',
            'AUTO'    => 'N',
            'NAME'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_REDIRECT_NAME'),
            'DESC'    => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_REDIRECT_DESCRIPTION'),
            'HOWTO'   => Loc::getMessage('PROMINADO_BOOTSTRAP_QC_REDIRECT_HOWTO'),
        ];

        return $checkList;
    }
}