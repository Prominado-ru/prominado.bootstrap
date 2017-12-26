<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Application;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\IO;
use Bitrix\Main\Config\Option;

require_once Application::getDocumentRoot() . '/bitrix/modules/main/install/wizard_sol/wizard.php';

Loc::loadMessages(__FILE__);

class SelectSiteStep extends CSelectSiteWizardStep
{
    public function InitStep()
    {
        parent::InitStep();

        $wizard =& $this->GetWizard();
        $wizard->solutionName = 'prominado_bootstrap';
        $this->SetNextStep('site');
    }
}

class SiteSettingsStep extends CSiteSettingsWizardStep
{
    public function InitStep()
    {
        $this->SetStepID('site');
        $this->SetTitle(Loc::getMessage('PROMINADO_BOOTSTRAP_INSTALL_WEBSITE_INFO'));
        $this->SetNextStep('developer');
        $this->SetNextCaption(Loc::getMessage('PROMINADO_BOOTSTRAP_INSTALL_NEXT'));

        $server = Application::getInstance()->getContext()->getServer();

        $wizard =& $this->GetWizard();
        $wizard->SetDefaultVars(
            [
                'site_name'            => current(explode('.', $server->getServerName())),
                'site_email'           => 'info@' . $server->getServerName(),
                'template_name'        => current(explode('.', $server->getServerName())),
                'template_description' => Loc::getMessage('PROMINADO_BOOTSTRAP_INSTALL_DEFAULT_TEMPLATE'),
                'template_path'        => current(explode('.', $server->getServerName()))
            ]
        );
    }

    public function ShowStep()
    {
        $this->content = '<div class="wizard-input-form">
            <div class="wizard-catalog-title">' . Loc::getMessage('PROMINADO_BOOTSTRAP_INSTALL_WEBSITE_INFO') . '</div>
            <div class="wizard-input-form-block">
                <div><label for="siteName" class="wizard-input-title">' . Loc::getMessage('PROMINADO_BOOTSTRAP_INSTALL_COMPANY_NAME') . '</label></div>
                ' . $this->ShowInputField('text', 'site_name', ['id' => 'site_name', 'class' => 'wizard-field']) . '
            </div>
            <div class="wizard-input-form-block">
                <div><label for="siteName" class="wizard-input-title">' . Loc::getMessage('PROMINADO_BOOTSTRAP_INSTALL_COMPANY_EMAIL') . '</label></div>
                ' . $this->ShowInputField('text', 'site_email', ['id' => 'site_email', 'class' => 'wizard-field']) . '
            </div>
            <div class="wizard-catalog-title">' . Loc::getMessage('PROMINADO_BOOTSTRAP_INSTALL_WEBSITE_TEMPLATE') . '</div>
            <div class="wizard-input-form-block">
                <div><label for="siteName" class="wizard-input-title">' . Loc::getMessage('PROMINADO_BOOTSTRAP_INSTALL_TEMPLATE_NAME') . '</label></div>
                ' . $this->ShowInputField('text', 'template_name',
                ['id' => 'template_name', 'class' => 'wizard-field']) . '
            </div>
            <div class="wizard-input-form-block">
                <div><label for="siteName" class="wizard-input-title">' . Loc::getMessage('PROMINADO_BOOTSTRAP_INSTALL_TEMPLATE_DESCRIPTION') . '</label></div>
                ' . $this->ShowInputField('text', 'template_description',
                ['id' => 'template_description', 'class' => 'wizard-field']) . '
            </div>
            <div class="wizard-input-form-block">
                <div><label for="siteName" class="wizard-input-title">' . Loc::getMessage('PROMINADO_BOOTSTRAP_INSTALL_TEMPLATE_PATH') . '</label></div>
                ' . $this->ShowInputField('text', 'template_path',
                ['id' => 'template_path', 'class' => 'wizard-field']) . '
            </div>
        </div>';

        $this->content .= $this->ShowHiddenField('installDemoData', 'Y');
    }

    public function OnPostForm()
    {
        $wizard = &$this->GetWizard();

        $site_name = $wizard->GetVar('site_name');
        $site_email = $wizard->GetVar('site_email');
        $template_name = $wizard->GetVar('template_name');
        $template_description = $wizard->GetVar('template_description');
        $template_path = $wizard->GetVar('template_path');

        if (!$site_name) {
            $this->SetError(Loc::getMessage('PROMINADO_BOOTSTRAP_INSTALL_ERROR_SITE_NAME'));
        }
        if (!$site_email) {
            $this->SetError(Loc::getMessage('PROMINADO_BOOTSTRAP_INSTALL_ERROR_EMAIL'));
        }
        if (!$template_name) {
            $this->SetError(Loc::getMessage('PROMINADO_BOOTSTRAP_INSTALL_ERROR_TEMPLATE'));
        }
        if (!$template_description) {
            $this->SetError(Loc::getMessage('PROMINADO_BOOTSTRAP_INSTALL_ERROR_TEMPLATE_DESC'));
        }
        if (!$template_path) {
            $this->SetError(Loc::getMessage('PROMINADO_BOOTSTRAP_INSTALL_ERROR_TEMPLATE_PATH'));
        }
        if (!preg_match('#^[\w]+$#i', $template_path)) {
            $this->SetError(Loc::getMessage('PROMINADO_BOOTSTRAP_INSTALL_ERROR_TEMPLATE_PATH_CORRECT'));
        }

        $dir = new IO\Directory(Application::getDocumentRoot() . '/local/templates/' . $template_path . '/');
        if ($dir->isExists()) {
            $this->SetError(Loc::getMessage('PROMINADO_BOOTSTRAP_INSTALL_ERROR_TEMPLATE_PATH_EXIST'));
        }
    }
}

class DeveloperStep extends CWizardStep
{
    public function InitStep()
    {
        $this->SetStepID('developer');
        $this->SetTitle(Loc::getMessage('PROMINADO_BOOTSTRAP_INSTALL_DEVELOPER_INFO'));
        $this->SetNextStep('install');
        $this->SetNextCaption(Loc::getMessage('PROMINADO_BOOTSTRAP_INSTALL_NEXT'));

        $wizard =& $this->GetWizard();
        $wizard->SetDefaultVars(
            [
                'developer_name'    => Loc::getMessage('PROMINADO_BOOTSTRAP_INSTALL_DEVELOPER_NAME'),
                'developer_website' => Loc::getMessage('PROMINADO_BOOTSTRAP_INSTALL_DEVELOPER_WEBSITE'),
                'developer_email'   => Loc::getMessage('PROMINADO_BOOTSTRAP_INSTALL_DEVELOPER_EMAIL')
            ]
        );
    }

    function ShowStep()
    {
        $wizard = &$this->GetWizard();

        $styleDeveloper = 'style="display:none"';
        if ($wizard->GetVar('showDeveloperData') === 'Y') {
            $styleDeveloper = 'style="display:block"';
        }

        $this->content = '<div class="wizard-input-form">';

        $this->content .= '<div class="wizard-input-form-block">' .
            $this->ShowCheckboxField('showDeveloperData', 'Y', [
                'id'      => 'show-developer-data',
                'onClick' => 'if(this.checked == true){document.getElementById(\'prominado_developer\').style.display=\'block\';}else{document.getElementById(\'prominado_developer\').style.display=\'none\';}'
            ]) .
            '<label for="show-developer-data" class="wizard-input-title">' . Loc::getMessage('PROMINADO_BOOTSTRAP_INSTALL_DEVELOPER_SHOW') . '</label>
            </div>
            <div id="prominado_developer" ' . $styleDeveloper . '>
                <div class="wizard-catalog-title">' . Loc::getMessage('PROMINADO_BOOTSTRAP_INSTALL_COMPANY') . '</div>
                <div class="wizard-input-form-block">
                    <div><label for="siteName" class="wizard-input-title">' . Loc::getMessage('PROMINADO_BOOTSTRAP_INSTALL_COMPANY_NAME') . '</label></div>
                    ' . $this->ShowInputField('text', 'developer_name',
                ['id' => 'developer_name', 'class' => 'wizard-field']) . '
                </div>
                <div class="wizard-input-form-block">
                    <div><label for="siteName" class="wizard-input-title">' . Loc::getMessage('PROMINADO_BOOTSTRAP_INSTALL_COMPANY_WEBSITE') . '</label></div>
                    ' . $this->ShowInputField('text', 'developer_website',
                ['id' => 'developer_website', 'class' => 'wizard-field']) . '
                </div>
                <div class="wizard-input-form-block">
                    <div><label for="siteName" class="wizard-input-title">' . Loc::getMessage('PROMINADO_BOOTSTRAP_INSTALL_COMPANY_EMAIL') . '</label></div>
                    ' . $this->ShowInputField('text', 'developer_email',
                ['id' => 'developer_email', 'class' => 'wizard-field']) . '
                </div>
            </div>';

        $this->content .= '</div>';
    }

    public function OnPostForm()
    {
        $wizard = &$this->GetWizard();

        $show_developer = $wizard->GetVar('showDeveloperData');
        $developer_name = $wizard->GetVar('developer_name');

        if ($show_developer) {
            if (!$developer_name) {
                $this->SetError(Loc::getMessage('PROMINADO_BOOTSTRAP_INSTALL_ERROR_DEVELOPER'));
            }
        }
    }
}

class DataInstallStep extends CDataInstallWizardStep
{
    public function InitStep()
    {
        $this->SetStepID('install');
        $this->SetNextStep('finish');
        $this->SetTitle(Loc::getMessage('PROMINADO_BOOTSTRAP_INSTALL_TITLE'));
        $this->SetNextCaption(Loc::getMessage('PROMINADO_BOOTSTRAP_INSTALL_NEXT'));
    }

    public function CorrectServices(&$arServices)
    {
        $wizard =& $this->GetWizard();
        if ($wizard->GetVar('installDemoData') !== 'Y') {
            // todo: Demo data
        }
    }
}

class SuccessStep extends CFinishWizardStep
{
    public function InitStep()
    {
        $this->SetStepID('finish');
        $this->SetNextStep('finish');
        $this->SetTitle(Loc::getMessage('PROMINADO_BOOTSTRAP_INSTALL_FINISH'));
        $this->SetNextCaption(Loc::getMessage('PROMINADO_BOOTSTRAP_INSTALL_TO_WEBSITE'));
    }

    public function ShowStep()
    {
        $wizard =& $this->GetWizard();
        $siteID = WizardServices::GetCurrentSiteID($wizard->GetVar('siteID'));
        $rsSites = CSite::GetByID($siteID);
        $siteDir = '/';
        if ($arSite = $rsSites->Fetch()) {
            $siteDir = $arSite['DIR'];
        }

        $wizard->SetFormActionScript(str_replace('//', '/', $siteDir . '/?finish'));
        $this->CreateNewIndex();

        Option::set('main', 'wizard_solution', $siteID);

        $this->content = '<table class="wizard-completion-table">
            <tbody><tr>
                <td class="wizard-completion-cell">' . Loc::getMessage('PROMINADO_BOOTSTRAP_INSTALL_END_TITLE') . '</td>
            </tr>
        </tbody></table>';
    }

    public function OnPostForm()
    {
        CopyDirFiles(Application::getDocumentRoot() . '/_index.php', Application::getDocumentRoot() . '/index.php',
            true, true, true);
    }
}

?>