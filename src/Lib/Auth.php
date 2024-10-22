<?php

namespace Builder\Lib;

use Cake\Network\Request;
use Cake\ORM\TableRegistry;

/**
 * 
 */
class Auth {

    /**
     * Define $defaultSettings
     *
     * @var type 
     */
    public static function getDefaultSettings() {

        return [
            'authorize' => 'Controller',
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginAction' => [
                'plugin' => 'builder',
                'controller' => 'users',
                'action' => 'login',
            ],
            'unauthorizedRedirect' => [
                'plugin' => 'builder',
                'controller' => 'pages',
                'action' => '401-authorization-required',
            ]
        ];
    }

    /**
     * Builder isAuthorized()
     * 
     * @param type $user_id
     * @param Request $request
     * @return boolean
     */
    public static function isAuthorized($user_id, Request $request) {

        /**
         * Authorize logout action for all authenticate user
         */
        if ($request->action === 'logout')
            return true;

        /**
         * Authorize login action for all authenticate user
         */
        if ($request->action === 'login')
            return true;

        /**
         * Authorize display action for all authenticate user
         */
        if ($request->action === 'display')
            return true;

        /**
         * Define $url_elements
         */
        $url_elements = explode('/', $request->url);

        /**
         * Find roles by $user_id
         */
        $usersTables = TableRegistry::get('Builder.Users');
        $query = $usersTables->find('all');
        $query->where(['id' => $user_id]);
        $query->contain(['Roles']);
        $roles = $query->first()->roles;

        /**
         * Define $userRolesId for passed $user_id
         */
        $userRolesId = [];
        foreach ($roles as $row)
            $userRolesId[$row->id] = true;

        /**
         * Find relative task in Builder.Tasks
         */
        $tasksTable = TableRegistry::get('Builder.Tasks');
        do {
            $route_target = '/' . implode('/', $url_elements);
            $query = $tasksTable->find('all');
            $query->where(['route' => $route_target]);
            $query->contain(['Roles']);
            $result = $query->first();

            /**
             * If user has roles authorized return true
             */
            if (count($result) > 0):
                foreach ($result->roles as $role):
                    if (array_key_exists($role->id, $userRolesId))
                        return true;
                endforeach;
            endif;

            /**
             * Remove the element off the end of array
             */
            array_pop($url_elements);
        } while ($route_target != '/');

        /**
         * Defualt value
         */
        return false;
    }

}
