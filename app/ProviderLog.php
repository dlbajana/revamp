<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Provider;

class ProviderLog extends Model
{
    protected $table = 'provider_logs';
    protected $guarded = [];

    public function provider()
    {
        return $this->belongsTo(Provider::class, 'provider_id');
    }
}
