<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use \Bitrix\Main\Application;

$bxTplDir = Application::getDocumentRoot() . "/local/templates/";

CopyDirFiles(
    Application::getDocumentRoot() . WizardServices::GetTemplatesPath(WIZARD_RELATIVE_PATH . "/site") . "/template/",
    $bxTplDir . "template/",
    true, true, false
);

$wizard = &$this->GetWizard();

CWizardUtil::ReplaceMacros($bxTplDir . "template/description.php", Array(
    "TEMPLATE_NAME" => $wizard->GetVar("template_name"),
    "TEMPLATE_DESCRIPTION" => $wizard->GetVar("template_description")
));

CopyDirFiles($bxTplDir . "template/", $bxTplDir . $wizard->getVar("template_path") . "/", true, true, true);

$obSite = new CSite();
$t = $obSite->Update(WIZARD_SITE_ID, array(
    'TEMPLATE'=>array(
        array(
            'CONDITION' => "",
            'SORT' => 1,
            'TEMPLATE' => $wizard->getVar("template_path")
        ),
    )
));