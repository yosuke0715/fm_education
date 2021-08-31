<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progress', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('css_1')->default(0);
            $table->integer('css_2')->default(0);
            $table->integer('css_3')->default(0);
            $table->integer('css_4')->default(0);
            $table->integer('css_5')->default(0);
            $table->integer('css_6')->default(0);
            $table->integer('css_7')->default(0);
            $table->integer('css_8')->default(0);
            $table->integer('css_9')->default(0);
            $table->integer('css_10')->default(0);
            $table->integer('js_1')->default(0);
            $table->integer('js_2')->default(0);
            $table->integer('js_3')->default(0);
            $table->integer('js_4')->default(0);
            $table->integer('js_5')->default(0);
            $table->integer('js_6')->default(0);
            $table->integer('js_7')->default(0);
            $table->integer('js_8')->default(0);
            $table->integer('js_9')->default(0);
            $table->integer('js_10')->default(0);
            $table->integer('jquery_1')->default(0);
            $table->integer('php_1')->default(0);
            $table->integer('php_2')->default(0);
            $table->integer('php_3')->default(0);
            $table->integer('php_4')->default(0);
            $table->integer('php_5')->default(0);
            $table->integer('php_6')->default(0);
            $table->integer('php_7')->default(0);
            $table->integer('php_8')->default(0);
            $table->integer('php_9')->default(0);
            $table->integer('php_10')->default(0);
            $table->integer('laravel_1')->default(0);
            $table->integer('copo_id')->nullable();
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
        Schema::dropIfExists('progress');
    }
}
