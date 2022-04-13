<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keys', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('mobile')->nullable();
            $table->string('phonemodel')->nullable();
            $table->string('email')->nullable();
            $table->macAddress('macaddress')->nullable();
            $table->string('productKey');
            $table->string('validtill')->nullable();
            $table->integer('status')->nullable();
            $table->timestamps();
            $table->unique('macaddress');
            $table->unique('productKey');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keys');
    }
}