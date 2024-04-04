<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitf23edb42c89f02ec3cbd882b0a8ee5fc
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

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInitf23edb42c89f02ec3cbd882b0a8ee5fc', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitf23edb42c89f02ec3cbd882b0a8ee5fc', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitf23edb42c89f02ec3cbd882b0a8ee5fc::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
