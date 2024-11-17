<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatatanHariansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catatan_harians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('angkatan_id')->constrained()->onDelete('cascade');
            $table->date('tanggal');
            $table->string('kegiatan');
            $table->string('kondisi_bebek');
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('catatan_harians');
    }
}
