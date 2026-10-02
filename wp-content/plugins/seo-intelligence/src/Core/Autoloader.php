<?php

declare(strict_types=1);

namespace SeoIntelligence\Core;

/**
 * Lightweight, zero-dependency PSR-4 compliant autoloader.
 * Enables the plugin to operate immediately on any standard WordPress installation
 * without requiring Composer CLI in runtime.
 */
final class Autoloader
{
    /**
     * Namespace prefix.
     */
    private const PREFIX = 'SeoIntelligence\\';

    /**
     * Register autoloader with SPL stack.
     */
    public static function register(): void
    {
        spl_autoload_register([self::class, 'load']);
    }

    /**
     * Loads the class file for a given class name.
     *
     * @param string $class Fully qualified class name.
     */
    public static function load(string $class): void
    {
        // Does the class use our namespace prefix?
        $len = strlen(self::PREFIX);
        if (strncmp(self::PREFIX, $class, $len) !== 0) {
            return;
        }

        // Relative class name
        $relativeClass = substr($class, $len);

        // Replace namespace separators with directory separators and append .php
        $file = dirname(__DIR__) . '/' . str_replace('\\', '/', $relativeClass) . '.php';

        if (file_exists($file)) {
            require_once $file;
        }
    }
}
