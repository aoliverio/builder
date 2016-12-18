<?php
use Migrations\AbstractSeed;

/**
 * Tasks seed.
 */
class TasksSeed extends AbstractSeed
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
                'name' => 'All',
                'route' => '/',
                'description' => 'Access at application root',
                'created' => '2016-03-27 15:15:36',
                'modified' => '2016-03-29 07:53:34',
            ],
        ];

        $table = $this->table('tasks');
        $table->insert($data)->save();
    }
}
