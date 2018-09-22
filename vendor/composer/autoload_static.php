<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf03abc1060fc8f622f92f5fedeb23be9
{
    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'Dotenv\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Dotenv\\' => 
        array (
            0 => __DIR__ . '/..' . '/vlucas/phpdotenv/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf03abc1060fc8f622f92f5fedeb23be9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf03abc1060fc8f622f92f5fedeb23be9::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}