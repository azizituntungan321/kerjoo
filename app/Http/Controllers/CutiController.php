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
                'status' => 'success',
                'message' => 'success store data',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'fail',
                'message' => 'fail store data',
            ], 500);
        }
    }

    public function show(){
        try {
            $data = $this->cutiRepository->allCuti();
            return response()->json([
                'status' => 'success',
                'message' => 'success get data',
                'data' => $data,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'fail',
                'message' => 'fail get data',
            ], 500);
        }
    }

    public function find($id){
        try {
            $data = $this->cutiRepository->findCuti($id);
            if(!$data){
                return response()->json([
                    'status' => 'success',
                    'message' => 'data not found',
                ], 404);
            }
            return response()->json([
                'status' => 'success',
                'message' => 'success get data',
                'data' => $data,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'fail',
                'message' => 'fail get data',
            ], 500);
        }
    }
}
