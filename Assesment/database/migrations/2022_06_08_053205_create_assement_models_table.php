<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assement_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('category_name');
            $table->string('brand_name');
            $table->text('description');
            $table->text('image');
            $table->integer('status')->default('1')->comment('1 For Active 2 for inActive');
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
        Schema::dropIfExists('assement_models');
    }
};
