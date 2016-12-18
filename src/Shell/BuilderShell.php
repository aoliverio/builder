<?php

namespace Builder\Shell;

use Cake\Console\Shell;

/**
 * 
 */
class BuilderShell extends Shell {

    /**
     * 
     */
    public function main() {
        $this->out('Welcome to Builder Console v1.1.x');
        $this->hr();
    }

    /**
     * 
     * @param type $database
     */
    public function setup($database = 'default') {
        $this->out('Install Builder database: ' . $database);
        $this->hr();

        /**
         * Create database
         */
        $this->dispatchShell('migrations migrate -p Builder');

        /**
         * Insert data
         */
        $this->dispatchShell('migrations seed --seed UsersSeed --plugin Builder');
        $this->dispatchShell('migrations seed --seed RolesSeed --plugin Builder');
        $this->dispatchShell('migrations seed --seed TasksSeed --plugin Builder');
        $this->dispatchShell('migrations seed --seed UsersRolesSeed --plugin Builder');
        $this->dispatchShell('migrations seed --seed RolesTasksSeed --plugin Builder');
    }

}
