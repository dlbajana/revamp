<?php

use Faker\Generator as Faker;

$factory->define(App\Provider::class, function (Faker $faker) {
    $name = $faker->unique()->company;
    $address = $faker->randomElement(App\Address::where('region_id', 'NCR')->orWhere('region_id', '4A')->get()->toArray());
    return [
        'name' => $name,
        'licensed_name' => $name,
        'business_type' => $faker->randomElement(['hospital', 'clinic']),
        'phic_accreditation_from' => $faker->dateTimeThisDecade($max = 'now', $timezone = null),
        'phic_accreditation_to' => $faker->dateTimeThisDecade($max = 'now', $timezone = null),
        'accreditation_status' => $faker->randomElement(['accredited', 'disaccredited', 'non-accredited']),
        'payment_terms' => $faker->randomElement([15, 7, 3, 1]),
        'submission_of_claims' => $faker->randomElement([7, 15, 30, 60, 90]),
        'status' => $faker->randomElement(['active', 'inactive']),
        'address' => $faker->streetAddress,
        'address_region_id' => $address['region_id'],
        'address_province_id' => $address['province_id'],
        'address_city_id' => $address['city_id'],
        'address_baranggay_id' => $address['baranggay_id'],
        'created_by' => 1,
    ];
});
