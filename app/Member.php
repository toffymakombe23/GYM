<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
	// 	Table name
			    protected $table = 'members';
	// 	Primary Key
			    // public $primaryKey = 'id';
	
	
	
	
	/**
	* The attributes that are mass assignable.
			     *
			     * @var array
			     */
			    protected $fillable = [
			        'first_name','last_name', 'email','date_of_birth','telephone','address_one','address_two','address_three','city','county','country','postcode','member_subscription_type_id','member_status_id',
			    ];
}
