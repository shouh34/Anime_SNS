<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('Email');
            $table->string('Password');
            $table->string('name');
            $table->string('comment');
            $table->rememberToken();
            $table->timestamps();
        });


        Schema::create('imgbbs', function (Blueprint $table) {
            $table->id();
            $table->string('Thread');
            $table->string('Creater');
            $table->string('text');
            $table->rememberToken();
            $table->timestamps();
        });


        Schema::create('imgbbs_coment', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->string('Comment');
            $table->string('Comment_data');
            $table->string('flg');
            $table->string('bbs_flg');
            $table->string('reply_no');
            $table->string('Good_no');
            $table->string('Bad_no');
            $table->timestamps();
        });




        Schema::create('AnimeViewlist', function (Blueprint $table) {
            $table->id();
            $table->string('Title');
            $table->string('Name');
            $table->string('year');
            $table->string('Season');
            $table->timestamps();
        });



        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
        Schema::dropIfExists('imgbbs_coment');
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('imgbbs');
    }
};
