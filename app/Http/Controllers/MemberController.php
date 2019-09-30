<?php

namespace App\Http\Controllers;

use App\Designation;
use App\Role;
use App\RoleUser;
use App\User;
use App\Member;
use DB;
use Illuminate\Http\Request;
use PDF;
use Session;
use App\Branch;
use App\Department;

class MemberController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
    public function index(Request $request)
     {
	
			$members = Member::query()
			->orderBy('id', 'ASC')
			->get()
			->toArray();
	
		return view('administrator.member.manage_members', compact('members'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		
		
		return view('administrator.member.add_members');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
        $member = new Member;
        if (!empty($request->email)) {

			$email = $request->email;
		}
		else
		{
			$full_name = $request->full_name;
			
			$mail = "@mail.com";
			$email = $full_name.$mail; 
		}

		$member->full_name = $request->get('full_name');
		$member->email = $email;
		$member->phone = $request->get('phone');
		
		$member->gender = $request->get('gender');
		
		$member->address =  $request->get('address');
		
		if (!empty(request()->profile_picture)) {
			
			$profile_picture = time() . '.' . request()->profile_picture->getClientOriginalExtension();
			$member->profile_picture = $profile_picture;
			request()->profile_picture->move(public_path('public/profile_picture'), $profile_picture);
		} else {
			$profile_picture = $request->get('profile_picture');
		}
        
        $format_string = "GYM/";
		$last_id = Member::all()->last()->id;
        $current_id = $last_id+1;
        $membership_id = $format_string.$current_id;
        $member->membership_id = $membership_id;
        $member->created_by = auth()->user()->id;
        $result = $member->save(); 
		return redirect('/members')->with('message', 'Add successfully.');
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
	public function show($id) {
		//$member_type = User::find($id)->toArray();
		$member = Member::where('id', $id)
			->first();
		$created_by = User::where('id', $member->created_by)
			->select('id', 'name')
			->first();
		
		return view('administrator.member.show_member', compact('member', 'created_by'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$member = Member::find($id)->toArray();

	
		return view('administrator.member.edit_member', compact('member'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$member = Member::find($id);



		if (!empty($request->email)) {

			$email = $request->email;
		}
		else
		{
			$full_name = $request->full_name;
			
			$mail = "@mail.com";
			$email = $full_name.$mail; 
		}

		$member->full_name = $request->get('full_name');
		$member->email = $email;
		$member->phone = $request->get('phone');
		
		$member->gender = $request->get('gender');
		
		$member->address = $request->get('address');
		
		if (!empty(request()->profile_picture)) {
			
			$profile_picture = time() . '.' . request()->profile_picture->getClientOriginalExtension();
			$member->profile_picture = $profile_picture;
			request()->profile_picture->move(public_path('public/profile_picture'), $profile_picture);
		} else {
			$profile_picture = $request->get('profile_picture');
        }
        $member->save();
		return redirect('/members')->with('message', 'Updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$affected_row = Member::where('id', $id)
			->update(['deletion_status' => 1]);

		$deleted_row = Member::find($id);	
		$deleted_row->delete();	

		if (!empty($affected_row)) {
			return redirect('/members')->with('message', 'Delete successfully.');
		}
		return redirect('/members')->with('exception', 'Operation failed !');
	}



}
