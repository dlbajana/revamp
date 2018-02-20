<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;
use App\Provider;
use App\Physician;

class PhysicianProvider extends Pivot
{
    protected $table = 'physician_provider';
    protected $guarded = [];

    public function provider()
    {
        return $this->belongsTo(Provider::class, 'provider_id');
    }

    public function physician()
    {
        return $this->belongsTo(Physician::class, 'physician_id');
    }
}
