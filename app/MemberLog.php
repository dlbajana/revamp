<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Member;

class MemberLog extends Model
{
    protected $table = 'member_logs';
    protected $guarded = [];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }
}
