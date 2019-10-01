<?php

namespace App;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
	protected $fillable=['name','display_name','description'];

	public function permission()
    {
        return $this->belongsTo('App\Permission','role_id');
    }
}