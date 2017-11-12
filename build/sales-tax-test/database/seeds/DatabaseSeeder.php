<?php

use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder
 *
 * @author Rob Attfield <emailme@robertattfield.com> <http://www.robertattfield.com>
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(InputOneSeeder::class);
        $this->call(InputTwoSeeder::class);
        $this->call(InputThreeSeeder::class);
    }
}
