<?php

use Faker\Generator as Faker;

$factory->define(App\Physician::class, function (Faker $faker) {
    $nationalities = App\Nationality::all();
    $specialization = $faker->randomElement(App\Specialization::all()->toArray());
    $address = App\Address::where('region_id', 'NCR')->orWhere('region_id', '4A')->get()->toArray();
    $homeAddress = $faker->randomElement($address);
    $provincialAddress = $faker->randomElement($address);

    return [
        'first_name' => $faker->firstName,
        'middle_name' => $faker->lastName,
        'last_name' => $faker->lastName,
        'mothers_maiden_name' => $faker->name('female'),
        'nationality' => $faker->randomElement($nationalities->toArray())['name'],
        'birthday' => $faker->dateTimeThisDecade(),
        'civil_status' => $faker->randomElement(['single', 'married', 'divorced']),
        'gender' => $faker->randomElement(['male', 'female']),
        'specialization_id' => $specialization['specialization_id'],
        'subspecialization_id' => $specialization['subspecialization_id'],
        'accreditation_status' => $faker->randomElement(['accredited', 'non-accredited', 'disaccredited']),
        'status' => $faker->randomElement(['active', 'inactive']),
        'suspected_fraud' => $faker->randomElement([0, 1]),
        'telephone_no' => $faker->numerify('#######'),
        'mobile_no' => $faker->numerify('09#########'),
        'email' => $faker->email,
        'home_address' => $faker->streetAddress,
        'home_address_region_id' => $homeAddress['region_id'],
        'home_address_province_id' => $homeAddress['province_id'],
        'home_address_city_id' => $homeAddress['city_id'],
        'home_address_baranggay_id' => $homeAddress['baranggay_id'],
        'provincial_address' => $faker->streetAddress,
        'provincial_address_region_id' => $provincialAddress['region_id'],
        'provincial_address_province_id' => $provincialAddress['province_id'],
        'provincial_address_city_id' => $provincialAddress['city_id'],
        'provincial_address_baranggay_id' => $provincialAddress['baranggay_id'],
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
