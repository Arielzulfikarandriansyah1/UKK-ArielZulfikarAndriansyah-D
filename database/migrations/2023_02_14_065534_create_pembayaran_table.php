<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->string('id_petugas');
            $table->string('nis');
            $table->string('nama');
            $table->string('id_kelas');
            $table->string('id_rayon');
            $table->date('tgl_bayar');
            $table->string('id_spp');
            $table->string('jumlah_bulan');
            $table->string('tunggakan_bulan');
            $table->string('jumlah_dibayar');
            $table->string('bulan');
            $table->string('total_tunggakan');
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
        Schema::dropIfExists('pembayaran');
    }
}
