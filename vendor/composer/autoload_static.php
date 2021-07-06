<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6869623390a9bf52697003f9e036df85
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'MySql\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'MySql\\' => 
        array (
            0 => __DIR__ . '/../..' . '/MySql',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'MySql\\MySqlCore\\ISqlGateway' => __DIR__ . '/../..' . '/MySql/MySqlCore/ISqlGateway.php',
        'MySql\\MySqlCore\\SqlApi' => __DIR__ . '/../..' . '/MySql/MySqlCore/SqlApi.php',
        'MySql\\MySqlCore\\SqlConnection' => __DIR__ . '/../..' . '/MySql/MySqlCore/SqlConnection.php',
        'MySql\\MySqlCore\\SqlGateway' => __DIR__ . '/../..' . '/MySql/MySqlCore/SqlGateway.php',
        'MySql\\RawModels\\Parent' => __DIR__ . '/../..' . '/MySql/RawModels/Parent.php',
        'MySql\\RawModels\\Student' => __DIR__ . '/../..' . '/MySql/RawModels/Student.php',
        'MySql\\RawModels\\StudentWithParents' => __DIR__ . '/../..' . '/MySql/RawModels/StudentWithParents.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6869623390a9bf52697003f9e036df85::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6869623390a9bf52697003f9e036df85::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit6869623390a9bf52697003f9e036df85::$classMap;

        }, null, ClassLoader::class);
    }
}