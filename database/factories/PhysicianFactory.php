<?php

use Faker\Generator as Faker;

$factory->define(App\Physician::class, function (Faker $faker) {
    $nationalities = App\Nationality::all();
    $specialization = App\Specialization::all();

    return [
        'first_name' => $faker->firstName,
        'middle_name' => $faker->lastName,
        'last_name' => $faker->lastName,
        'mothers_maiden_name' => $faker->name('female'),
        'nationality' => $faker->randomElement($nationalities->toArray())['name'],
        'birthday' => $faker->dateTimeThisDecade(),
        'civil_status' => $faker->randomElement(['single', 'married', 'divorced']),
        'gender' => $faker->randomElement(['male', 'female']),
        'specialization' => $faker->randomElement($specialization->toArray())['specialization_name'],
        'sub_specialization' => $faker->randomElement($specialization->toArray())['subspecialization_name'],
        'accreditation_status' => $faker->randomElement(['accredited', 'non-accredited', 'disaccredited']),
        'status' => $faker->randomElement(['active', 'inactive']),
        'suspected_fraud' => $faker->randomElement([0, 1]),
        'telephone_no' => $faker->numerify('#######'),
        'mobile_no' => $faker->numerify('09#########'),
        'email' => $faker->email,
        'home_address' => $faker->address,
        'provincial_address' => $faker->address,
        'tin' => $faker->numerify('##########'),
        'sss_no' => $faker->numerify('##########'),
        'philhealth_no' => $faker->numerify('###########'),
        'phic_accreditation_from' => $faker->dateTimeThisDecade(),
        'phic_accreditation_to' => $faker->dateTimeThisDecade(),
        'prc_license_no' => $faker->numerify('################'),
        'prc_validity_date' => $faker->date,
        'created_by' => 1,
    ];
});
