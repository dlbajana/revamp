<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Provider;

class PhysicianAction extends Model
{
    protected $table = 'physician_actions';
    protected $guarded = [];

    protected $dates = [
        'crated_at',
        'updated_at',
        'effectivity_date',
    ];

    protected $casts = [
        'effective_immediately' => 'boolean',
    ];

    public function physician()
    {
        return $this->belongsTo(Physician::class, 'physician_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
