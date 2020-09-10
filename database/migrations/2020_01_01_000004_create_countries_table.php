<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->string('iso_code', 2);
            $table->unsignedSmallInteger('call_prefix');
            $table->boolean('is_active')->default(0);
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            $table->index('is_active', 'state');
            $table->unique('iso_code', 'iso_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
}
