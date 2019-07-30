<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceProviderSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_provider_sub_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('service_provider_id')->unsigned();
            $table->integer('sub_category_id')->unsigned();
            $table->timestamps();
        
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
        Schema::dropIfExists('service_provider_sub_categories');
    }
}
