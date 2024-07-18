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
            throw new Exception($th->getMessage(), 500);
        }
    }


    public function count(Request $request)
    {
        try {
            $message = 'Berhasil melakukan perhitungan data praja';

            // All Data
            if ('all' == $request['field']):
                $response = Praja::count();

                // Jenis Kelamin
            elseif ('jenis_kelamin' == $request['field']):
                $data = ['field' => 'PRAJA_JENIS_KELAMIN', 'record' => $request['record']];
                $response = Praja::countPraja($data);

                // Provinsi
            elseif ('provinsi' == $request['field']):
                $data = ['field' => 'PRAJA_PROVINSI', 'record' => $request['record']];
                $response = Praja::countPraja($data);

                // Kota
            elseif ('kota' == $request['field']):
                $data = ['field' => 'PRAJA_KOTA', 'record' => $request['record']];
                $response = Praja::countPraja($data);

                // Agama
            elseif ('agama' == $request['field']):
                $data = ['field' => 'PRAJA_AGAMA', 'record' => $request['record']];
                $response = Praja::countPraja($data);

                // Tingkat
            elseif ('tingkat' == $request['field']):
                $data = ['field' => 'PRAJA_TINGKAT', 'record' => $request['record']];
                $response = Praja::countPraja($data);

                // Angkatan
            elseif ('angkatan' == $request['field']):
                $data = ['field' => 'PRAJA_ANGKATAN', 'record' => $request['record']];
                $response = Praja::countPraja($data);

                // Kampus
            elseif ('kampus' == $request['field']):
                $data = ['field' => 'PRAJA_KAMPUS', 'record' => $request['record']];
                $response = Praja::countPraja($data);

                // Wisma
            elseif ('wisma' == $request['field']):
                $data = ['field' => 'PRAJA_WISMA', 'record' => $request['record']];
                $response = Praja::countPraja($data);

                // Program Pendidikan
            elseif ('program_pendidikan' == $request['field']):
                $data = ['field' => 'PRAJA_PROGRAM_PENDIDIKAN', 'record' => $request['record']];
                $response = Praja::countPraja($data);

                // Fakultas
            elseif ('fakultas' == $request['field']):
                $data = ['field' => 'PRAJA_FAKULTAS', 'record' => $request['record']];
                $response = Praja::countPraja($data);

                // Program Studi
            elseif ('program_studi' == $request['field']):
                $data = ['field' => 'PRAJA_PROGRAM_STUDI', 'record' => $request['record']];
                $response = Praja::countPraja($data);

                // Kelas
            elseif ('kelas' == $request['field']):
                $data = ['field' => 'PRAJA_KELAS', 'record' => $request['record']];
                $response = Praja::countPraja($data);
                // Field teu sesuai
            else:
                $response = null;
            endif;

            // Ngarobih pesan nalika field teu sesuai sareng katangtosan
            if (is_null($response)):
                $message = 'Data praja tidak ditemukan';
            endif;

            // Ngirimkeun data hasil tinu proses ka semah
            return response()->json([
                'message' => $message,
                'data' => ['total' => $response],
            ]);

        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}
