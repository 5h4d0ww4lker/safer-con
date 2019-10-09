<?php

namespace App\Http\Controllers;

use App\Address;
use App\Designation;
use App\Role;
use App\RoleUser;
use App\User;
use DB;
use Illuminate\Http\Request;
use PDF;
use Session;
use App\Branch;
use App\Department;
use App\Models\Credit;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SuperAdminController extends Controller
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{


		$super_admins = User::query()
			->where('role', '!=', 100)
			->where('role', '!=', 2)
			->orderBy('created_at', 'DESC')
			->get()
			->toArray();
		$label = 'Admins';
		return view('administrator.setting.super_admin.manage_super_admins', compact('super_admins', 'label'));
	}

	public function merchants(Request $request)
	{

		$super_admins = User::query()
			->where('role', 2)
			->orderBy('created_at', 'DESC')
			->get()
			->toArray();

		$label = 'Merchants';
		return view('administrator.setting.super_admin.manage_super_admins', compact('super_admins', 'label'));
	}

	public function users(Request $request)
	{

		$super_admins = User::query()
			
			->orderBy('created_at', 'DESC')
			->get()
			->toArray();

		$label = 'Users';
		return view('administrator.setting.super_admin.manage_super_admins', compact('super_admins', 'label'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$roles = Role::all();

		return view('administrator.setting.super_admin.add_super_admins', compact('roles'));
	}

	public function register_merchant()
	{

		$active = 'account';
		return view('main.landing.merchant_registration', compact('active'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$super_admin = new User;



		if (!empty($request->email)) {

			$email = $request->email;
		} else {
			$first_name = $request->name;
			$father_name = $request->father_name;
			$father_name = str_replace(' ', '', $father_name);
			$mail = "@mail.com";
			$email = $first_name . '.' . $father_name . $mail;
		}




		$super_admin->name = $request->get('name');
		$super_admin->father_name = $request->get('father_name');
		$super_admin->email = $email;
		$super_admin->phone_no = $request->get('phone_no');

		$super_admin->gender = $request->get('gender');

		$super_admin->address = 1;
		$super_admin->role = $request->get('role_id');
		$super_admin->activation_status = $request->get('activation_status');

		if (!empty(request()->profile_picture)) {

			$profile_picture = time() . '.' . request()->profile_picture->getClientOriginalExtension();
			$super_admin->profile_picture = $profile_picture;
			request()->profile_picture->move(public_path('public/profile_picture'), $profile_picture);
		} else {
			$profile_picture = $request->get('profile_picture');
		}


		$super_admin->access_label = 1;
		$super_admin->password =  bcrypt(12345678);
		$result = $super_admin->save();
		$user = User::where('id', $super_admin->id)->first();
		$attach_role = new RoleUser;
		$attach_role->user_id = $user->id;
		$attach_role->role_id = $request->get('role_id');
		$attach_role->save();

		return redirect('/setting/super_admins')->with('message', 'Add successfully.');
	}


	public function store_merchant(Request $request)
	{
		$address = new Address();
		$address->region = $request->get('region');
		$address->city = $request->get('city');

		$address->location = $request->get('location');
		$address->sub_city = $request->get('sub_city');
		$address->building = $request->get('building');
		$address->phone_number_1 = $request->get('phone_number_1');
		$address->save();
		$super_admin = new User;

		$super_admin->name = $request->get('name');
		$super_admin->father_name = $request->get('father_name');
		$super_admin->email = $request->get('email');
		$super_admin->phone_no = $request->get('phone_number_1');

		$super_admin->gender = $request->get('gender');
		$super_admin->address = $address->id;
		$super_admin->role = 2;
		$super_admin->access_label = 2;
		$super_admin->activation_status = 0;

		$pass = $request->get('password');
		$super_admin->password =  bcrypt($pass);
		$result = $super_admin->save();
		$user = User::where('id', $super_admin->id)->first();
		$attach_role = new RoleUser;
		$attach_role->user_id = $user->id;
		$attach_role->role_id = 2;
		$attach_role->save();

		$credit = new Credit();
		$credit->amount = 0;
		$credit->on_hold = 0;
		$credit->user_id = $user->id;
		$credit->created_by = $user->id;
		$credit->save();
		toast()->success('Hi ' . $request->get('name') . ', Your request has been recieved. We will contact you soon so you could start using the system. In the mean time your account will be inactive.');
		return redirect('/register_merchant');
	}

	public function storeCustomer(Request $request)
	{
		$super_admin = new User;
		$super_admin->name = $request->get('name');
		$super_admin->father_name = $request->get('father_name');
		$super_admin->email = $request->get('email');
		$super_admin->phone_no = $request->get('phone_no');

		$super_admin->gender = $request->get('gender');

		$super_admin->address = 1;
		$super_admin->role = 100;

		if (!empty(request()->profile_picture)) {

			$profile_picture = time() . '.' . request()->profile_picture->getClientOriginalExtension();
			$super_admin->profile_picture = $profile_picture;
			request()->profile_picture->move(public_path('public/profile_picture'), $profile_picture);
		} else {
			$profile_picture = $request->get('profile_picture');
		}


		$super_admin->access_label = 1;
		$super_admin->password =  bcrypt($request->get('gender'));
		die(print_r($super_admin));
		$result = $super_admin->save();


		return redirect('/vcvcc');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */




	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//$super_admin_type = User::find($id)->toArray();
		$super_admin = User::where('id', $id)
			->first();
		$created_by = User::where('id', $super_admin->created_by)
			->select('id', 'name')
			->first();

		return view('administrator.setting.super_admin.show_super_admin', compact('super_admin', 'created_by'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$super_admin = User::find($id)->toArray();

		$user_role = Role::where('id', $super_admin['role'])->get();


		$roles = Role::all();

		return view('administrator.setting.super_admin.edit_super_admin', compact('super_admin', 'roles', 'user_role'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$super_admin = User::find($id);



		if (!empty($request->email)) {

			$email = $request->email;
		} else {
			$first_name = $request->name;
			$father_name = $request->father_name;
			$father_name = str_replace(' ', '', $father_name);
			$mail = "@mail.com";
			$email = $first_name . '.' . $father_name . $mail;
		}




		$super_admin->name = $request->get('name');
		$super_admin->father_name = $request->get('father_name');

		$super_admin->email = $email;
		$super_admin->phone_no = $request->get('phone_no');

		$super_admin->gender = $request->get('gender');
		$super_admin->activation_status = $request->get('activation_status');




		$super_admin->access_label = 1;
		$super_admin->role =  $request->get('role_id');

		if ($request->get('role_id') != 2 && $request->get('role_id') != 100) {
			$url = '/setting/super_admins';
		}

		if ($request->get('role_id') == 2) {
			$url = '/setting/merchants';
		}

		if ($request->get('role_id') == 100) {
			$url = '/setting/users';
		} else {
			$url = '/setting/super_admins';
		}


		if (!empty(request()->profile_picture)) {

			$profile_picture = time() . '.' . request()->profile_picture->getClientOriginalExtension();
			$super_admin->profile_picture = $profile_picture;
			request()->profile_picture->move(public_path('public/profile_picture'), $profile_picture);
		} else {
			$profile_picture = $request->get('profile_picture');
		}




		$affected_row = $super_admin->save();

		DB::table('role_user')
			->where('user_id', $id)
			->update(['role_id' => $request->input('role_id')]);

		if (!empty($affected_row)) {
			return redirect($url)->with('message', 'Info update successfully.');
		}
		return redirect($url)->with('exception', 'Operation failed !');
	}


	public  function reset_password(Request $request)
	{
		$active = "account";
		if (!empty(Auth::user()->id)) {
			Auth::logout();
		}
		return view('administrator.login.reset_password', compact('active'));
	}

	public  function finalize_reset(Request $request)
	{
		$active = "account";
		if (!empty(Auth::user()->id)) {
			Auth::logout();
		}
		return view('administrator.login.finalize_reset', compact('active'));
	}

	public function complete_reset(Request $request)
	{
		$email = session()->get('pr_email');
		$user = User::where('email', $email)->where('role', '!=', 100)->first();
		$activation_key_from_db = $user->activation_key;

		$activation_key = $request->activation_key;
		$new_password = $request->new_password;
		$confirmation_password = $request->confirmation_password;


		if ($activation_key != $activation_key_from_db) {


			return redirect('/admin/finalize_reset')->with('exception', 'Incorrect Activation Key.');
		}
		if ($new_password != $confirmation_password) {


			return redirect('/admin/finalize_reset')->with('exception', 'Your password and password confirmation didnt match.');
		} else {
			$updated_password = bcrypt($new_password);

			$user->password = $updated_password;
			$user->save();

			return redirect('/admin')->with('message', 'You resetted your password successfully. Please login and continur with the new password.');
		}
	}
	public function send_reset_key(Request $request)
	{
		$email = $request->email;
		$user = User::where('email', $email)->where('role', '!=', 100)->first();
		if ($user) {
			$user->activation_key = rand(100000, 900000);
			$user->save();
			Session::put('pr_email', $email);
			try {
				Mail::send('emails.password_reset', ['request' => $user], function ($m) use ($user) {
					$m->from('no-reply@arganon.com', 'Arganon e-comerce');
					$m->to($user->email)->subject('Password Reset Request.');
				});
				return redirect('/admin/finalize_reset')->with('message', 'We have sent an activation key to ' . $email . 'Please enter the code we sent you so we could verify the request.');
			} catch (Exception $exception) {

				return redirect('/admin/finalize_reset')->with('error', 'Unable to send message');
			}
		}
		if (!$user) {
			return redirect('/admin/reset_password')->with('exception', 'We could not find a user account related with the given email. Please try again.');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$affected_row = User::where('id', $id)
			->update(['deletion_status' => 1]);

		$deleted_row = User::find($id);
		$deleted_row->delete();

		if (!empty($affected_row)) {
			return redirect('/setting/super_admins')->with('message', 'Delete successfully.');
		}
		return redirect('/setting/super_admins')->with('exception', 'Operation failed !');
	}
}
