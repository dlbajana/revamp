<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\ProviderContactDetail;
use App\ProviderLog;

class Provider extends Model
{
    protected $table = 'providers';
    protected $guarded = [];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function providerContactDetails()
    {
        return $this->hasMany(ProviderContactDetail::class, 'provider_id');
    }

    public function providerLogs()
    {
        return $this->hasMany(ProviderLog::class, 'provider_id');
    }
}
