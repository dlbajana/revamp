<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Physician;

class PhysicianLog extends Model
{
    protected $table = 'physician_logs';
    protected $guarded = [];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function physiican()
    {
        return $this->belongsTo(Physician::class, 'physician_id');
    }
}
