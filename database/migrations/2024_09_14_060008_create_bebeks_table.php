<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBebeksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bebeks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('angkatan_id')->constrained('angkatans');
            $table->date('tanggal_masuk');
            $table->integer('jumlah_awal');
            $table->string('asal_bibit');
            $table->string('jenis_bebek');
            $table->integer('usia_masuk');
            $table->string('kandang');
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
        Schema::dropIfExists('bebeks');
    }
}
