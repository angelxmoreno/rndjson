<?php

use Phalcon\Mvc\Application;

error_reporting(E_ALL);

define('DS', DIRECTORY_SEPARATOR);
define('ROOT_PATH', realpath('..') . DS);
define('APP_PATH', ROOT_PATH . 'app' . DS);
define('CONFIG_PATH', ROOT_PATH . 'config' . DS);
define('VENDOR_PATH', ROOT_PATH . 'vendor' . DS);
define('MODULE_PATH', APP_PATH . 'Modules' . DS);


try {
    /**
     * Include AutoLoaders
     */
    require CONFIG_PATH . 'loaders.php';

    /**
     * Read the configuration
     */
    $config = include CONFIG_PATH . 'config.php';

    /**
     * Include services
     */
    require CONFIG_PATH . 'services.php';

    /**
     * Handle the request
     */
    $application = new Application($di);

    /**
     * Include modules
     */
    require CONFIG_PATH . 'modules.php';

    /**
     * Include routes
     */
    require CONFIG_PATH . 'routes.php';

    $handler = $application->handle();
    $content = $handler->getContent();
    echo $content;

} catch (\Exception $e) {
    echo $e->getMessage() . '<br>';
    echo '<pre>' . $e->getTraceAsString() . '</pre>';
}
