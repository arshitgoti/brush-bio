<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserExhibitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_exhibitions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('exhibition_name', 100)->nullable();
            $table->string('gallery_name', 100)->nullable();
            $table->string('website', 100)->nullable();
            $table->string('type', 100)->comment('upcoming, past');
            $table->text('address')->nullable();
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
        Schema::dropIfExists('user_exhibitions');
    }
}
