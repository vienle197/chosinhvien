<?php
return [
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'enableStrictParsing' => false,
    'suffix' => '',
    'rules' => [
        '' => 'home/index',
        'index.html' => 'home/index',
        'cart/<type:\w*>' => 'home/cart',
        'cart' => 'home/cart',
        'cart.html' => 'home/cart',
        'checkout.html' => 'home/checkout',
    ]
];
