<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Corporate;

class CorporateLog extends Model
{
    protected $table = 'corporate_logs';
    protected $guarded = [];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function corporate()
    {
        return $this->belongsTo(Corporate::class, 'corporate_id');
    }
}
