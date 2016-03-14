<?php
use Cake\Routing\Router;

Router::plugin('Builder', function ($routes) {
    $routes->fallbacks('InflectedRoute');
});
