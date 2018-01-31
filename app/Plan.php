<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Corporate;
use App\PlanCoverage;

class Plan extends Model
{
    protected $table = 'plans';
    protected $guarded = [];

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
}
