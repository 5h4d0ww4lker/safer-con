<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
		'created_by', 'membership_id', 'full_name', 'gender', 'email', 'phone', 'address', 'joining_date', 'deletion_status', 'profile_picture',
	];
}
