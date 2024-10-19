<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit8ff64791e1594aeb0b2f739d79c13d5b
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

        spl_autoload_register(array('ComposerAutoloaderInit8ff64791e1594aeb0b2f739d79c13d5b', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit8ff64791e1594aeb0b2f739d79c13d5b', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit8ff64791e1594aeb0b2f739d79c13d5b::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
