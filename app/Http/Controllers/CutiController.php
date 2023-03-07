<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\CutiRepositoryInterface;
use Validator;


class CutiController extends Controller
{
    private $cutiRepository;

    public function __construct(CutiRepositoryInterface $cutiRepository)
    {
        $this->cutiRepository = $cutiRepository;
    }

    public function store(Request $request){
        try {
            $validator = Validator::make($request->all(), [
                'id_user' => 'required',
                'tanggal' => 'required',
                'jumlah_hari' => 'required',
                'alasan' => 'required',
                'ket' => 'required',
            ]);
            if ($validator->fails()) {
                $messages=$validator->messages();
                return response()->json([
                    'status'=> 'fail',
                    "message" => $messages->all()
                ], 400);
            }

            $this->cutiRepository->storeCuti($request->all());
            return response()->json([
                'status' => 'SUCCESS',
                'message' => 'SUCCESS STORE DATA',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'FAIL',
                'message' => 'FAIL STORE DATA',
            ], 200);
        }
    }

    public function show()
    {
        //
    }

    public function edit($id)
    {
        $category = $this->cutiRepository->findCategory($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
        ]);

        $this->cutiRepository->updateCategory($request->all(), $id);
    }

    public function destroy($id)
    {
        $this->cutiRepository->destroyCategory($id);
    }
}
