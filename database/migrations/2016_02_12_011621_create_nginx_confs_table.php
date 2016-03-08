<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNginxConfsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nginx_confs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ip');
            $table->string('port');
            $table->string('root');
            $table->string('index');
            $table->string('domain');
            $table->string('try_files');
            $table->string('php_socket');
            $table->boolean('ssl');
            $table->string('ssl_cert');
            $table->string('ssl_key');
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
        Schema::drop('nginx_confs');
    }
}
