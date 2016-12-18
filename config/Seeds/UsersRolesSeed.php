<?php
use Migrations\AbstractSeed;

/**
 * UsersRoles seed.
 */
class UsersRolesSeed extends AbstractSeed
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
                'user_id' => '1',
                'role_id' => '1',
            ],
        ];

        $table = $this->table('users_roles');
        $table->insert($data)->save();
    }
}
