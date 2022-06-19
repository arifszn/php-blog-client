<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__ . '/src')
    ->in(__DIR__ . '/tests')
    ->name('*.php');

$config = new PhpCsFixer\Config();

return $config->setRules([
    '@PSR12' => true,
    'trailing_comma_in_multiline' => true,
])->setFinder($finder);
