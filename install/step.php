<?php

if (!check_bitrix_sessid()) {
    return;
}

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);
?>
<?= CAdminMessage::ShowNote(Loc::getMessage('PROMINADO_BOOTSTRAP_INSTALL_OK')); ?>
<form action="<?= $APPLICATION->GetCurPage(); ?>">
    <input type="hidden" name="lang" value="<?= LANG; ?>"/>
    <input type="submit" name="" value="<?= Loc::getMessage('PROMINADO_BOOTSTRAP_MOD_BACK'); ?>"/>
</form>