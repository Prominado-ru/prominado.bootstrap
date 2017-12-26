<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Localization\Loc;

Loc::getMessage(__FILE__);

$arServices = [
    'main' => [
        'NAME'   => Loc::getMessage('PROMINADO_BOOTSTRAP_WIZARD_SERVICES'),
        'STAGES' => [
            'files.php',
            'settings.php',
            'template.php'
        ],
    ]
];
?>