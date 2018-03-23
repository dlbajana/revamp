<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Plan;

class PlanCoverage extends Model
{
    protected $table = 'plan_coverages';
    protected $guarded = [];

    protected $casts = [
        'inpatient' => 'boolean',
        'outpatient' => 'boolean',

        'op_basic_consultation' => 'boolean',
        'op_referral_to_specialist' => 'boolean',
        'op_laboratory' => 'boolean',
        'op_opd_or' => 'boolean',
        'op_facility_fee' => 'boolean',
        'op_clinic_setting' => 'boolean',

        'annual_physical_exam' => 'boolean',
        'emergency' => 'boolean',

        'maternity' => 'boolean',
        'maternity_pre_and_post_natal' => 'boolean',
        'maternity_laboratory' => 'boolean',
        'maternity_delivery' => 'boolean',

        'reimbursement' => 'boolean',
        'reimbursement_inpatient' => 'boolean',
        'reimbursement_outpatient' => 'boolean',
    ];

    public $timestamps = false;

    public function plan()
    {
        return $this->belongsTo(Plan::class, 'plan_id');
    }
}
