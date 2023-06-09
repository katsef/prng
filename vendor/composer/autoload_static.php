<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitdff35cf38948dba89754edc7a5fb80d9
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'Webazon\\Prng\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Webazon\\Prng\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitdff35cf38948dba89754edc7a5fb80d9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitdff35cf38948dba89754edc7a5fb80d9::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitdff35cf38948dba89754edc7a5fb80d9::$classMap;

        }, null, ClassLoader::class);
    }
}
