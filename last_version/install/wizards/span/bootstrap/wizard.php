<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)die();

use \Bitrix\Main\Application;
use \Bitrix\Main\Localization\Loc;
use \Bitrix\Main\IO;

require_once(Application::getDocumentRoot() . "/bitrix/modules/main/install/wizard_sol/wizard.php");

Loc::loadMessages(__FILE__);
// TODO: Все скинуть в ланг файлы
class SelectSiteStep extends CSelectSiteWizardStep
{
    function InitStep()
    {
        parent::InitStep();

        $wizard =& $this->GetWizard();
        $wizard->solutionName = "bootstrap";
        $this->SetNextStep("site");
    }
}

class SiteSettingsStep extends CSiteSettingsWizardStep
{
    function InitStep()
    {
        $this->SetStepID("site");
        $this->SetTitle(Loc::getMessage("PROMINADO_BOOTSTRAP_INSTALL_WEBSITE_INFO"));
        $this->SetNextStep("developer");
        $this->SetNextCaption(Loc::getMessage("PROMINADO_BOOTSTRAP_INSTALL_NEXT"));

        $server = Application::getInstance()->getContext()->getServer();

        $wizard =& $this->GetWizard();
        $wizard->SetDefaultVars(
            Array(
                "site_name" => current(explode(".", $server->getServerName())),
                "site_email" => "info@" . $server->getServerName(),
                "template_name" => current(explode(".", $server->getServerName())),
                "template_description" => Loc::getMessage("PROMINADO_BOOTSTRAP_INSTALL_DEFAULT_TEMPLATE"),
                "template_path" => current(explode(".", $server->getServerName()))
            )
        );
    }

    function ShowStep()
    {
        $this->content = '<div class="wizard-input-form">
            <div class="wizard-catalog-title">' . Loc::getMessage("PROMINADO_BOOTSTRAP_INSTALL_WEBSITE_INFO") . '</div>
            <div class="wizard-input-form-block">
                <div><label for="siteName" class="wizard-input-title">' . Loc::getMessage("PROMINADO_BOOTSTRAP_INSTALL_COMPANY_NAME") . '</label></div>
                ' . $this->ShowInputField("text", "site_name", array("id" => "site_name", "class" => "wizard-field")) . '
            </div>
            <div class="wizard-input-form-block">
                <div><label for="siteName" class="wizard-input-title">' . Loc::getMessage("PROMINADO_BOOTSTRAP_INSTALL_COMPANY_EMAIL") . '</label></div>
                ' . $this->ShowInputField("text", "site_email", array("id" => "site_email", "class" => "wizard-field")) . '
            </div>
            <div class="wizard-catalog-title">' . Loc::getMessage("PROMINADO_BOOTSTRAP_INSTALL_WEBSITE_TEMPLATE") . '</div>
            <div class="wizard-input-form-block">
                <div><label for="siteName" class="wizard-input-title">' . Loc::getMessage("PROMINADO_BOOTSTRAP_INSTALL_TEMPLATE_NAME") . '</label></div>
                ' . $this->ShowInputField("text", "template_name", array("id" => "template_name", "class" => "wizard-field")) . '
            </div>
            <div class="wizard-input-form-block">
                <div><label for="siteName" class="wizard-input-title">' . Loc::getMessage("PROMINADO_BOOTSTRAP_INSTALL_TEMPLATE_DESCRIPTION") . '</label></div>
                ' . $this->ShowInputField("text", "template_description", array("id" => "template_description", "class" => "wizard-field")) . '
            </div>
            <div class="wizard-input-form-block">
                <div><label for="siteName" class="wizard-input-title">' . Loc::getMessage("PROMINADO_BOOTSTRAP_INSTALL_TEMPLATE_PATH") . '</label></div>
                ' . $this->ShowInputField("text", "template_path", array("id" => "template_path", "class" => "wizard-field")) . '
            </div>
        </div>';

        $this->content .= $this->ShowHiddenField("installDemoData", "Y");
    }

    function OnPostForm()
    {
        $wizard = &$this->GetWizard();

        $site_name = $wizard->GetVar("site_name");
        $site_email = $wizard->GetVar("site_email");
        $template_name = $wizard->GetVar("template_name");
        $template_description = $wizard->GetVar("template_description");
        $template_path = $wizard->GetVar("template_path");

        if(!$site_name)$this->SetError("Не указано название сайта");
        if(!$site_email)$this->SetError("Не указана эл. почта");
        if(!$template_name)$this->SetError("Не указано название шаблона");
        if(!$template_description)$this->SetError("Не указано описание шаблона");
        if(!$template_path)$this->SetError("Не указана папка шаблона");
        if(!preg_match('#^[A-Za-z0-9_]+$#is', $template_path))$this->SetError("Папка шаблона указана некорректно");

        $dir = new IO\Directory(Application::getDocumentRoot() . "/local/templates/" . $template_path . "/");
        if($dir->isExists())
        {
            $this->SetError("Шаблон уже существует");
        }
    }
}

class DeveloperStep extends CWizardStep
{
    function InitStep()
    {
        $this->SetStepID("developer");
        $this->SetTitle(Loc::getMessage("PROMINADO_BOOTSTRAP_INSTALL_DEVELOPER_INFO"));
        $this->SetNextStep("install");
        $this->SetNextCaption(Loc::getMessage("PROMINADO_BOOTSTRAP_INSTALL_NEXT"));

        $wizard =& $this->GetWizard();
        $wizard->SetDefaultVars(
            Array(
                "developer_name" => Loc::getMessage("PROMINADO_BOOTSTRAP_INSTALL_DEVELOPER_NAME"),
                "developer_website" => Loc::getMessage("PROMINADO_BOOTSTRAP_INSTALL_DEVELOPER_WEBSITE"),
                "developer_email" => Loc::getMessage("PROMINADO_BOOTSTRAP_INSTALL_DEVELOPER_EMAIL"),
                "developer_manager" => "",
                "developer_designer" => "",
                "developer_senior" => "",
            )
        );
    }

    function ShowStep()
    {
        $wizard = &$this->GetWizard();

        $styleDeveloper = 'style="display:none"';
        if($wizard->GetVar("showDeveloperData") == "Y")$styleDeveloper = 'style="display:block"';

        $styleHumans = 'style="display:none"';
        if($wizard->GetVar("showHumansData") == "Y")$styleHumans = 'style="display:block"';

        $this->content = '<div class="wizard-input-form">';

        $this->content .= '<div class="wizard-input-form-block">
                ' . $this->ShowCheckboxField("showDeveloperData", "Y",
                    (array("id" => "show-developer-data", "onClick" => "if(this.checked == true){document.getElementById('prominado_developer').style.display='block';}else{document.getElementById('prominado_developer').style.display='none';}"))) . '
                <label for="show-developer-data" class="wizard-input-title">Заполнить данные о разработчике</label>
            </div>
            <div id="prominado_developer" ' . $styleDeveloper . '>
                <div class="wizard-catalog-title">' . Loc::getMessage("PROMINADO_BOOTSTRAP_INSTALL_COMPANY") . '</div>
                <div class="wizard-input-form-block">
                    <div><label for="siteName" class="wizard-input-title">' . Loc::getMessage("PROMINADO_BOOTSTRAP_INSTALL_COMPANY_NAME") . '</label></div>
                    ' . $this->ShowInputField("text", "developer_name", array("id" => "developer_name", "class" => "wizard-field")) . '
                </div>
                <div class="wizard-input-form-block">
                    <div><label for="siteName" class="wizard-input-title">' . Loc::getMessage("PROMINADO_BOOTSTRAP_INSTALL_COMPANY_WEBSITE") . '</label></div>
                    ' . $this->ShowInputField("text", "developer_website", array("id" => "developer_website", "class" => "wizard-field")) . '
                </div>
                <div class="wizard-input-form-block">
                    <div><label for="siteName" class="wizard-input-title">' . Loc::getMessage("PROMINADO_BOOTSTRAP_INSTALL_COMPANY_EMAIL") . '</label></div>
                    ' . $this->ShowInputField("text", "developer_email", array("id" => "developer_email", "class" => "wizard-field")) . '
                </div>
            </div>';

        $this->content .= '<div class="wizard-input-form-block">
                ' . $this->ShowCheckboxField("showHumansData", "Y",
                (array("id" => "show-humans-data", "onClick" => "if(this.checked == true){document.getElementById('prominado_humans').style.display='block';}else{document.getElementById('prominado_humans').style.display='none';}"))) . '
                <label for="show-humans-data" class="wizard-input-title">Заполнить Humans.txt</label>
            </div>
            <div id="prominado_humans" ' . $styleHumans . '>
                <div class="wizard-catalog-title">' . Loc::getMessage("PROMINADO_BOOTSTRAP_INSTALL_HUMANS") . '</div>
                <div class="wizard-input-form-block">
                    <div><label for="siteName" class="wizard-input-title">' . Loc::getMessage("PROMINADO_BOOTSTRAP_INSTALL_HUMANS_MANAGER") . '</label></div>
                    ' . $this->ShowInputField("text", "developer_manager", array("id" => "developer_manager", "class" => "wizard-field")) . '
                </div>
                <div class="wizard-input-form-block">
                    <div><label for="siteName" class="wizard-input-title">' . Loc::getMessage("PROMINADO_BOOTSTRAP_INSTALL_HUMANS_DESIGNER") . '</label></div>
                    ' . $this->ShowInputField("text", "developer_designer", array("id" => "developer_designer", "class" => "wizard-field")) . '
                </div>
                <div class="wizard-input-form-block">
                    <div><label for="siteName" class="wizard-input-title">' . Loc::getMessage("PROMINADO_BOOTSTRAP_INSTALL_HUMANS_SENIOR") . '</label></div>
                    ' . $this->ShowInputField("text", "developer_senior", array("id" => "developer_senior", "class" => "wizard-field")) . '
                </div>
            </div>
        </div>';
    }

    function OnPostForm()
    {
        $wizard = &$this->GetWizard();

        $show_developer = $wizard->GetVar("showDeveloperData");
        $developer_name = $wizard->GetVar("developer_name");
        $developer_email = $wizard->GetVar("developer_email");
        $developer_website = $wizard->GetVar("developer_website");

        $developer_manager = $wizard->GetVar("developer_manager");
        $developer_designer = $wizard->GetVar("developer_designer");
        $developer_senior = $wizard->GetVar("developer_senior");

        if($show_developer)
        {
            if(!$developer_name)$this->SetError("Не указан разработчик");
        }
    }
}

class DataInstallStep extends CDataInstallWizardStep
{
    function InitStep()
    {
        $this->SetStepID("install");
        $this->SetNextStep("finish");
        $this->SetTitle(Loc::getMessage("PROMINADO_BOOTSTRAP_INSTALL_TITLE"));
        $this->SetNextCaption(Loc::getMessage("PROMINADO_BOOTSTRAP_INSTALL_NEXT"));
    }

    function CorrectServices(&$arServices)
    {
        $wizard =& $this->GetWizard();
        if($wizard->GetVar("installDemoData") != "Y")
        {
        }
    }
}

class SuccessStep extends CFinishWizardStep
{
    function InitStep()
    {
        $this->SetStepID("finish");
        $this->SetNextStep("finish");
        $this->SetTitle(Loc::getMessage("PROMINADO_BOOTSTRAP_INSTALL_FINISH"));
        $this->SetNextCaption(Loc::getMessage("PROMINADO_BOOTSTRAP_INSTALL_TO_WEBSITE"));
    }

    function ShowStep()
    {
        $wizard =& $this->GetWizard();
        $siteID = WizardServices::GetCurrentSiteID($wizard->GetVar("siteID"));
        $rsSites = CSite::GetByID($siteID);
        $siteDir = "/";
        if ($arSite = $rsSites->Fetch())
        {
            $siteDir = $arSite["DIR"];
        }

        $wizard->SetFormActionScript(str_replace("//", "/", $siteDir."/?finish"));
        $this->CreateNewIndex();
        COption::SetOptionString("main", "wizard_solution", $wizard->solutionName, false, $siteID);

        $this->content = '<table class="wizard-completion-table">
            <tbody><tr>
                <td class="wizard-completion-cell">' . Loc::getMessage("PROMINADO_BOOTSTRAP_INSTALL_END_TITLE") . '</td>
            </tr>
        </tbody></table>';
    }

    function OnPostForm()
    {
        CopyDirFiles(Application::getDocumentRoot() . "/_index.php", Application::getDocumentRoot() . "/index.php", true, true, true);
    }
}
?>