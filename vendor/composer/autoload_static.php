<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit536cad54cb9f1fd08779a77dac948e2e
{
    public static $files = array (
        'd9be239054fcf2389d574edc4ee8860d' => __DIR__ . '/../..' . '/includes/functions.php',
        'dfaacb6c2b5f9f5596cc5fd6336f1af5' => __DIR__ . '/../..' . '/includes/BsOptions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'B' => 
        array (
            'Basic\\Slider\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Basic\\Slider\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit536cad54cb9f1fd08779a77dac948e2e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit536cad54cb9f1fd08779a77dac948e2e::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
