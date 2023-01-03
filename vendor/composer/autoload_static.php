<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc02b7e113d8b623cfa992c5fb8ba4510
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc02b7e113d8b623cfa992c5fb8ba4510::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc02b7e113d8b623cfa992c5fb8ba4510::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc02b7e113d8b623cfa992c5fb8ba4510::$classMap;

        }, null, ClassLoader::class);
    }
}
