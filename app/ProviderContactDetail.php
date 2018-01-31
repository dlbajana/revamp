<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Provider;

class ProviderContactDetail extends Model
{
    protected $table = 'provider_contact_details';
    protected $guarded = [];

    public function provider()
    {
        return $this->belongsTo(Provider::class, 'provider_id');
    }
}
