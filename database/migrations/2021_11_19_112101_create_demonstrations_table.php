<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemonstrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demonstrations', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->integer('user_id');
            $table->integer('zone_id');
            $table->string('place');
            $table->integer('crop_id');
            $table->double('crop_size');
            $table->integer('product_id');
            $table->string('farmer');
            $table->string('farmer_contact');
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
        Schema::dropIfExists('demonstrations');
    }
}
