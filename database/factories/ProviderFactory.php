<?php

use Faker\Generator as Faker;

$factory->define(App\Provider::class, function (Faker $faker) {
    $name = $faker->unique()->company;
    return [
        'name' => $name,
        'licensed_name' => $name,
        'business_type' => $faker->randomElement(['hospital', 'clinic']),
        'phic_accreditation_from' => $faker->dateTimeThisDecade($max = 'now', $timezone = null),
        'phic_accreditation_to' => $faker->dateTimeThisDecade($max = 'now', $timezone = null),
        'accreditation_status' => $faker->randomElement(['accredited', 'disaccredited', 'non-accredited']),
        'payment_terms' => $faker->randomElement([15, 7, 5, 3, 24]),
        'submission_of_claims' => $faker->randomElement([7, 15, 30, 60, 90]),
        'status' => $faker->randomElement(['active', 'inactive']),
        'address' => $faker->address,
        'created_by' => 1,
    ];
});
