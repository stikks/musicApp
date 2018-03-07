<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAggregatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aggregators', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->integer('user_info_id')->unsigned();
            $table->text('bio')->nullable();
            $table->text('address');
            $table->text('cac_number');
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
        Schema::drop('aggregators');
    }
}
