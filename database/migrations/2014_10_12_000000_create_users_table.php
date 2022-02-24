<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('profile_pic')->nullable();
            $table->string('cv')->nullable();
            $table->date('dob')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('website')->nullable();
            $table->string('instagram')->nullable();
            $table->string('type_of_artist')->nullable();
            $table->text('address_work')->nullable();
            $table->string('country', 100)->nullable();
            $table->string('password');
            $table->string('slug');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
