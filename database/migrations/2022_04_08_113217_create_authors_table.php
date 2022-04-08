<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('auth_fname',191);
            $table->string('auth_lname',191);
            $table->date('auth_dob');
            $table->string('auth_gen',20);
            $table->text('auth_address');
            $table->bigInteger('auth_mobile');
            $table->text('auth_desc');
            $table->boolean('auth_status');
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
        Schema::dropIfExists('authors');
    }
}
