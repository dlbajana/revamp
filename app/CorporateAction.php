<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Corporate;

class CorporateAction extends Model
{
    protected $table = 'corporate_actions';
    protected $guarded = [];

    protected $dates = [
        'created_at',
        'updated_at',
        'effectivity_date',
    ];

    protected $casts = [
        'effective_immediately' => 'boolean',
    ];

    public function corporate()
    {
        return $this->belongsTo(Corporate::class, 'corporate_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
