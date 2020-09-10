<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->id();
            $table->string('original_name', 32);
            $table->string('name', 32);
            $table->string('iso_code', 2);
            $table->string('language_code', 5);
            $table->boolean('is_active')->default(0);
            $table->string('date_format', 16);
            $table->string('date_format_full', 16);

            $table->index(['is_active', 'iso_code'], 'active_lang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('languages');
    }
}
