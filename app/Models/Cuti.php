<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    use HasFactory;
    protected $table = 'tbl_cuti';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id_user', 'tanggal', 'jumlah_hari', 'alasan', 'status', 'ket'
    ];

    protected $guarded = [];
    
}
