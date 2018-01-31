<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Corporate;

class CorporateLog extends Model
{
    protected $table = 'corporate_logs';
    protected $guarded = [];

    public function corporate()
    {
        return $this->belongsTo(Corporate::class, 'corporate_id');
    }
}
