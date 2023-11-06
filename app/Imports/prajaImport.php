<?php

namespace App\Imports;

use App\Models\Praja;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class prajaImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Praja([
            'PRAJA_NPP' => $row[5],
            'PRAJA_EMAIL' => $row[5].'@praja.ipdn.ac.id',
            'PRAJA_NAMA' => $row[1],
            'PRAJA_TEMPAT_LAHIR' => $row[2],
            'PRAJA_TANGGAL_LAHIR' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[3]),
            'PRAJA_JENIS_KELAMIN' => $row[4],
            'PRAJA_PROVINSI' => $row[6],
            'PRAJA_KOTA' => $row[7],
            'PRAJA_AGAMA' => $row[8],
            'PRAJA_TINGKAT' => $row[9],
            'PRAJA_ANGKATAN' => $row[10],
            'PRAJA_KAMPUS' => $row[11],
            'PRAJA_WISMA' => $row[12],
            'PRAJA_PROGRAM_PENDIDIKAN' => $row[13],
            'PRAJA_FAKULTAS' => $row[14],
            'PRAJA_PROGRAM_STUDI' => $row[15],
            'PRAJA_KELAS' => $row[16],
        ]);
    }
}
