<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5aa5773c81791f62d48b6dcbef411dad
{
    public static $prefixesPsr0 = array (
        'p' => 
        array (
            'phpQuery' => 
            array (
                0 => __DIR__ . '/..' . '/coderockr/php-query/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInit5aa5773c81791f62d48b6dcbef411dad::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
