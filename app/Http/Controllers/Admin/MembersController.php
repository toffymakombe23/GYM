<?php

namespace App\Http\Controllers\Admin;

use App\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MembersController extends Controller
{


	/**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function index(Request $request)
	{
		$members = Member::all();
		if ($request->input('date_from')<>'' && $request->input('date_to')<>'')
						    {
			$start = date("Y-m-d",strtotime($request->input('date_from')));
			$end = date("Y-m-d",strtotime($request->input('date_to')."+1 day"));
			$members->whereBetween('created_at',[$start,$end]);
		}
		
		return view('admin.members.index', compact('members'));
	}
	
	
	
	/**
	* Display a listing of the resource.
	  *
	  * @return \Illuminate\Http\Response
	                        */
	public function search(Request $request)
	{
		$members = Member::all();
		if ($request->input('date_from')<>'' && $request->input('date_to')<>'')
		    {
			$start = date("Y-m-d",strtotime($request->input('date_from')));
			$end = date("Y-m-d",strtotime($request->input('date_to')."+1 day"));
			$members->whereBetween('created_at',[$start,$end]);
		}
		
		
		return view('admin.members.index', compact('members'));
	}
		
	/**
	* Show the form for creating a new resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function create()
	{		
		$items = array('items' =>  DB::table('member_subscription_type')->get());		
		return view('admin.members.create', $items);
	}
	
	/**
	* Store a newly created resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @return \Illuminate\Http\Response
	*/
	public function store(Request $request)
	{
		/*$this->validate($request, [
			'first_name' => 'required',
			'last_name' => 'required',
			'email' => 'required',
			'address_one' => 'required',
			'city' => 'required',
			'county' => 'required',
			'country' => 'required',
			'postcode' => 'required',
			'member_subscription_type_id'  => 'required'
			]);*/
		
		
		// 	Create POST		
		$dateOfBirth = str_replace("-", "", $request->date_of_birth);
		$request['date_of_birth'] = Carbon::parse($dateOfBirth)->format('Y-m-d');
		$request['member_subscription_type_id'] = $request->member_subscription_type;
		$request['member_status_id'] = 1;
		
		\App\Member::create($request->all());		
		return redirect()->route('admin.members.index');
	}
	
	
	/**
	* Display the specified resource.
	*
	* @param  \App\Member  $member
	* @return \Illuminate\Http\Response
	*/
	public function show(Member $member)
	{
		//
	}
		
	/**
	* Show the form for editing the specified resource.
	*
	* @param  \App\Member  $member
	* @return \Illuminate\Http\Response
	*/
	public function edit($id)
	{
	
		$member = DB::table('members')
			->where('members.id', $id)
			->join('member_subscription_type', 'member_subscription_type.id', '=', 'members.member_subscription_type_id')
			->select('members.id','members.first_name', 'members.last_name','members.email','members.date_of_birth','members.telephone', 'members.address_one','members.address_two','members.address_three','members.city','members.county','members.country','members.postcode', 'members.member_subscription_type_id','member_subscription_type.id','member_subscription_type.name')
			->first();
		
		return view('admin.members.edit')->with('member', $member);
	}
	
	/**
	* Update the specified resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @param  \App\Member  $member
	* @return \Illuminate\Http\Response
	*/
	public function update(Request $request, Member $member)
	{
		
		$member->update($request->all());
		return redirect()->route('admin.members.index');
	}
	
	/**
	* Remove the specified resource from storage.
	*
	* @param  \App\Member  $member
	* @return \Illuminate\Http\Response
	*/
	public function destroy(Member $member)
	{
		//
	}
}
