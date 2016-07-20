<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use \Bitrix\Main\Localization\Loc;

Loc::getMessage(__FILE__);

$arServices = Array(
	"main" => Array(
		"NAME" => Loc::getMessage("PROMINADO_BOOTSTRAP_WIZARD_SERVICES"),
		"STAGES" => Array(
			"files.php",
            "settings.php",
			"template.php"
		),
	)
);
?>