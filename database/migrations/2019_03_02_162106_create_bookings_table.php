<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->unsigned();
            $table->integer('service_provider_id')->unsigned();
            $table->integer('sub_category_id')->unsigned();
            $table->float('rank')->nullable();
            $table->string('comment',500)->nullable();
            $table->timestamps();

             $table->foreign('client_id')->references('id')->on('clients')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('service_provider_id')->references('id')->on('service_providers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
