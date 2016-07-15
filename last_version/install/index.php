<?

use \Bitrix\Main\Localization\Loc;
use \Bitrix\Main\ModuleManager;
use \Bitrix\Main\Application;

Loc::loadMessages(__FILE__);

class span_bootstrap extends CModule
{
    var $MODULE_ID = "span.bootstrap";
    var $MODULE_VERSION;
    var $MODULE_VERSION_DATE;
    var $MODULE_NAME;
    var $MODULE_DESCRIPTION;
    var $MODULE_CSS;
    var $MODULE_GROUP_RIGHTS = "Y";

    function span_bootstrap()
    {
        $arModuleVersion = array();

        $path = str_replace("\\", "/", __FILE__);
        $path = substr($path, 0, strlen($path) - strlen("/index.php"));
        include($path."/version.php");

        $this->MODULE_VERSION = $arModuleVersion["VERSION"];
        $this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];

        $this->MODULE_NAME = Loc::getMessage("PROMINADO_BOOTSTRAP_INSTALL_NAME");
        $this->MODULE_DESCRIPTION = Loc::getMessage("PROMINADO_BOOTSTRAP_INSTALL_DESCRIPTION");
        $this->PARTNER_NAME = Loc::getMessage("PROMINADO_BOOTSTRAP_PARTNER");
        $this->PARTNER_URI = Loc::getMessage("PROMINADO_BOOTSTRAP_PARTNER_URI");
    }


    function InstallDB()
    {
        ModuleManager::registerModule($this->MODULE_ID);
        $eventManager = \Bitrix\Main\EventManager::getInstance();
        $eventManager->registerEventHandler("main", "OnBeforeProlog", $this->MODULE_ID, "\\Prominado\\Bootstrap\\Panel", "showPanel");
        $eventManager->registerEventHandler("main", "OnCheckListGet", $this->MODULE_ID, "\\Prominado\\Bootstrap\\CheckList", "onCheckListGet");
        return true;
    }

    function UnInstallDB()
    {
        $eventManager = \Bitrix\Main\EventManager::getInstance();
        $eventManager->unRegisterEventHandler("main", "OnBeforeProlog", $this->MODULE_ID, "\\Prominado\\Bootstrap\\Panel", "showPanel");
        $eventManager->unRegisterEventHandler("main", "OnCheckListGet", $this->MODULE_ID, "\\Prominado\\Bootstrap\\CheckList", "onCheckListGet");
        ModuleManager::unRegisterModule($this->MODULE_ID);

        return true;
    }

    function DoInstall()
    {
        global $APPLICATION;
        $this->InstallDB();

        $APPLICATION->IncludeAdminFile(Loc::getMessage("PROMINADO_BOOTSTRAP_INSTALL_TITLE"), Application::getDocumentRoot() . "/bitrix/modules/" . $this->MODULE_ID . "/install/step.php");
    }

    function DoUninstall()
    {
        global $APPLICATION;

        $this->UnInstallDB();
        $APPLICATION->IncludeAdminFile(Loc::getMessage("PROMINADO_BOOTSTRAP_UNINSTALL_TITLE"), Application::getDocumentRoot() . "/bitrix/modules/" . $this->MODULE_ID . "/install/unstep.php");
    }
}
?>