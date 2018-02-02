<?php

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ModuleManager;
use Bitrix\Main\Application;

Loc::loadMessages(__FILE__);

class prominado_bootstrap extends CModule
{
    var $MODULE_ID = 'prominado.bootstrap';
    var $MODULE_VERSION;
    var $MODULE_VERSION_DATE;
    var $MODULE_NAME;
    var $MODULE_DESCRIPTION;
    var $MODULE_CSS;
    var $MODULE_GROUP_RIGHTS = 'N';

    public function prominado_bootstrap()
    {
        $arModuleVersion = [];

        include __DIR__ . '/version.php';

        $this->MODULE_VERSION = $arModuleVersion['VERSION'];
        $this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];

        $this->MODULE_NAME = Loc::getMessage('PROMINADO_BOOTSTRAP_INSTALL_NAME');
        $this->MODULE_DESCRIPTION = Loc::getMessage('PROMINADO_BOOTSTRAP_INSTALL_DESCRIPTION');
        $this->PARTNER_NAME = Loc::getMessage('PROMINADO_BOOTSTRAP_PARTNER');
        $this->PARTNER_URI = Loc::getMessage('PROMINADO_BOOTSTRAP_PARTNER_URI');
    }


    public function InstallDB()
    {
        ModuleManager::registerModule($this->MODULE_ID);
        $eventManager = \Bitrix\Main\EventManager::getInstance();
        $eventManager->registerEventHandler('main', 'OnBeforeProlog', $this->MODULE_ID,
            '\\Prominado\\Bootstrap\\Internal\\UI', 'showPanel');
        $eventManager->registerEventHandler('main', 'OnCheckListGet', $this->MODULE_ID,
            '\\Prominado\\Bootstrap\\Internal\\CheckList', 'onCheckListGet');
        $eventManager->registerEventHandler('iblock', 'OnIBlockPropertyBuildList', $this->MODULE_ID,
            '\\Prominado\\Bootstrap\\Internal\\ListProperty', 'GetUserTypeDescription');

        return true;
    }

    public function UnInstallDB()
    {
        $eventManager = \Bitrix\Main\EventManager::getInstance();
        $eventManager->unRegisterEventHandler('main', 'OnBeforeProlog', $this->MODULE_ID,
            '\\Prominado\\Bootstrap\\Internal\\UI', 'showPanel');
        $eventManager->unRegisterEventHandler('main', 'OnCheckListGet', $this->MODULE_ID,
            '\\Prominado\\Bootstrap\\Internal\\CheckList', 'onCheckListGet');
        $eventManager->unRegisterEventHandler('iblock', 'OnIBlockPropertyBuildList', $this->MODULE_ID,
            '\\Prominado\\Bootstrap\\Internal\\ListProperty', 'GetUserTypeDescription');
        ModuleManager::unRegisterModule($this->MODULE_ID);

        return true;
    }

    public function InstallFiles()
    {
        CopyDirFiles(Application::getDocumentRoot() . '/bitrix/modules/' . $this->MODULE_ID . '/install/js',
            Application::getDocumentRoot() . '/bitrix/js', true, true);
    }

    public function UnInstallFiles()
    {
        DeleteDirFilesEx(Application::getDocumentRoot() . '/bitrix/js/' . $this->MODULE_ID . '/');
    }

    public function DoInstall()
    {
        global $APPLICATION;
        $this->InstallDB();
        $this->InstallFiles();

        $APPLICATION->IncludeAdminFile(Loc::getMessage('PROMINADO_BOOTSTRAP_INSTALL_TITLE'),
            Application::getDocumentRoot() . '/bitrix/modules/' . $this->MODULE_ID . '/install/step.php');
    }

    public function DoUninstall()
    {
        global $APPLICATION;

        $this->UnInstallDB();
        $this->UnInstallFiles();

        $APPLICATION->IncludeAdminFile(Loc::getMessage('PROMINADO_BOOTSTRAP_UNINSTALL_TITLE'),
            Application::getDocumentRoot() . '/bitrix/modules/' . $this->MODULE_ID . '/install/unstep.php');
    }
}

?>