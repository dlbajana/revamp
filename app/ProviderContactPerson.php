<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Provider;

class ProviderContactPerson extends Model
{
    protected $table = 'provider_contact_persons';
    protected $guarded = [];

    public function provider()
    {
        return $this->belongsTo(Provider::class, 'provider_id');
    }
}
