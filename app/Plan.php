<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Corporate;
use App\PlanCoverage;
use App\PlanBenefitLimit;

class Plan extends Model
{
    protected $table = 'plans';
    protected $guarded = [];

    protected $dates = [
        'start_date',
        'end_date',
        'created_at',
        'update_at',
    ];

    protected $casts = [
        'shared_limit' => 'boolean',
        'cover_preexisting' => 'boolean',
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function corporate()
    {
        return $this->belongsTo(Corporate::class, 'corporate_id');
    }

    public function planCoverage()
    {
        return $this->hasOne(PlanCoverage::class, 'plan_id');
    }

    public function planBenefitLimit()
    {
        return $this->hasOne(PlanBenefitLimit::class, 'plan_id');
    }

}
