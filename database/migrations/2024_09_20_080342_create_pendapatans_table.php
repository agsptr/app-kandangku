<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendapatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendapatans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('angkatan_id')->constrained('angkatans');
            $table->date('tanggal');
            $table->integer('jumlah_terjual');
            $table->integer('berat_total');
            $table->integer('harga_per_kg');
            $table->integer('total_pendapatan');
            $table->string('pembeli');
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('pendapatans');
    }
}
