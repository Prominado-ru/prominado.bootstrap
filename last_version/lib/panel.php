<?php

namespace Span\Bootstrap;

use \Bitrix\Main\Localization\Loc;
use \Bitrix\Main\Config\Option;

Loc::loadMessages(__FILE__);

class Panel
{
    function showPanel()
    {
        global $USER;
        global $APPLICATION;

        if ($USER->IsAdmin() && Option::get("main", "wizard_solution", "", SITE_ID) == "span_bootstrap")
        {
            $APPLICATION->AddPanelButton(array(
                "HREF" => "/bitrix/admin/wizard_install.php?lang=" . LANGUAGE_ID . "&wizardName=span:bootstrap&wizardSiteID=" . SITE_ID . "&" . bitrix_sessid_get(),
                "ID" => "span_bootstrap_wizard",
                "ICON" => "bx-panel-site-wizard-icon",
                "MAIN_SORT" => 2500,
                "TYPE" => "BIG",
                "SORT" => 10,
                "ALT" => Loc::getMessage("PROMINADO_BOOTSTRAP_BUTTON_DESCRIPTION"),
                "TEXT" => Loc::getMessage("PROMINADO_BOOTSTRAP_BUTTON_NAME"),
                "MENU" => array(),
            ));
        }
    }
}