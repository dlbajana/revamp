<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Plan;

class PlanCoverage extends Model
{
    protected $table = 'plan_coverages';
    protected $guarded = [];

    public $timestamps = false;

    public function plan()
    {
        return $this->belongsTo(Plan::class, 'plan_id');
    }
}
