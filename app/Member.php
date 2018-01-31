<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Member extends Model
{
    protected $table = 'members';
    protected $guarded = [];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by')
    }

    public function principal()
    {
        return $this->belongsTo(Member::class, 'principal_id');
    }

    public function dependents()
    {
        return $this->hasMany(Member::class, 'principal_id');
    }
}
