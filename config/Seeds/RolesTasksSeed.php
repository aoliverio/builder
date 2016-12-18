<?php
use Migrations\AbstractSeed;

/**
 * RolesTasks seed.
 */
class RolesTasksSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'role_id' => '1',
                'task_id' => '1',
            ],
        ];

        $table = $this->table('roles_tasks');
        $table->insert($data)->save();
    }
}
