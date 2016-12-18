<?php
use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
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
                'id' => '1',
                'name' => 'Administrator',
                'email' => 'admin@admin.com',
                'username' => 'admin',
                'password' => '$2y$10$VwqZLVzKMiP09q5BVMK6LueyGanfPMTCPs1vSJkAO6bbPRIdjll7a',
                'is_blocked' => '0',
                'created' => '2016-03-27 15:13:06',
                'modified' => '2016-03-27 18:52:12',
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
