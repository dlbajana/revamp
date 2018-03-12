<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ProvidersTableSeeder::class);
        $this->call(PhysiciansTableSeeder::class);
        $this->call(CorporateTableSeeder::class);
    }
}
