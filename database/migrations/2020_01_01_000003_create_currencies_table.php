<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('symbol', 3)->nullable();
            $table->string('name', 64);
            $table->string('iso_code', 3)->nullable();
            $table->enum('position', ['left', 'right']);
            $table->decimal('exchange_rate', 9, 2);
            $table->boolean('is_active')->default(0);
            $table->boolean('show_decimals')->default(0);
            $table->boolean('auto_update')->default(0);
            $table->timestamps();

            $table->unique(['iso_code', 'symbol'], 'lang_unique');
            $table->index('is_active', 'state');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('currencies');
    }
}
