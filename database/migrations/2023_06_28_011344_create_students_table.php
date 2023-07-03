<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('students', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->string('email')->unique(); // không được trùng email
			$table->string('address')->nullable(); // trả về null nếu không có giá trị
			$table->integer('status')->default(1); // giá trị mặc định là 1
			$table->date('date_of_birth');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('students');
	}
};
