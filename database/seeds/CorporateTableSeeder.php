<?php

use Illuminate\Database\Seeder;
use App\Corporate;

class CorporateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Corporate::class, 34)->create()->each(function ($corporate) {
            $corporate->corporateLogs()->create([
                'title' => 'Create Corporate Record',
                'remarks' => ' *** System Generated Record',
            ]);

            $corporate->debitFund($corporate->revolving_fund, 'Initial Revolving Fund');
        });
    }
}
