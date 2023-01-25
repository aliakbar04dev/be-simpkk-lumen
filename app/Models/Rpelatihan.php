<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rpelatihan extends Model
{
    protected $table = 'riwayat_pelatihan';
    protected $primaryKey = 'id';
    protected $fillable = ['kader_pkk_id', 'tahun', 'nama_pelatihan', 'kriteria_kader'
    , 'penyelenggara', 'deskripsi', 'created_at', 'created_by', 'updated_at'
    , 'updated_by', 'deleted_at', 'deleted_by'];
}
