<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd3ae2e7911d721040e3b33788a1798ec
{
    public static $prefixLengthsPsr4 = array (
        'i' => 
        array (
            'ishop\\' => 6,
        ),
        'e' => 
        array (
            'error404\\' => 9,
        ),
        'a' => 
        array (
            'app\\' => 4,
        ),
        'R' => 
        array (
            'RedBeanPHP\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'ishop\\' => 
        array (
            0 => __DIR__ . '/..' . '/ishop/core',
        ),
        'error404\\' => 
        array (
            0 => '/public/errors/web404_1',
        ),
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
        'RedBeanPHP\\' => 
        array (
            0 => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd3ae2e7911d721040e3b33788a1798ec::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd3ae2e7911d721040e3b33788a1798ec::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd3ae2e7911d721040e3b33788a1798ec::$classMap;

        }, null, ClassLoader::class);
    }
}
