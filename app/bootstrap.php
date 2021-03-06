<?php
$loader = require __DIR__ . '/../vendor/autoload.php';

// create application
$app = new Silex\Application();

$config = json_decode(str_replace('{$baseDir}', realpath(__DIR__ . '/..'), file_get_contents('../config/development.json')),TRUE);

if ($config['debug'] == TRUE) {
    $app['debug'] = TRUE;
}

$fluxApi = new FluxAPI\Api($app,$config);

$app->match('/',function() {
    return 'Welcome to the PHP-FluxAPI';
});