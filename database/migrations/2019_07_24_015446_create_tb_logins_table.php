<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbLoginsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_logins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('foto');
            $table->string('nama');
            $table->integer('cabang');
            $table->string('jabatan');
            $table->string('email',100)->unique();
            $table->string('password');            
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
        Schema::dropIfExists('tb_logins');
    }
}
