<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rorganisasi extends Model
{
    protected $table = 'riwayat_organisasi';
    protected $primaryKey = 'id';
    protected $fillable = ['kader_pkk_id', 'tahun_mulai', 'tahun_selesai', 'nama_organisasi', 'jabatan'
    , 'kota', 'deskripsi', 'created_at', 'created_by', 'updated_at'
    , 'updated_by', 'deleted_at', 'deleted_by'];
}
