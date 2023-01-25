<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rpenghargaan extends Model
{
    protected $table = 'riwayat_penghargaan';
    protected $primaryKey = 'id';
    protected $fillable = ['kader_pkk_id', 'tahun', 'nama_penghargaan', 'tingkat_penghargaan'
    , 'pemberi_penghargaan', 'deskripsi', 'created_at', 'created_by', 'updated_at'
    , 'updated_by', 'deleted_at', 'deleted_by'];
}
