<?php

namespace App;

use App\Models\PermissionRole;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{

	use Notifiable;
	// use SoftDeletes;
	// use EntrustUserTrait;

	use SoftDeletes, EntrustUserTrait {
		SoftDeletes::restore as soft_delete_restore;
		EntrustUserTrait::restore as entrust_restore;
	}
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'created_by', 'name', 'father_name', 'email', 'password', 'present_address', 'date_of_birth', 'profile_picture', 'access_label', 'activation_status', 'deletion_status', 'role', 'profile_picture', 'tin',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	// protected $hidden = [
	// 	'password', 'remember_token',
	// ];

	public function restore()
	{
		$this->restoreA();
		$this->restoreB();
	}
	public function name()
	{
		$name = $this->name;
		$last_name = $this->father_name;
		$full_name = $name . ' ' . $last_name;
		return $full_name;
	}

	public function full_name()
	{
		$name = $this->name;
		$last_name = $this->father_name;
		$gf_name = $this->grand_father_name;
		$fam_name = $name . ' ' . $last_name . ' ' . $gf_name;
		return $fam_name;
	}

	public function hasPermissionTo($permission_name)
	{

		$permission = Permission::where('name', $permission_name)->first();

		
		$permission_role = PermissionRole::where('role_id', $this->role)->where('permission_id', $permission->id)->first();

		if($permission_role){
			return true;
		}
		else{
			return false;
		}
		// foreach ($permission_roles as $permission_role) {

		// 	$permission = Permission::find($permission_role->permission_id);
		// 	if ($permission->name == $permission_name) {
		// 		return true;
		// 	} else {
		// 		return false;
		// 	}
		// }
	}
}
