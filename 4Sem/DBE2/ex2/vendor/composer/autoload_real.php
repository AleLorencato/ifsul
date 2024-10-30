<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit42195d9eb458b96291e6a4c2c9c2e31c
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

        spl_autoload_register(array('ComposerAutoloaderInit42195d9eb458b96291e6a4c2c9c2e31c', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit42195d9eb458b96291e6a4c2c9c2e31c', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit42195d9eb458b96291e6a4c2c9c2e31c::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}