<?if(!check_bitrix_sessid()) return;

use \Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);
?>
<?=CAdminMessage::ShowNote(Loc::getMessage("PROMINADO_BOOTSTRAP_UNINSTALL_OK"));?>
<form action="<?echo $APPLICATION->GetCurPage()?>">
    <input type="hidden" name="lang" value="<?echo LANG?>">
    <input type="submit" name="" value="<?echo GetMessage("PROMINADO_BOOTSTRAP_MOD_BACK")?>">
<form>
