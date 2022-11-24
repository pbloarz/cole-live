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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->integer('number');
            $table->integer('beds');
            $table->integer('formiture');
            $table->string('services');
            $table->string('image');
            $table->enum('status',['enabled','desabled'])->default('enabled');
            $table->foreignId('prices_id')->constrained();
            $table->foreignId('hotels_id')->constrained();
            $table->foreignId('users_id')-> constrained();
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
        Schema::dropIfExists('rooms');
    }
};
