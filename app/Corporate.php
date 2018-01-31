<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\CorporateLog;
use App\Plan;

class Corporate extends Model
{
    protected $table = 'corporates';
    protected $guarded = [];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function corporateLogs()
    {
        return $this->hasMany(CorporateLog::class, 'corporate_id');
    }

    public function plans()
    {
        return $this->hasMany(Plan::class, 'corporate_id');
    }
}
