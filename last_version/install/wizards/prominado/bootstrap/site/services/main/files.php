<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (!defined("WIZARD_SITE_ID") || !defined("WIZARD_SITE_DIR"))return;

use \Bitrix\Main\Application;
use \Bitrix\Main\IO;
use \Bitrix\Main\Localization\Loc;

Loc::getMessage(__FILE__);

if(file_exists(WIZARD_ABSOLUTE_PATH . "/site/public/" . LANGUAGE_ID . "/"))
{
    CopyDirFiles(
        WIZARD_ABSOLUTE_PATH . "/site/public/" . LANGUAGE_ID . "/",
        WIZARD_SITE_PATH,
        $rewrite = true,
        $recursive = true,
        $delete_after_copy = false
    );
}

$wizard =& $this->GetWizard();

WizardServices::PatchHtaccess(WIZARD_SITE_PATH);

if($wizard->getVar("showHumansData"))
{
    CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH . "humans.txt", Array(
        "SENIOR_NAME" => $wizard->getVar("developer_senior"),
        "DESIGNER_NAME" => $wizard->getVar("developer_designer"),
        "MANAGER_NAME" => $wizard->getVar("developer_manager"),
        "DEVELOPER_NAME" => $wizard->getVar("developer_name"),
        "DEVELOPER_WEBSITE" => $wizard->getVar("developer_website"),
    ));
}

if($wizard->getVar("showDeveloperData"))
{
    $file = Application::getDocumentRoot() . "/local/php_interface/this_site_support.php";
    IO\File::putFileContents($file, '<a href="' . $wizard->getVar("developer_website") . '" target="_blank">' . Loc::getMessage("PROMINADO_BOOTSTRAP_WIZARD_CREATED_BY") . ' – ' . $wizard->getVar("developer_name") . '</a>');
}