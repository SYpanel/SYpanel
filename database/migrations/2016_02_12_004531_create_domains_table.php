<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domains', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account_id')->unsigned()->nullable();
            $table->foreign('account_id')->references('id')->on('accounts');
            $table->string('tld');
            $table->string('name');
            $table->integer('type');
            $table->boolean('is_primary');
            $table->integer('disk_space')->default(0);
            $table->integer('bandwidth')->default(0);
            $table->integer('emails')->default(0);
            $table->integer('dbs')->default(0);
            $table->integer('sub_domains')->default(0);
            $table->integer('parked_domains')->default(0);
            $table->integer('addon_domains')->default(0);
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
        Schema::drop('domains');
    }
}
