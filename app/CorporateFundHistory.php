<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Corporate;

class CorporateFundHistory extends Model
{
    protected $table = 'corporate_fund_histories';
    protected $guarded = [];

    public function corporate()
    {
        return $this->belongsTo(Corporate::class, 'corporate_id');
    }
}
