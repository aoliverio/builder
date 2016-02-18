<?php

namespace Builder\Controller;

use App\Controller\AppController as BaseController;

/**
 * 
 */
class AppController extends BaseController {

    /**
     * Print version
     */
    public function version() {
        echo 'release 1.0.2';
    }

}
