<?php

use Illuminate\Database\Seeder;
use App\Corporate;
use Carbon\Carbon;

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
            $planName = ['Diamond', 'Platinum', 'Gold', 'Silver', 'Bronze'];

            $faker = Faker\Factory::create();
            $carbon = new Carbon();
            $corporate->corporateLogs()->create([
                'title' => 'Create Corporate Record',
                'remarks' => ' *** System Generated Record',
            ]);

            $corporate->debitFund($corporate->revolving_fund, 'Initial Revolving Fund');

            for ($i=0; $i < $faker->numberBetween(1, 5); $i++) {
                $plan = $corporate->plans()->create([
                    'name' => $planName[$i],
                    'type' => $faker->randomElement(['principal', 'depdent', 'both']),
                    'limit' => $faker->randomElement(['abl only', 'mbl only', 'mbl and abl']),
                    'intervening_period' => $faker->numberBetween(0, 10),
                    'shared_limit' => $faker->randomElement([0, 1]),
                    'cover_preexisting' => $faker->randomElement([0, 1]),
                    'status' => 'active',
                    'copay_company' => 0.1,
                    'copay_member' => 0,
                    'start_date' => Carbon::now(),
                    'end_date' => Carbon::now()->addYear(),
                    'covered_dreaded_diseases' => $faker->paragraph(),
                    'exclusions' => $faker->sentence(),
                    'created_by' => 1,
                ]);

                $outpatient = $faker->randomElement([1, 0]);
                $maternity = $faker->randomElement([1, 0]);
                $reimbursement = $faker->randomElement([1, 0]);

                $plan->planCoverage()->create([
                    'inpatient' => $faker->randomElement([1, 0]),

                    'outpatient' => $outpatient,
                    'op_basic_consultation' => ($outpatient == 1) ? $faker->randomElement([1, 0]) : 0,
                    'op_referral_to_specialist' => ($outpatient == 1) ? $faker->randomElement([1, 0]) : 0,
                    'op_laboratory' => ($outpatient == 1) ? $faker->randomElement([1, 0]) : 0,
                    'op_opd_or' => ($outpatient == 1) ? $faker->randomElement([1, 0]) : 0,
                    'op_facility_fee' => ($outpatient == 1) ? $faker->randomElement([1, 0]) : 0,
                    'op_clinic_setting' => ($outpatient == 1) ? $faker->randomElement([1, 0]) : 0,

                    'annual_physical_exam' => $faker->randomElement([1, 0]),
                    'emergency' => $faker->randomElement([1, 0]),

                    'maternity' => $maternity,
                    'maternity_pre_and_post_natal' => ($maternity == 1) ? $faker->randomElement([1, 0]) : 0,
                    'maternity_laboratory' => ($maternity == 1) ? $faker->randomElement([1, 0]) : 0,
                    'maternity_delivery' => ($maternity == 1) ? $faker->randomElement([1, 0]) : 0,

                    'reimbursement' => $reimbursement,
                    'inpatient' => ($reimbursement == 1) ? $faker->randomElement([1, 0]) : 0,
                    'inpatient' => ($reimbursement == 1) ? $faker->randomElement([1, 0]) : 0,
                ]);

                $ipMaxLimitBasic = $faker->randomFloat(2, 2500, 180000);
                $ipMaxLimitMajor = $faker->randomFloat(2, 2500, 180000);

                $opMaxLimitBasic = $faker->randomFloat(2, 2500, 180000);
                $opMaxLimitMajor = $faker->randomFloat(2, 2500, 180000);

                $maternityMaxLimitBasic = $faker->randomFloat(2, 2500, 180000);
                $maternityMaxLimitMajor = $faker->randomFloat(2, 2500, 180000);

                $apeMaxLimitBasic = $faker->randomFloat(2, 2500, 180000);
                $apeMaxLimitMajor = $faker->randomFloat(2, 2500, 180000);

                $plan->planBenefitLimit()->create([
                    'ip_max_limit_basic' => $ipMaxLimitBasic,
                    'ip_max_limit_major' => $ipMaxLimitMajor,
                    'ip_room_board_basic' => $faker->randomFloat(2, 0, $ipMaxLimitBasic),
                    'ip_room_board_major' => $faker->randomFloat(2, 0, $ipMaxLimitMajor),
                    'ip_hospital_services_basic' => $faker->randomFloat(2, 0, $ipMaxLimitBasic),
                    'ip_hospital_services_major' => $faker->randomFloat(2, 0, $ipMaxLimitMajor),
                    'ip_surgical_fee_basic' => $faker->randomFloat(2, 0, $ipMaxLimitBasic),
                    'ip_surgical_fee_major' => $faker->randomFloat(2, 0, $ipMaxLimitBasic),
                    'ip_physician_fee_basic' => $faker->randomFloat(2, 0, $ipMaxLimitMajor),
                    'ip_physician_fee_major' => $faker->randomFloat(2, 0, $ipMaxLimitMajor),
                    'ip_nurse_fee_basic' => $faker->randomFloat(2, 0, $ipMaxLimitMajor),
                    'ip_nurse_fee_major' => $faker->randomFloat(2, 0, $ipMaxLimitMajor),
                    'ip_opd_or_basic' => $faker->randomFloat(2, 0, $ipMaxLimitMajor),
                    'ip_opd_or_major' => $faker->randomFloat(2, 0, $ipMaxLimitMajor),
                    'ip_ecu_basic' => $faker->randomFloat(2, 0, $ipMaxLimitMajor),
                    'ip_ecu_major' => $faker->randomFloat(2, 0, $ipMaxLimitMajor),
                    'ip_anesthesiologist_rate_basic' => $faker->randomFloat(2, 0, 0.50),
                    'ip_anesthesiologist_rate_major' => $faker->randomFloat(2, 0, 0.50),


                    'op_max_limit_basic' => $opMaxLimitBasic,
                    'op_max_limit_major' => $opMaxLimitMajor,
                    'op_basic_consultation_basic' => $faker->randomFloat(2, 0, $opMaxLimitBasic),
                    'op_basic_consultation_major' => $faker->randomFloat(2, 0, $opMaxLimitMajor),
                    'op_laboratory_basic' => $faker->randomFloat(2, 0, $opMaxLimitBasic),
                    'op_laboratory_major' => $faker->randomFloat(2, 0, $opMaxLimitMajor),
                    'op_clinic_setting_basic' => $faker->randomFloat(2, 0, $opMaxLimitBasic),
                    'op_clinic_setting_major' => $faker->randomFloat(2, 0, $opMaxLimitMajor),
                    'op_emergency_basic' => $faker->randomFloat(2, 0, $opMaxLimitBasic),
                    'op_emergency_major' => $faker->randomFloat(2, 0, $opMaxLimitMajor),
                    'op_medicine_basic' => $faker->randomFloat(2, 0, $opMaxLimitBasic),
                    'op_medicine_major' => $faker->randomFloat(2, 0, $opMaxLimitMajor),

                    'op_total_number_of_visit' => $faker->randomDigit(),

                    'maternity_max_limit_basic' => $maternityMaxLimitBasic,
                    'maternity_max_limit_major' => $maternityMaxLimitMajor,
                    'maternity_normal_delivery_basic' => $faker->randomFloat(2, 0, $maternityMaxLimitBasic),
                    'maternity_normal_delivery_major' => $faker->randomFloat(2, 0, $maternityMaxLimitMajor),
                    'maternity_cesarian_section_basic' => $faker->randomFloat(2, 0, $maternityMaxLimitBasic),
                    'maternity_cesarian_section_major' => $faker->randomFloat(2, 0, $maternityMaxLimitMajor),
                    'maternity_home_delivery_basic' => $faker->randomFloat(2, 0, $maternityMaxLimitBasic),
                    'maternity_home_delivery_major' => $faker->randomFloat(2, 0, $maternityMaxLimitMajor),
                    'maternity_miscarriage_basic' => $faker->randomFloat(2, 0, $maternityMaxLimitBasic),
                    'maternity_miscarriage_major' => $faker->randomFloat(2, 0, $maternityMaxLimitMajor),
                    'maternity_complication_basic' => $faker->randomFloat(2, 0, $maternityMaxLimitBasic),
                    'maternity_complication_major' => $faker->randomFloat(2, 0, $maternityMaxLimitMajor),
                    'maternity_nursery_basic' => $faker->randomFloat(2, 0, $maternityMaxLimitBasic),
                    'maternity_nursery_major' => $faker->randomFloat(2, 0, $maternityMaxLimitMajor),
                    'maternity_pre_post_natal_basic' => $faker->randomFloat(2, 0, $maternityMaxLimitBasic),
                    'maternity_pre_post_natal_major' => $faker->randomFloat(2, 0, $maternityMaxLimitMajor),

                    'ape_max_limit_basic' => $apeMaxLimitBasic,
                    'ape_max_limit_major' => $apeMaxLimitMajor,
                ]);
            }
        });
    }
}
