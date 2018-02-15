<?php

use Illuminate\Database\Seeder;

class ProvidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Provider::class, 25)->create()->each(function ($u) {
            $u->providerLogs()->create([
                'title' => 'Create Provider Record',
                'remarks' => '*** System Generated Record',
            ]);
        });
    }
}
