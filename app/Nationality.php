<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nationality extends Model
{
    protected $table = 'nationalities';
    protected $guarded = [];
    public $timestamps = false;
}
