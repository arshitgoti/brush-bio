<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSocialUrlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_social_urls', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('facebook', 100)->nullable();
            $table->boolean('facebook_is_featured')->nullable();
            $table->string('twitter', 100)->nullable();
            $table->boolean('twitter_is_featured')->default(0);
            $table->string('linkedin', 100)->nullable();
            $table->boolean('linkedin_is_featured')->default(0);
            $table->string('instagram', 100)->nullable();
            $table->boolean('instagram_is_featured')->default(0);
            $table->string('snapchat', 100)->nullable();
            $table->boolean('snapchat_is_featured')->default(0);
            $table->string('youtube', 100)->nullable();
            $table->boolean('youtube_is_featured')->default(0);
            $table->string('behance', 100)->nullable();
            $table->boolean('behance_is_featured')->default(0);
            $table->string('whatsapp', 100)->nullable();
            $table->boolean('whatsapp_is_featured')->default(0);
            $table->string('skype', 100)->nullable();
            $table->boolean('skype_is_featured')->default(0);
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
        Schema::dropIfExists('user_social_urls');
    }
}
