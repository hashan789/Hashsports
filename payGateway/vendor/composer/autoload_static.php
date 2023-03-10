<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit80125e6c12fd61abcd064225fbb5168b
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit80125e6c12fd61abcd064225fbb5168b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit80125e6c12fd61abcd064225fbb5168b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit80125e6c12fd61abcd064225fbb5168b::$classMap;

        }, null, ClassLoader::class);
    }
}
