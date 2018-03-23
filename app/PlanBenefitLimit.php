<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Plan;

class PlanBenefitLimit extends Model
{
    protected $table = 'plan_benefit_limits';
    protected $guarded = [];

    public $timestamps = false;

    public function plan()
    {
        return $this->belongsTo(Plan::class, 'plan_id');
    }
}
