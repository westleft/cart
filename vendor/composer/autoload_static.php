<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8bc07935c1adda7545c670bf2fcae5d1
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8bc07935c1adda7545c670bf2fcae5d1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8bc07935c1adda7545c670bf2fcae5d1::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit8bc07935c1adda7545c670bf2fcae5d1::$classMap;

        }, null, ClassLoader::class);
    }
}
