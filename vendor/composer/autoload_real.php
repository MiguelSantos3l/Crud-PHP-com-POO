<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit79081838ee15e6b96418b8f20ed7e810
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit79081838ee15e6b96418b8f20ed7e810', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit79081838ee15e6b96418b8f20ed7e810', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit79081838ee15e6b96418b8f20ed7e810::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
