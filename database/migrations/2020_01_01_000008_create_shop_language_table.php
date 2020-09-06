<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopLanguageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_language', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shop_id');
            $table->foreign('shop_id')
                ->references('id')
                ->on('shops')
                ->onDelete('cascade');
            $table->unsignedBigInteger('language_id');
            $table->foreign('language_id')
                ->references('id')
                ->on('languages')
                ->onDelete('cascade');
            $table->smallInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(0);
            $table->boolean('is_default')->default(0);

            $table->unique(['shop_id', 'language_id'], 'shop_lang_unique');
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
        Schema::dropIfExists('shop_language');
    }
}
