<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('region_id');
            $table->foreign('region_id')
                ->references('id')
                ->on('regions')
                ->onDelete('cascade');
            $table->json('name');
            $table->decimal('longitude', 10, 8);
            $table->decimal('latitude', 11, 8);
            $table->boolean('is_active')->default(0);
            $table->boolean('is_capital')->default(0);
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            $table->index('is_active', 'state');
            $table->unique(['region_id', 'is_capital'], 'region_capital_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
