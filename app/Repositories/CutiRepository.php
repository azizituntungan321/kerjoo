<?php

namespace App\Repositories;

use App\Repositories\Interfaces\CutiRepositoryInterface;
use App\Models\Cuti;
use App\Models\RefCuti;

class CutiRepository implements CutiRepositoryInterface
{

    public function allCuti()
    {
        return Cuti::latest()->paginate(10);
    }

    public function storeCuti($data)
    {
        return Cuti::create($data);
    }

    public function findCuti($id)
    {
        return Cuti::find($id);
    }

    public function updateCuti($data, $id)
    {
        $category = Cuti::where('id', $id)->first();
        $category->name = $data['name'];
        $category->slug = $data['slug'];
        $category->save();
    }

    public function destroyCuti($id)
    {
        $category = Cuti::find($id);
        $category->delete();
    }
}