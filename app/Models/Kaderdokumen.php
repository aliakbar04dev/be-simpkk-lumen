<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kaderdokumen extends Model
{
    protected $table = 'kader_dokumen';
    protected $primaryKey = 'id';
    protected $fillable = ['kader_pkk_id', 'tipe', 'uri', 'deskripsi'
    , 'created_at', 'created_by', 'updated_at'
    , 'updated_by', 'deleted_at', 'deleted_by'];
}
