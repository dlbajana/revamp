<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ProviderContactDetail;
use App\ProviderLog;

class Provider extends Model
{
    protected $table = 'providers';
    protected $guarded = [];

    public function providerContactDetails()
    {
        return $this->hasMany(ProviderContactDetail::class, 'provider_id');
    }

    public function providerLogs()
    {
        return $this->hasMany(ProviderLog::class, 'provider_id');
    }
}
