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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('vehicle_name');
            $table->string('brand_name');
            $table->string('color');
            $table->string('mileage');
            $table->string('image');
            $table->string('transmission_type');
            $table->string('seat');
            $table->string('vehicle_number');
            $table->string('status')->comment('unavailable,available')->default('available');
            $table->string('fuel_type');
            $table->string('vehicle_description');
            $table->string('document_required');
            $table->double('cost_per_hour', 2);
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
        Schema::dropIfExists('vehicles');
    }
};
