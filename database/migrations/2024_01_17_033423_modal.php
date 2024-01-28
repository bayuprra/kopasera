<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Modal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modal', function (Blueprint $table) {
            $table->id();
            $table->integer('uang_keluar');
            $table->integer('uang_masuk')->nullable();
            $table->boolean('status')->default(false);
            $table->date("created_at")->nullable();
            $table->date("updated_at")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modal');
    }
}
