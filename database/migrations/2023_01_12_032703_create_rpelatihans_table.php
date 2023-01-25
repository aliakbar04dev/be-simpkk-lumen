<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRpelatihansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_pelatihan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('kader_pkk_id')->nullable(true);
            $table->string('tahun')->nullable(true);
            $table->string('nama_pelatihan')->nullable(true);
            $table->string('kriteria_kader')->nullable(true);
            $table->string('penyelenggara')->nullable(true);
            $table->text('deskripsi')->nullable(true);
            $table->string('created_by')->nullable(true);
            $table->string('updated_by')->nullable(true);
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable(true);
            $table->string('deleted_by')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('riwayat_pelatihan');
    }
}
