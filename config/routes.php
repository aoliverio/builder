<?php

use Cake\Routing\Router;

/**
 * 
 */
Router::plugin('Builder', function ($routes) {
    $routes->fallbacks('InflectedRoute');
});

/**
 * Display home by default
 */
Router::scope('/', function ($routes) {
    $routes->connect('/builder', ['plugin' => 'Builder', 'controller' => 'Pages', 'action' => 'view', 'dashboard']);
    $routes->connect('/Builder', ['plugin' => 'Builder', 'controller' => 'Pages', 'action' => 'view', 'dashboard']);
});
