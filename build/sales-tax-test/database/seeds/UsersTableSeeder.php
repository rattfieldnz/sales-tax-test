<?php

use App\Models\User;
use Illuminate\Database\Seeder;

/**
 * Class UsersTableSeeder
 *
 * @author Rob Attfield <emailme@robertattfield.com> <http://www.robertattfield.com>
 */
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // We only want to seed a test user in a local environment.
        if(config('app.env') == 'local') {
            $user = new User(
                [
                'name' => "Sales Tax Test Admin",
                'email' => "admin@salestaxtest.com",
                'password' => bcrypt("P@ssw0rd55")
                ]
            );
            $user->save();

            $this->command->info("Seeded test user: name => " . $user->name . ", email => " . $user->email);
        }

    }
}
