<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('image_url')->default('/img/user.svg')->nullable();
            $table->string('name', '50');
            $table->string('surname', '50');
            $table->string('email', '50')->unique();
            $table->string('password');
            $table->string('sex','1');
            $table->date('birthday');
            $table->text('bio')->nullable();
            $table->string('phone')->nullable();
            $table->string('email_token','30')->nullable();
            $table->boolean('active')->default(false);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
