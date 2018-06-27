<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('content');
            $table->integer('status_id')->unsigned()->nullable();
            $table->integer('author_id')->unsigned()->nullable();
            $table->integer('post_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('status_id')
            ->references('id')
            ->on('comment_statuses')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            $table->foreign('author_id')
            ->references('id')
            ->on('users')
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
        Schema::dropIfExists('comments');
    }
}
