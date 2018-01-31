<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CorporateLog;

class Corporate extends Model
{
    protected $table = 'corporates';
    protected $guarded = [];

    public function corporateLogs()
    {
        return $this->hasMany(CorporateLog::class, 'corpoate_id');
    }
}
