<?php

$jsLibraries = [
    'fancybox' => [
        'js'  => '/bitrix/js/prominado.bootstrap/fancybox/jquery.fancybox.min.js',
        'css' => '/bitrix/js/prominado.bootstrap/fancybox/jquery.fancybox.min.css',
        'rel' => ['jquery2']
    ],
    'bxslider' => [
        'js'  => '/bitrix/js/prominado.bootstrap/bxslider/jquery.bxslider.min.js',
        'css' => '/bitrix/js/prominado.bootstrap/bxslider/jquery.bxslider.min.css',
        'rel' => ['jquery2']
    ],
    'bulma'    => [
        'css' => '/bitrix/js/prominado.bootstrap/bulma/bulma.css'
    ],
    'owl'      => [
        'css' => '/bitrix/js/prominado.bootstrap/owl/assets/owl.carousel.css',
        'js'  => '/bitrix/js/prominado.bootstrap/owl/owl.carousel.min.js',
        'rel' => ['jquery2']
    ]
];

foreach ($jsLibraries as $ext => $paths) {
    \CJSCore::RegisterExt($ext, $paths);
}