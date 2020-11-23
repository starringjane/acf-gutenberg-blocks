<?php

$finder = PhpCsFixer\Finder::create()
    ->notPath('vendor')
    ->in(__DIR__)
    ->name('*.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true)
;

return PhpCsFixer\Config::create()
    ->setRules([
        '@PSR2' => true,
        // addtional rules
        'no_unused_imports' => true,
        'single_import_per_statement' => true,
        'single_line_after_imports' => true,
        'ordered_imports' => [
            'sort_algorithm' => 'length',
        ],
        'single_blank_line_before_namespace' => true,
        'no_whitespace_in_blank_line' => true,
        'no_whitespace_before_comma_in_array' => true,
        'blank_line_before_return' => true,
        'function_typehint_space' => true,
        'trim_array_spaces' => true,
        'array_syntax' => [
            'syntax' => 'short'
        ],
        'multiline_whitespace_before_semicolons' => [
            'strategy' => 'new_line_for_chained_calls',
        ],
        'braces' => [
            'allow_single_line_closure' => true,
        ],
    ])
    ->setFinder($finder)
;
