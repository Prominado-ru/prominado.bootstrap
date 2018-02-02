<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

if (!defined('WIZARD_DEFAULT_SITE_ID') && !empty($_REQUEST['wizardSiteID'])) {
    define('WIZARD_DEFAULT_SITE_ID', $_REQUEST['wizardSiteID']);
}

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

$arWizardDescription = [
    'NAME'        => Loc::getMessage('PROMINADO_BOOTSTRAP_WIZARD_NAME'),
    'DESCRIPTION' => Loc::getMessage('PROMINADO_BOOTSTRAP_WIZARD_DESCRIPTION'),
    'VERSION'     => '1.0.1',
    'START_TYPE'  => 'WINDOW',
    'WIZARD_TYPE' => 'INSTALL',
    'IMAGE'       => '/images/' . LANGUAGE_ID . '/solution.png',
    'PARENT'      => 'wizard_sol',
    'TEMPLATES'   => [
        ['SCRIPT' => 'wizard_sol']
    ],
    'STEPS'       => defined('WIZARD_DEFAULT_SITE_ID') ?
        ['SiteSettingsStep', 'DeveloperStep', 'SettingsStep', 'DataInstallStep', 'SuccessStep'] :
        ['SelectSiteStep', 'SiteSettingsStep', 'DeveloperStep', 'SettingsStep', 'DataInstallStep', 'SuccessStep']
];