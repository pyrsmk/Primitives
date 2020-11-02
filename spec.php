<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

// Prepare PHP environment
ini_set('display_errors', '1');
error_reporting(E_ALL);
ini_set('log_errors', '0');
ini_set('assert.exception', '1');

// Enable Symfony debug tools
Symfony\Component\ErrorHandler\Debug::enable();
Symfony\Component\ErrorHandler\ErrorHandler::register();
Symfony\Component\ErrorHandler\DebugClassLoader::enable();

// Define Mockery global helpers
Mockery::globalHelpers();

// Require spec files
if (isset($argv[1])) {
    if (!file_exists($argv[1])) {
        echo "'$argv[1]' spec file not found!\n";
        exit(1);
    }
    require_once $argv[1];
} else {
    $iterator = new RegexIterator(
        new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator(__DIR__ . '/spec/files/')
        ),
        '/^.+\.php$/',
        RecursiveRegexIterator::GET_MATCH
    );
    foreach ($iterator as $matches) {
        require_once $matches[0];
    }
}

// Run Mockery expectations
Mockery::close();

// Still there?
echo "All good!\n";
