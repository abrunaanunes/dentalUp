<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit249d8b721e7d893cfabbb218159852c6
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'Whoops\\' => 7,
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 8,
            'Pecee\\' => 6,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Whoops\\' => 
        array (
            0 => __DIR__ . '/..' . '/filp/whoops/src/Whoops',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Pecee\\' => 
        array (
            0 => __DIR__ . '/..' . '/pecee/simple-router/src/Pecee',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'app\\Controllers\\Controller' => __DIR__ . '/../..' . '/app/Controllers/Controller.php',
        'app\\Controllers\\DashboardController' => __DIR__ . '/../..' . '/app/Controllers/DashboardController.php',
        'app\\Controllers\\FrontController' => __DIR__ . '/../..' . '/app/Controllers/FrontController.php',
        'app\\Controllers\\UserController' => __DIR__ . '/../..' . '/app/Controllers/UserController.php',
        'app\\Helpers\\Render' => __DIR__ . '/../..' . '/app/Helpers/Render.php',
        'app\\Helpers\\Request' => __DIR__ . '/../..' . '/app/Helpers/Request.php',
        'app\\Models\\Product' => __DIR__ . '/../..' . '/app/Models/Model.php',
        'app\\Models\\User' => __DIR__ . '/../..' . '/app/Models/User.php',
        'database\\Connection' => __DIR__ . '/../..' . '/database/Connection.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit249d8b721e7d893cfabbb218159852c6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit249d8b721e7d893cfabbb218159852c6::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit249d8b721e7d893cfabbb218159852c6::$classMap;

        }, null, ClassLoader::class);
    }
}
