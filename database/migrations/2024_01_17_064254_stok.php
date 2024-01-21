<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Stok extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stok', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barang_id')
            ->nullable()
            ->constrained('barang')
            ->nullOnDelete();            
            $table->string('status');
            $table->integer('jumlah');
            $table->integer('total');
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
        Schema::dropIfExists('stok');
    }
}
