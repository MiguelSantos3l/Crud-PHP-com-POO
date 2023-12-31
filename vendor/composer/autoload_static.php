<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit79081838ee15e6b96418b8f20ed7e810
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit79081838ee15e6b96418b8f20ed7e810::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit79081838ee15e6b96418b8f20ed7e810::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit79081838ee15e6b96418b8f20ed7e810::$classMap;

        }, null, ClassLoader::class);
    }
}
