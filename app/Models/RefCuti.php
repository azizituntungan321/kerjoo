<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefCuti extends Model
{
    use HasFactory;
    protected $table = 'ref_cuti';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id_user', 'tahun', 'cuti_belum_dipakai', 'cuti_sudah_dipakai'
    ];

    protected $guarded = [];
    
}
