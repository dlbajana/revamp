<?php

use Faker\Generator as Faker;

$factory->define(App\Corporate::class, function (Faker $faker) {
    $name = $faker->unique()->company;
    $address = $faker->randomElement(App\Address::where('region_id', 'NCR')
                        ->orWhere('region_id', '4A')
                        ->get()
                        ->toArray());

    return [
        'name' => $name,
        'card_name' => $name,
        'industry' => $faker->randomElement(App\Industry::all()->toArray())['name'],
        'account_type' => $faker->randomElement(['corporate', 'group', 'corporate', 'individual']),
        'philhealth_no' => $faker->numerify('###############'),
        'acceptance_age' => 0,
        'termination_age' => $faker->randomElement([55, 60, 65, 70, 75]),
        'benefit_layer' => $faker->randomElement(['1st layer', '2nd layer']),
        'status' => $faker->randomElement(['pending', 'extended', 'active', 'expired', 'terminated', 'suspended']),
        'date_effectivity_from' => $faker->dateTimeThisDecade($max = 'now', $timezone = null),
        'date_effectivity_to' => $faker->dateTimeThisDecade($max = 'now', $timezone = null),
        'effectivity_period' => $faker->randomElement([6, 12]),
        'date_expiry' => $faker->dateTimeThisDecade($max = 'now', $timezone = null),
        'co_brand' => $faker->randomElement([1, 0]),
        'business_address' => $faker->streetAddress,
        'business_address_region_id' => $address['region_id'],
        'business_address_province_id' => $address['province_id'],
        'business_address_city_id' => $address['city_id'],
        'business_address_baranggay_id' => $address['baranggay_id'],
        'billing_address' => $faker->streetAddress,
        'billing_address_region_id' => $address['region_id'],
        'billing_address_province_id' => $address['province_id'],
        'billing_address_city_id' => $address['city_id'],
        'billing_address_baranggay_id' => $address['baranggay_id'],
        'billing_due_date' => $faker->dateTimeThisDecade($max = 'now', $timezone = null),
        'auto_deduct' => $faker->randomElement([0, 1]),
        'contact_person_name' => $faker->name,
        'contact_person_designation' => 'Engineer',
        'contact_person_telephone_no' => $faker->numerify('#######'),
        'contact_person_fax_no' => $faker->numerify('#######'),
        'hr_email' => $faker->email,
        'tin' => $faker->numerify('#########'),
        'withheld' => $faker->randomElement([0, 1]),
        'representative_name' => $faker->name,
        'representative_tin' => $faker->numerify('#############'),
        'representative_position' => 'Human Resource Personnel',
        'revolving_fund' => $faker->randomFloat($nbMaxDecimals = 2, $min = 200000, $max = 1000000),
        'utilized_amount' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1000000),
        'stale_amount' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 10000),
        'first_warning' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 10000),
        'threshold' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 400000),
        'remaining_fund' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 700000),
        'admin_fee' => $faker->randomFloat($nbMaxDecimals = 2, $min = 3, $max = 15),
        'payment_setup' => $faker->randomElement(['blanket', 'non-blanket']),
        'created_by' => 1,
    ];
});
