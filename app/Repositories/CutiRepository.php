<?php

namespace App\Repositories;

use App\Repositories\Interfaces\CutiRepositoryInterface;
use App\Models\User;
use App\Models\Cuti;
use App\Models\RefCuti;

class CutiRepository implements CutiRepositoryInterface
{

    public function allCuti(){
        $data = Cuti::get([
            'id',
            'id_user',
            'tanggal',
            'jumlah_hari',
            'alasan',
            'status',
            'ket',
        ]);
        foreach ($data as $val) {
            $cek = User::where('id', $val->id_user)->first();
            $val->nama = $cek ? $cek->name : null;
        }
        return $data;
    }

    public function storeCuti($data){
        return Cuti::create($data);
    }

    public function findCuti($id){
        $data = Cuti::where('id', $id)->first();
        if($data){
            $cek = User::where('id', $data->id_user)->first();
            $data->nama = $cek ? $cek->name : null;
        }
        return $data;
    }
}