<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rpengabdian extends Model
{
    protected $table = 'riwayat_pengabdian';
    protected $primaryKey = 'id';
    protected $fillable = ['kader_pkk_id', 'tahun_mulai', 'tahun_selesai', 'jabatan'
    , 'wilayah', 'deskripsi', 'created_at', 'created_by', 'updated_at'
    , 'updated_by', 'deleted_at', 'deleted_by'];
}
