<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRorganisasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_organisasi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('kader_pkk_id')->nullable(true);
            $table->string('tahun_mulai')->nullable(true);
            $table->string('tahun_selesai')->nullable(true);
            $table->string('nama_organisasi')->nullable(true);
            $table->string('jabatan')->nullable(true);
            $table->string('kota')->nullable(true);
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
        Schema::dropIfExists('riwayat_organisasi');
    }
}
