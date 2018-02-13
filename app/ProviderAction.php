<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Provider;


class ProviderAction extends Model
{
    protected $table = 'provider_actions';
    protected $guarded = [];

    protected $dates = [
        'created_at',
        'updated_at',
        'effectivity_date',
    ];

    protected $casts = [
        'effective_immediately' => 'boolean',
    ];

    public function provider()
    {
        return $this->belongsTo(Provider::class, 'provider_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
