<?php

namespace App\Http\Controllers;

use App\Models\Praja;
use Exception;
use Illuminate\Http\Request;

class PrajaController extends Controller
{
    public function getData(Request $request)
    {
        try {
            $data = [
                'npp' => $request->npp ?? null,
                'nama' => $request->nama ?? null,
                'jenis_kelamin' => $request->jenis_kelamin ?? null,
                'agama' => $request->agama ?? null,
                'tingkat' => $request->tingkat ?? null,
                'angkatan' => $request->angkatan ?? null,
                'kampus' => $request->kampus ?? null,
                'wisma' => $request->wisma ?? null,
                'program_pendidikan' => $request->program_pendidikan ?? null,
                'fakultas' => $request->fakultas ?? null,
                'program_studi' => $request->program_studi ?? null,
                'kelas' => $request->kelas ?? null,
                'nomor_ponsel' => $request->nomor_ponsel ?? null,
                'item' => $request->item ?? null,
            ];

            $result = Praja::getPraja($data);

            if (count($result) != false) {
                return response()->json($result);
            } else {
                return response()->json(['Pesan' => 'Data Praja tidak ditemukan'], 404);
            }
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 400);
        }
    }
}
