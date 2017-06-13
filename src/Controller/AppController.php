<?php

namespace Builder\Controller;

use Cake\Controller\Controller as BaseController;
use Cake\Core\Configure;

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
         * Set template theme
         */
        if (Configure::check('Builder.theme'))
            $this->viewBuilder()->theme(Configure::read('Builder.theme'));

        /**
         * Load required components
         */
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        /**
         * Use cake Auth component
         */
        if (Configure::check('Builder.use_default_auth')):
            $this->loadComponent('Auth', \Builder\Lib\Auth::getDefaultSettings());
            $this->set('UserLoggedInfo', $this->Auth->user());
            $this->Auth->allow(['']);
        endif;
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
