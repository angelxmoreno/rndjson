<?php

/**
 * Register application modules
 */
$application->registerModules([
    'Frontend' => [
        'className' => 'RndJson\Frontend\Module',
        'path' => MODULE_PATH . 'Frontend/Module.php'
    ]
]);
