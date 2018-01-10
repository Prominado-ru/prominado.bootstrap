<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

$this->setFrameMode(true);
?>

<div class="news__list">
    <? foreach ($arResult['ITEMS'] as $item) { ?>
        <div class="news__item">
            <div class="news__title">
                <a href="<?= $item['DETAIL_PAGE_URL']; ?>"><?= $item['NAME']; ?></a>
            </div>
            <div class="news__preview">
                <?= $item['PREVIEW_TEXT']; ?>
            </div>
            <div class="news__link">
                <a href="<?= $item['DETAIL_PAGE_URL']; ?>">Подробнее</a>
            </div>
        </div>
    <? } ?>
    <div class="clear"></div>
</div>