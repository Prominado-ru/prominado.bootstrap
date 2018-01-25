<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

$this->setFrameMode(true);
?>
<div class="nav">
    <ul class="nav__list">
        <? foreach ($arResult as $item) { ?>
            <li class="nav__item"><a href="<?= $item['LINK']; ?>"
                                     class="nav__link<?= $item['SELECTED'] ? ' is-active' : ''; ?>"><?= $item['TEXT']; ?></a>
            </li>
        <? } ?>
    </ul>
</div>