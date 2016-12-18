<?php
use Migrations\AbstractSeed;

/**
 * Roles seed.
 */
class RolesSeed extends AbstractSeed
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
                'description' => 'System Administrator',
                'created' => '2016-03-27 15:14:27',
                'modified' => '2016-03-27 17:24:55',
            ],
        ];

        $table = $this->table('roles');
        $table->insert($data)->save();
    }
}
