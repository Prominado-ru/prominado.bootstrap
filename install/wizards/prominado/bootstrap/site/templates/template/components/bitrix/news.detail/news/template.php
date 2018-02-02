<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

$this->setFrameMode(true);
?>

<div class="news__detail">
    <h1><?= $arResult['NAME']; ?></h1>
    <div class="news__content">
        <?= $arResult['DETAIL_TEXT']; ?>
    </div>
</div>