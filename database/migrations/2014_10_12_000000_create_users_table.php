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
            $table->string('email');
            $table->string('password');
            $table->string('FirstName');
            $table->string('LastName');
            $table->string('Phone');
            $table->string('MobilePhone');
            $table->string('OS');
            $table->integer('Admin');
            $table->string('type');
            $table->string('level');
            $table->timestamps();
            $table->primary("Email");
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
