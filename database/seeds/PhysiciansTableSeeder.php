<?php

use Illuminate\Database\Seeder;
use App\Physician;

class PhysiciansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Physician::class, 120)->create()->each(function ($u) {
            $u->physicianLogs()->create([
                'title' => 'Create Physician Record',
                'remarks' => '*** System Generated Record',
            ]);
        });
    }
}
