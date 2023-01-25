<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaderpkksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kader_pkk', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('full_name')->nullable(true);
            $table->string('no_kader')->nullable(true);
            $table->string('nik')->nullable(true);
            $table->string('tempat_lahir')->nullable(true);
            $table->date('tgl_lahir')->nullable(true);
            $table->string('agama')->nullable(true);
            $table->string('gender')->nullable(true);
            $table->string('alamat_ktp')->nullable(true);
            $table->string('alamat_domisili')->nullable(true);
            $table->string('no_hp')->nullable(true);
            $table->string('email')->nullable(true);
            $table->string('pendidikan')->nullable(true);
            $table->string('posisi')->nullable(true);
            $table->string('jabatan')->nullable(true);
            $table->string('sekretariat')->nullable(true);
            $table->string('bayar_apbd')->nullable(true);
            $table->string('norek')->nullable(true);
            $table->string('pekerjaan')->nullable(true);
            $table->string('jenjang_karir')->nullable(true);
            $table->string('mulai_bergabung')->nullable(true);
            $table->string('kota')->nullable(true);
            $table->string('kecamatan')->nullable(true);
            $table->string('kelurahan')->nullable(true);
            $table->string('rw')->nullable(true);
            $table->string('rt')->nullable(true);
            $table->text('kontribusi')->nullable(true);
            $table->text('pernyataan')->nullable(true);
            $table->string('created_by')->nullable(true);
            $table->string('updated_by')->nullable(true);
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable(true);
            $table->string('deleted_by')->nullable(true);
            $table->string('flag')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kader_pkk');
    }
}
