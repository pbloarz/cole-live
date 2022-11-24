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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('email')->default();
            $table->string('celular');
            $table->dateTime('date_star');
            $table->dateTime('date_end');
            $table->integer('quantity_adults');
            $table->integer('quantity_children');
            $table->foreignId('rooms_id')->constrained();
            $table->foreignId('payments_id')->constrained();
            $table->foreignId('users_id')->constrained();


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
        Schema::dropIfExists('bookings');
    }
};
