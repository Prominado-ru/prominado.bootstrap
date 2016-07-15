<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$wizard =& $this->GetWizard();

$wizard->getVar("developer_senior");

COption::SetOptionString("main", "email_from", $wizard->getVar("site_email"));
COption::SetOptionString("main", "site_name", $wizard->getVar("site_name"));

// TODO: Внести, если получится данные в гаджет