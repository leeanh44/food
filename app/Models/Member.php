<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Member extends Model
{
    protected $table = 'members';
    protected $fillable = ['user_id', 'fullname', 'avatar', 'gender', 'phone', 'address'];
    public function user()
	{
	    return $this->belongsTo(User::class);
	}
}
