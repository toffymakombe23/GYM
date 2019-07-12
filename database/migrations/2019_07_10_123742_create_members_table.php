<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
	
	
	
	
	
	
	/**
	* Run the migrations.
						     *
						     * @return void
						     */
						    public function up()
						    {
		Schema::create('members', function (Blueprint $table) {
			$table->increments('id');
			$table->string('first_name', 100);
			$table->string('last_name', 100);
			$table->string('email', 250);
			$table->date('date_of_birth')->nullable();
			$table->string('telephone', 50)->nullable();
			$table->string('address_one', 100);
			$table->string('address_two', 100)->nullable();
			$table->string('address_three', 100)->nullable();
			$table->string('city', 100);
			$table->string('county', 100);
			$table->string('country', 100);
			$table->string('postcode', 50);
			$table->integer('member_subscription_type_id')->unsigned();
			$table->integer('member_status_id')->unsigned();
			$table->timestamps();
		}
		);
	}
	
	
	
	
	
	
	
	/**
	* Reverse the migrations.
						     *
						     * @return void
						     */
						    public function down()
						    {
		Schema::dropIfExists('members');
	}
}
