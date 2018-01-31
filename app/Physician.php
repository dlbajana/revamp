<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\PhysicianLog;

class Physician extends Model
{
    protected $table = 'physicians';
    protected $guarded = [];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function physicianLogs()
    {
        return $this->hasMany(PhysicianLog::class, 'physician_id');
    }
}
