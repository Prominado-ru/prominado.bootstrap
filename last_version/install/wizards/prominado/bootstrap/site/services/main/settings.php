<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use \Bitrix\Main\Config\Option;

$wizard =& $this->GetWizard();

$wizard->getVar("developer_senior");

Option::set("main", "email_from", $wizard->getVar("site_email"));
Option::set("main", "site_name", $wizard->getVar("site_name"));