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
            $table->string('username');
            $table->string('password');
            $table->string('address');
            $table->string('email')->unique();
            $table->string('date_of_birth');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('contact_number');
            $table->string('gender');
            $table->integer('role_id')->unsigned()->nullable();
            $table->integer('status_id')->unsigned()->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('role_id')
            ->references('id')
            ->on('roles')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            $table->foreign('status_id')
            ->references('id')
            ->on('accounts_statuses')
            ->onDelete('restrict')
            ->onUpdate('cascade');
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
