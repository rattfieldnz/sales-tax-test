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
                'name' => config('app.user_name'),
                'email' => config('app.user_email'),
                'password' => bcrypt(config('app.user_password'))
                ]
            );
            $user->save();

            $this->command->info("Seeded test user: name => " . $user->name . ", email => " . $user->email);
        }

    }
}
