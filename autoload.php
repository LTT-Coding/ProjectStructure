<?php
$rootDir = __DIR__ . '\\';

$autoload = function($className) use($rootDir) {   
    $fileName = '';
    
    if ($lastNameSpacePosition = strpos($className, '\\')) {
        $namespace = substr($className, 0, $lastNameSpacePosition);
        $className = substr($className, $lastNameSpacePosition + 1);
        $fileName = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className);
    $path = str_replace('\\', '/', $rootDir . $fileName . '.php');

    if (is_file($path)) {
        require_once $path;
    }
};

spl_autoload_register($autoload);

$bundleDir = __DIR__ . '\\bundle';

$bundleAutoload = function($className) use($bundleDir) {   
    $fileName = '';
    
    if ($lastNameSpacePosition = strpos($className, '\\')) {
        $namespace = substr($className, 0, $lastNameSpacePosition);
        $className = substr($className, $lastNameSpacePosition + 1);
        $fileName = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className);
    $path = str_replace('\\', '/', $bundleDir . $fileName . '.php');

    if (is_file($path)) {
        require_once $path;
    }
};

spl_autoload_register($bundleAutoload);