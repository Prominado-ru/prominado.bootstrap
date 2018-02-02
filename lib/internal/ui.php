<?php

namespace Prominado\Bootstrap\Internal;

use Bitrix\Main\ArgumentNullException;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Config\Option;

Loc::loadMessages(__FILE__);

class UI
{
    public function showPanel()
    {
        global $USER;
        global $APPLICATION;

        try {
            $solution = Option::get('main', 'wizard_solution', '', SITE_ID);

            if (($solution === 'prominado_bootstrap') && $USER->IsAdmin()) {
                $APPLICATION->AddPanelButton([
                    'HREF'      => '/bitrix/admin/wizard_install.php?lang=' . LANGUAGE_ID . '&wizardName=prominado:bootstrap&wizardSiteID=' . SITE_ID . '&' . bitrix_sessid_get(),
                    'ID'        => 'prominado_bootstrap_wizard',
                    'ICON'      => 'bx-panel-site-wizard-icon',
                    'MAIN_SORT' => 2500,
                    'TYPE'      => 'BIG',
                    'SORT'      => 10,
                    'ALT'       => Loc::getMessage('PROMINADO_BOOTSTRAP_BUTTON_DESCRIPTION'),
                    'TEXT'      => Loc::getMessage('PROMINADO_BOOTSTRAP_BUTTON_NAME'),
                    'MENU'      => [],
                ]);
            }
        } catch (ArgumentNullException $exception) {

        }
    }
}