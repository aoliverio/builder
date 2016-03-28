<?php
use Cake\Routing\Router;

Router::plugin('Builder', function ($routes) {
    $routes->fallbacks('InflectedRoute');
    
    /**
     * 
     */
    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);
});
