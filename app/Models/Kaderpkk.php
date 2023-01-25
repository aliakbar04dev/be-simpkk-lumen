<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kaderpkk extends Model
{
    protected $table = 'kader_pkk';
    protected $primaryKey = 'id';
    protected $fillable = ['full_name', 'no_kader', 'nik', 'tempat_lahir', 'tgl_lahir'
    , 'agama', 'gender', 'alamat_ktp', 'alamat_domisili', 'no_hp'
    , 'email', 'pendidikan', 'posisi', 'jabatan', 'sekretariat'
    , 'bayar_apbd', 'norek', 'pekerjaan', 'jenjang_karir', 'mulai_bergabung', 'kota', 'kecamatan', 'kelurahan', 'rw', 'rt'
    , 'kontribusi', 'pernyataan', 'created_at', 'created_by', 'updated_at'
    , 'updated_by', 'deleted_at', 'deleted_by', 'flag'];
}
