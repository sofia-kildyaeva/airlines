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
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fromCity_id')->references('id')->on('cities');
            $table->foreignId('toCity_id')->references('id')->on('cities');
            $table->date('date_from');
            $table->time('time_from');
            $table->date('date_to');
            $table->time('time_to');
            $table->time('time_way');
            $table->float('percent_price')->default(0);
            $table->foreignIdFor(\App\Models\Air::class)->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('status')->default('готов');
            $table->foreignId('fromAirport_id')->references('id')->on('airports');
            $table->foreignId('toAirport_id')->references('id')->on('airports');
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
        Schema::dropIfExists('flights');
    }
};
