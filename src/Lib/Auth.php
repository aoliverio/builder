<?php

namespace Builder\Lib;

use Cake\Network\Request;
use Cake\ORM\TableRegistry;

/**
 * 
 */
class Auth {

    /**
     * Builder isAuthorized()
     * 
     * @param type $user_id
     * @param Request $request
     * @return boolean
     */
    public static function isAuthorized($user_id, Request $request) {
        return true;
    }

}
