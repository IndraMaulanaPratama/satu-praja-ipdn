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


    public function searchData(Request $request)
    {
        // ngadamel variabel dumasar kana data anu dikintun ku semah
        [
            "npp" => $npp,
            "nama" => $nama,
            "tempat_lahir" => $tempat_lahir,
            "jenis_kelamin" => $jenis_kelamin,
            "provinsi" => $provinsi,
            "kota" => $kota,
            "agama" => $agama,
            "tingkat" => $tingkat,
            "angkatan" => $angkatan,
            "kampus" => $kampus,
            "wisma" => $wisma,
            "program_pendidikan" => $program_pendidikan,
            "fakultas" => $fakultas,
            "program_studi" => $program_studi,
            "kelas" => $kelas,
            "item" => $item,
        ] = $request;

        try {
            // Logika kanggo maca database
            $data = Praja::generalData()

                // Milari data dumasar kana npp
                ->whenNpp($npp)

                // Milari data dumasar kana nami
                ->whenNama($nama)

                // Milari data dumasar kana tempat lahir
                ->whenTempatLahir($tempat_lahir)

                // Milari data dumasar kana jenis kelamin
                ->whenJenisKelamin($jenis_kelamin)

                // Milari data dumasar kana provinsi
                ->whenProvinsi($provinsi)

                // Milari data dumasar kana kota
                ->whenKota($kota)

                // Milari data dumasar kana ageman
                ->whenAgama($agama)

                // Milari data dumasar kana tingkat
                ->whenTingkat($tingkat)

                // Milari data dumasar kana angkatan
                ->whenAngkatan($angkatan)

                // Milari data dumasar kana kampus
                ->whenKampus($kampus)

                // Milari data dumasar kana wisma
                ->whenWisma($wisma)

                // Milari data dumasar kana program pendidikan
                ->whenProgramPendidikan($program_pendidikan)

                // Milari data dumasar kana fakultas
                ->whenFakultas($fakultas)

                // Milari data dumasar kana program studi
                ->whenProgramStudi($program_studi)

                // Milari data dumasar kana kelas
                ->whenKelas($kelas)

                ->paginate($item);
            // Tungtung tina logika kanggo maca database

            // Ngadamel variable pesan sareng kode status dumasar kana hasil data
            $message = (count($data) == null) ? 'Data praja tidak ditemukan' : 'Data praja berhasil ditemukan';
            $status = (count($data) == null) ? 400 : 200;
            $response = (count($data) == null) ? null : $data;

            // Mulangkeun hasil ka semah
            return response()->json(['message' => $message, 'data' => $response], $status);


        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}
