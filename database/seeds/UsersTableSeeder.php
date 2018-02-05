<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'role_id' => 1,
            'first_name' => 'Daniel',
            'middle_name' => 'Laid',
            'last_name' => 'Bajana',
            'email' => 'it.danielbajana@gmail.com',
            'mobile_no' => '09493265231',
            'username' => 'admin',
            'password' => bcrypt('password'),
            'status' => 'active',
        ]);
        factory(App\User::class, 30)->create();
    }
}
