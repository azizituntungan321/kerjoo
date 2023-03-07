<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_cuti', function (Blueprint $table) {
            $table->id();
            $table->string('id_user');
            $table->date('tanggal');
            $table->integer('jumlah_hari');
            $table->text('alasan')->nullable();
            $table->integer('cuti_belum_dipakai');
            $table->integer('cuti_sudah_dipakai');
            $table->string('status')->default('N')->nullable();
            $table->text('ket')->nullable();
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
        Schema::dropIfExists('cuti');
    }
};
