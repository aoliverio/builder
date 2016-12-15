<?php

namespace Builder\Controller;

use Cake\Controller\Controller as BaseController;

/**
 * 
 */
class AppController extends BaseController {

    /**
     * 
     */
    public function initialize() {
        parent::initialize();

        /**
         * Load required components
         */
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        /**
         * Use cake Auth component
         */
        $this->loadComponent('Auth', \Builder\Lib\Auth::getDefaultSettings());

        /**
         * Allow only display action without sign in.
         */
        $this->Auth->allow(['display']);
    }

    /**
     * Implement authorized function using Builder Auth::isAuthorized
     */
    public function isAuthorized($user) {
        /**
         * Using Builder Auth to verify if user is authorized to access
         */
        return \Builder\Lib\Auth::isAuthorized($user['id'], $this->request);
    }

}
