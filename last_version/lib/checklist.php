<?php

namespace Prominado\Bootstrap;

use \Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

class CheckList
{
    static public function onCheckListGet()
    {
        $checkList = array("CATEGORIES" => Array(), "POINTS" => Array());
        $checkList["CATEGORIES"]["PROMINADO_CONTENT"] = Array(
            "NAME" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_CONTENT")
        );
        $checkList["POINTS"]["PROMINADO_QC_DEV_SERVER"] = Array(
            "PARENT" => "PROMINADO_CONTENT",
            "REQUIRE" => "Y",
            "AUTO" => "N",
            "NAME" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_DEV_NAME"),
            "DESC" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_DEV_DESCRIPTION"),
            "HOWTO" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_DEV_HOWTO"),
            "LINKS" => "links"
        );
        $checkList["POINTS"]["PROMINADO_QC_TEST_CONTENT"] = Array(
            "PARENT" => "PROMINADO_CONTENT",
            "REQUIRE" => "Y",
            "AUTO" => "N",
            "NAME" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_TEST_NAME"),
            "DESC" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_TEST_DESCRIPTION"),
            "HOWTO" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_TEST_HOWTO"),
        );
        $checkList["POINTS"]["PROMINADO_QC_PRINT"] = Array(
            "PARENT" => "PROMINADO_CONTENT",
            "REQUIRE" => "N",
            "AUTO" => "N",
            "NAME" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_PRINT_NAME"),
            "DESC" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_PRINT_DESCRIPTION"),
            "HOWTO" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_PRINT_HOWTO"),
        );
        $checkList["CATEGORIES"]["PROMINADO_VALID"] = Array(
            "NAME" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_VALID"),
            "LINKS" => ""
        );
        $checkList["POINTS"]["PROMINADO_QC_HTML"] = Array(
            "PARENT" => "PROMINADO_VALID",
            "REQUIRE" => "Y",
            "AUTO" => "N",
            "NAME" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_HTML_NAME"),
            "DESC" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_HTML_DESCRIPTION"),
            "HOWTO" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_HTML_HOWTO"),
        );
        $checkList["POINTS"]["PROMINADO_QC_CSS"] = Array(
            "PARENT" => "PROMINADO_VALID",
            "REQUIRE" => "Y",
            "AUTO" => "N",
            "NAME" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_CSS_NAME"),
            "DESC" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_CSS_DESCRIPTION"),
            "HOWTO" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_CSS_HOWTO"),
        );
        $checkList["POINTS"]["PROMINADO_QC_JS"] = Array(
            "PARENT" => "PROMINADO_VALID",
            "REQUIRE" => "Y",
            "AUTO" => "N",
            "NAME" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_JS_NAME"),
            "DESC" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_JS_DESCRIPTION"),
            "HOWTO" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_JS_HOWTO"),
        );
        $checkList["CATEGORIES"]["PROMINADO_TEST"] = Array(
            "NAME" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_TEST"),
            "LINKS" => ""
        );
        $checkList["POINTS"]["PROMINADO_QC_FORMS"] = Array(
            "PARENT" => "PROMINADO_TEST",
            "REQUIRE" => "N",
            "AUTO" => "N",
            "NAME" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_FORMS_NAME"),
            "DESC" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_FORMS_DESCRIPTION"),
            "HOWTO" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_FORMS_HOWTO"),
        );
        $checkList["POINTS"]["PROMINADO_QC_IS_ADMIN"] = Array(
            "PARENT" => "PROMINADO_TEST",
            "REQUIRE" => "Y",
            "AUTO" => "N",
            "NAME" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_ADMIN_NAME"),
            "DESC" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_ADMIN_DESCRIPTION"),
            "HOWTO" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_ADMIN_HOWTO"),
        );
        $checkList["POINTS"]["PROMINADO_QC_REGISTER"] = Array(
            "PARENT" => "PROMINADO_TEST",
            "REQUIRE" => "N",
            "AUTO" => "N",
            "NAME" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_REGISTER_NAME"),
            "DESC" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_REGISTER_DESCRIPTION"),
            "HOWTO" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_REGISTER_HOWTO"),
        );
        $checkList["POINTS"]["PROMINADO_QC_RECOVERY"] = Array(
            "PARENT" => "PROMINADO_TEST",
            "REQUIRE" => "N",
            "AUTO" => "N",
            "NAME" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_RECOVERY_NAME"),
            "DESC" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_RECOVERY_DESCRIPTION"),
            "HOWTO" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_RECOVERY_HOWTO"),
        );
        $checkList["POINTS"]["PROMINADO_QC_BROWSER"] = Array(
            "PARENT" => "PROMINADO_TEST",
            "REQUIRE" => "Y",
            "AUTO" => "N",
            "NAME" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_BROWSER_NAME"),
            "DESC" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_BROWSER_DESCRIPTION"),
            "HOWTO" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_BROWSER_HOWTO"),
        );
        $checkList["POINTS"]["PROMINADO_QC_MAIL"] = Array(
            "PARENT" => "PROMINADO_TEST",
            "REQUIRE" => "N",
            "AUTO" => "N",
            "NAME" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_MAIL_NAME"),
            "DESC" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_MAIL_DESCRIPTION"),
            "HOWTO" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_MAIL_HOWTO"),
        );
        $checkList["POINTS"]["PROMINADO_QC_DISABLED_JS"] = Array(
            "PARENT" => "PROMINADO_TEST",
            "REQUIRE" => "N",
            "AUTO" => "N",
            "NAME" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_DISABLED_JS_NAME"),
            "DESC" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_DISABLED_JS_DESCRIPTION"),
            "HOWTO" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_DISABLED_JS_HOWTO"),
        );
        $checkList["POINTS"]["PROMINADO_QC_CHPU"] = Array(
            "PARENT" => "PROMINADO_TEST",
            "REQUIRE" => "N",
            "AUTO" => "N",
            "NAME" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_CHPU_NAME"),
            "DESC" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_CHPU_DESCRIPTION"),
            "HOWTO" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_CHPU_HOWTO"),
        );
        $checkList["POINTS"]["PROMINADO_QC_SCHEMA"] = Array(
            "PARENT" => "PROMINADO_TEST",
            "REQUIRE" => "N",
            "AUTO" => "N",
            "NAME" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_SCHEMA_NAME"),
            "DESC" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_SCHEMA_DESCRIPTION"),
            "HOWTO" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_SCHEMA_HOWTO"),
        );
        $checkList["POINTS"]["PROMINADO_QC_BROKEN_LINKS"] = Array(
            "PARENT" => "PROMINADO_TEST",
            "REQUIRE" => "Y",
            "AUTO" => "N",
            "NAME" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_BROKEN_LINKS_NAME"),
            "DESC" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_BROKEN_LINKS_DESCRIPTION"),
            "HOWTO" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_BROKEN_LINKS_HOWTO"),
        );
        $checkList["CATEGORIES"]["PROMINADO_ADMIN"] = Array(
            "NAME" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_ADMIN"),
            "LINKS" => ""
        );
        $checkList["POINTS"]["PROMINADO_QC_TEMPLATE_NAME"] = Array(
            "PARENT" => "PROMINADO_ADMIN",
            "REQUIRE" => "Y",
            "AUTO" => "N",
            "NAME" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_TEMPLATE_NAME_NAME"),
            "DESC" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_TEMPLATE_NAME_DESCRIPTION"),
            "HOWTO" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_TEMPLATE_NAME_HOWTO"),
        );
        $checkList["POINTS"]["PROMINADO_QC_SITE_NAME"] = Array(
            "PARENT" => "PROMINADO_ADMIN",
            "REQUIRE" => "Y",
            "AUTO" => "N",
            "NAME" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_SITE_NAME_NAME"),
            "DESC" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_SITE_NAME_DESCRIPTION"),
            "HOWTO" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_SITE_NAME_HOWTO"),
        );

        // todo :: Автотест почты в настройках ГМ
        $checkList["POINTS"]["PROMINADO_QC_SITE_EMAIL"] = Array(
            "PARENT" => "PROMINADO_ADMIN",
            "REQUIRE" => "Y",
            "AUTO" => "N",
            "NAME" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_SITE_EMAIL_NAME"),
            "DESC" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_SITE_EMAIL_DESCRIPTION"),
            "HOWTO" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_SITE_EMAIL_HOWTO"),
        );

        // todo :: Автотест проверки сложности пароля у админов
        $checkList["POINTS"]["PROMINADO_QC_USER_ADMIN"] = Array(
            "PARENT" => "PROMINADO_ADMIN",
            "REQUIRE" => "Y",
            "AUTO" => "N",
            "NAME" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_USER_ADMIN_NAME"),
            "DESC" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_USER_ADMIN_DESCRIPTION"),
            "HOWTO" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_USER_ADMIN_HOWTO"),
        );

        $checkList["POINTS"]["PROMINADO_QC_IBLOCKS"] = Array(
            "PARENT" => "PROMINADO_ADMIN",
            "REQUIRE" => "Y",
            "AUTO" => "N",
            "NAME" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_IBLOCKS_NAME"),
            "DESC" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_IBLOCKS_DESCRIPTION"),
            "HOWTO" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_IBLOCKS_HOWTO"),
        );
        $checkList["POINTS"]["PROMINADO_QC_IBLOCKS_PATH"] = Array(
            "PARENT" => "PROMINADO_ADMIN",
            "REQUIRE" => "Y",
            "AUTO" => "N",
            "NAME" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_IBLOCKS_PATH_NAME"),
            "DESC" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_IBLOCKS_PATH_DESCRIPTION"),
            "HOWTO" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_IBLOCKS_PATH_HOWTO"),
        );
        $checkList["POINTS"]["PROMINADO_QC_INDEX"] = Array(
            "PARENT" => "PROMINADO_ADMIN",
            "REQUIRE" => "Y",
            "AUTO" => "N",
            "NAME" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_INDEX_NAME"),
            "DESC" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_INDEX_DESCRIPTION"),
            "HOWTO" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_INDEX_HOWTO"),
        );
        $checkList["POINTS"]["PROMINADO_QC_SEARCH_EXCEPTION"] = Array(
            "PARENT" => "PROMINADO_ADMIN",
            "REQUIRE" => "Y",
            "AUTO" => "N",
            "NAME" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_SEARCH_EXCEPTION_NAME"),
            "DESC" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_SEARCH_EXCEPTION_DESCRIPTION"),
            "HOWTO" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_SEARCH_EXCEPTION_HOWTO"),
        );

        // todo :: Автотест создание карты сайта
        $checkList["POINTS"]["PROMINADO_QC_SITEMAP"] = Array(
            "PARENT" => "PROMINADO_ADMIN",
            "REQUIRE" => "Y",
            "AUTO" => "N",
            "NAME" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_SITEMAP_NAME"),
            "DESC" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_SITEMAP_DESCRIPTION"),
            "HOWTO" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_SITEMAP_HOWTO"),
        );

        // todo :: Автотест проверка информации о разработчике
        $checkList["POINTS"]["PROMINADO_QC_DEVELOPER"] = Array(
            "PARENT" => "PROMINADO_ADMIN",
            "REQUIRE" => "Y",
            "AUTO" => "N",
            "NAME" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_DEVELOPER_NAME"),
            "DESC" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_DEVELOPER_DESCRIPTION"),
            "HOWTO" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_DEVELOPER_HOWTO"),
        );
        $checkList["CATEGORIES"]["PROMINADO_SECURITY"] = Array(
            "NAME" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_SECURITY"),
            "LINKS" => ""
        );

        // todo :: Автотест проверки создания бэкапа
        $checkList["POINTS"]["PROMINADO_QC_BACKUPS"] = Array(
            "PARENT" => "PROMINADO_SECURITY",
            "REQUIRE" => "Y",
            "AUTO" => "N",
            "NAME" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_BACKUPS_NAME"),
            "DESC" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_BACKUPS_DESCRIPTION"),
            "HOWTO" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_BACKUPS_HOWTO"),
        );
        $checkList["POINTS"]["PROMINADO_QC_ACCESS"] = Array(
            "PARENT" => "PROMINADO_SECURITY",
            "REQUIRE" => "Y",
            "AUTO" => "N",
            "NAME" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_ACCESS_NAME"),
            "DESC" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_ACCESS_DESCRIPTION"),
            "HOWTO" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_ACCESS_HOWTO"),
        );

        $checkList["POINTS"]["PROMINADO_QC_DISK_QUOTA"] = Array(
            "PARENT" => "PROMINADO_SECURITY",
            "REQUIRE" => "Y",
            "AUTO" => "N",
            "NAME" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_DISK_QUOTA_NAME"),
            "DESC" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_DISK_QUOTA_DESCRIPTION"),
            "HOWTO" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_DISK_QUOTA_HOWTO"),
        );
        $checkList["POINTS"]["PROMINADO_QC_CRON"] = Array(
            "PARENT" => "PROMINADO_SECURITY",
            "REQUIRE" => "N",
            "AUTO" => "N",
            "NAME" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_CRON_NAME"),
            "DESC" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_CRON_DESCRIPTION"),
            "HOWTO" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_CRON_HOWTO"),
        );
        $checkList["POINTS"]["PROMINADO_QC_CRASH"] = Array(
            "PARENT" => "PROMINADO_SECURITY",
            "REQUIRE" => "N",
            "AUTO" => "N",
            "NAME" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_CRASH_NAME"),
            "DESC" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_CRASH_DESCRIPTION"),
            "HOWTO" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_CRASH_HOWTO"),
        );
        $checkList["CATEGORIES"]["PROMINADO_PERFORMANCE"] = Array(
            "NAME" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_PERFORMANCE"),
            "LINKS" => ""
        );
        $checkList["POINTS"]["PROMINADO_QC_PICTURES"] = Array(
            "PARENT" => "PROMINADO_PERFORMANCE",
            "REQUIRE" => "N",
            "AUTO" => "N",
            "NAME" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_PICTURES_NAME"),
            "DESC" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_PICTURES_DESCRIPTION"),
            "HOWTO" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_PICTURES_HOWTO"),
        );
        $checkList["POINTS"]["PROMINADO_QC_CACHE"] = Array(
            "PARENT" => "PROMINADO_PERFORMANCE",
            "REQUIRE" => "Y",
            "AUTO" => "N",
            "NAME" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_CACHE_NAME"),
            "DESC" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_CACHE_DESCRIPTION"),
            "HOWTO" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_CACHE_HOWTO"),
        );
        $checkList["POINTS"]["PROMINADO_QC_SITE_SPEED"] = Array(
            "PARENT" => "PROMINADO_PERFORMANCE",
            "REQUIRE" => "N",
            "AUTO" => "N",
            "NAME" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_SITE_SPEED_NAME"),
            "DESC" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_SITE_SPEED_DESCRIPTION"),
            "HOWTO" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_SITE_SPEED_HOWTO"),
        );
        $checkList["CATEGORIES"]["PROMINADO_FINAL"] = Array(
            "NAME" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_FINAL"),
            "LINKS" => ""
        );

        // todo :: Автотест favicon
        $checkList["POINTS"]["PROMINADO_QC_FAVICON"] = Array(
            "PARENT" => "PROMINADO_FINAL",
            "REQUIRE" => "Y",
            "AUTO" => "N",
            "NAME" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_FAVICON_NAME"),
            "DESC" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_FAVICON_DESCRIPTION"),
            "HOWTO" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_FAVICON_HOWTO"),
        );

        // todo :: Автотест robots.txt
        $checkList["POINTS"]["PROMINADO_QC_ROBOTS_TXT"] = Array(
            "PARENT" => "PROMINADO_FINAL",
            "REQUIRE" => "Y",
            "AUTO" => "N",
            "NAME" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_ROBOTS_TXT_NAME"),
            "DESC" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_ROBOTS_TXT_DESCRIPTION"),
            "HOWTO" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_ROBOTS_TXT_HOWTO"),
        );

        // todo :: Автотест 404
        $checkList["POINTS"]["PROMINADO_QC_404"] = Array(
            "PARENT" => "PROMINADO_FINAL",
            "REQUIRE" => "Y",
            "AUTO" => "N",
            "NAME" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_404_NAME"),
            "DESC" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_404_DESCRIPTION"),
            "HOWTO" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_404_HOWTO"),
        );

        $checkList["POINTS"]["PROMINADO_QC_SOCIAL_SHARE"] = Array(
            "PARENT" => "PROMINADO_FINAL",
            "REQUIRE" => "N",
            "AUTO" => "N",
            "NAME" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_SOCIAL_SHARE_NAME"),
            "DESC" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_SOCIAL_SHARE_DESCRIPTION"),
            "HOWTO" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_SOCIAL_SHARE_HOWTO"),
        );
        $checkList["POINTS"]["PROMINADO_QC_MOBILE_ICONS"] = Array(
            "PARENT" => "PROMINADO_FINAL",
            "REQUIRE" => "N",
            "AUTO" => "N",
            "NAME" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_MOBILE_ICONS_NAME"),
            "DESC" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_MOBILE_ICONS_DESCRIPTION"),
            "HOWTO" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_MOBILE_ICONS_HOWTO"),
        );
        $checkList["POINTS"]["PROMINADO_QC_MOBILE_VERSION"] = Array(
            "PARENT" => "PROMINADO_FINAL",
            "REQUIRE" => "N",
            "AUTO" => "N",
            "NAME" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_MOBILE_VERSION_NAME"),
            "DESC" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_MOBILE_VERSION_DESCRIPTION"),
            "HOWTO" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_MOBILE_VERSION_HOWTO"),
        );

        // todo :: Автотест viewport
        $checkList["POINTS"]["PROMINADO_QC_VIEWPORT"] = Array(
            "PARENT" => "PROMINADO_FINAL",
            "REQUIRE" => "Y",
            "AUTO" => "N",
            "NAME" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_VIEWPORT_NAME"),
            "DESC" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_VIEWPORT_DESCRIPTION"),
            "HOWTO" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_VIEWPORT_HOWTO"),
        );
        $checkList["POINTS"]["PROMINADO_QC_TITLES"] = Array(
            "PARENT" => "PROMINADO_FINAL",
            "REQUIRE" => "Y",
            "AUTO" => "N",
            "NAME" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_TITLES_NAME"),
            "DESC" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_TITLES_DESCRIPTION"),
            "HOWTO" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_TITLES_HOWTO"),
        );
        $checkList["POINTS"]["PROMINADO_QC_COUNTERS"] = Array(
            "PARENT" => "PROMINADO_FINAL",
            "REQUIRE" => "N",
            "AUTO" => "N",
            "NAME" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_COUNTERS_NAME"),
            "DESC" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_COUNTERS_DESCRIPTION"),
            "HOWTO" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_COUNTERS_HOWTO"),
        );
        $checkList["POINTS"]["PROMINADO_QC_REDIRECT"] = Array(
            "PARENT" => "PROMINADO_FINAL",
            "REQUIRE" => "Y",
            "AUTO" => "N",
            "NAME" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_REDIRECT_NAME"),
            "DESC" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_REDIRECT_DESCRIPTION"),
            "HOWTO" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_REDIRECT_HOWTO"),
        );

        // todo :: Автотест humans.txt
        $checkList["POINTS"]["PROMINADO_QC_HUMANS"] = Array(
            "PARENT" => "PROMINADO_FINAL",
            "REQUIRE" => "Y",
            "AUTO" => "N",
            "NAME" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_HUMANS_NAME"),
            "DESC" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_HUMANS_DESCRIPTION"),
            "HOWTO" => Loc::getMessage("PROMINADO_BOOTSTRAP_QC_HUMANS_HOWTO"),
        );

        return $checkList;
    }


}