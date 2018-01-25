<?php

$jsLibraries = [
    'jquery3'   => [
        'js' => '/bitrix/js/prominado.bootstrap/jquery3/jquery-3.3.1.min.js',
    ],
    'fancybox'  => [
        'js'  => '/bitrix/js/prominado.bootstrap/fancybox/jquery.fancybox.min.js',
        'css' => '/bitrix/js/prominado.bootstrap/fancybox/jquery.fancybox.min.css',
        'rel' => ['jquery3']
    ],
    'bxslider'  => [
        'js'  => '/bitrix/js/prominado.bootstrap/bxslider/jquery.bxslider.min.js',
        'css' => '/bitrix/js/prominado.bootstrap/bxslider/jquery.bxslider.min.css',
        'rel' => ['jquery3']
    ],
    'bulma'     => [
        'css' => '/bitrix/js/prominado.bootstrap/bulma/bulma.css'
    ],
    'owl'       => [
        'css' => '/bitrix/js/prominado.bootstrap/owl/assets/owl.carousel.css',
        'js'  => '/bitrix/js/prominado.bootstrap/owl/owl.carousel.min.js',
        'rel' => ['jquery3']
    ],
    'inputmask' => [
        'js'  => '/bitrix/js/prominado.bootstrap/inputmask/jquery.maskedinput.min.js',
        'rel' => ['jquery3']
    ],
    'styler'    => [
        'css' => '/bitrix/js/prominado.bootstrap/styler/jquery.formstyler.css',
        'js'  => '/bitrix/js/prominado.bootstrap/styler/jquery.formstyler.min.js',
        'rel' => ['jquery3']
    ],
];

foreach ($jsLibraries as $ext => $paths) {
    \CJSCore::RegisterExt($ext, $paths);
}