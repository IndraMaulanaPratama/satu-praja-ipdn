<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Praja extends Model
{
    use HasFactory;

    protected $table = 'PRAJA';
    protected $primaryKey = "PRAJA_NPP";
    protected $keyType = 'string';
    protected $perPage = 15;

    protected $fillable = [
        'PRAJA_NPP',
        'PRAJA_EMAIL',
        'PRAJA_NAMA',
        'PRAJA_TEMPAT_LAHIR',
        'PRAJA_TANGGAL_LAHIR',
        'PRAJA_JENIS_KELAMIN',
        'PRAJA_PROVINSI',
        'PRAJA_KOTA',
        'PRAJA_AGAMA',
        'PRAJA_TINGKAT',
        'PRAJA_ANGKATAN',
        'PRAJA_KAMPUS',
        'PRAJA_WISMA',
        'PRAJA_PROGRAM_PENDIDIKAN',
        'PRAJA_FAKULTAS',
        'PRAJA_PROGRAM_STUDI',
        'PRAJA_KELAS',
        'PRAJA_NOMOR_PONSEL',
    ];

    protected $hidden = [
        'deleted_at'
    ];

    public function scopeGetPraja(...$search)
    {

        return Praja::query()
            ->when(
                $search[1]['npp'],
                function ($query, $search) {
                    return $query->where('PRAJA_NPP', 'LIKE', $search . '%');
                }
            )
            ->when(
                $search[1]['nama'],
                function ($query, $search) {
                    return $query->where('PRAJA_NAMA', 'LIKE', $search . '%');
                },
            )
            ->when(
                $search[1]['jenis_kelamin'],
                function ($query, $search) {
                    return $query->where('PRAJA_JENIS_KELAMIN', 'LIKE', $search . '%');
                },
            )
            ->when(
                $search[1]['agama'],
                function ($query, $search) {
                    return $query->where('PRAJA_AGAMA', 'LIKE', $search . '%');
                },
            )
            ->when(
                $search[1]['tingkat'],
                function ($query, $search) {
                    return $query->where('PRAJA_TINGKAT', 'LIKE', $search . '%');
                },
            )
            ->when(
                $search[1]['angkatan'],
                function ($query, $search) {
                    return $query->where('PRAJA_ANGKATAN', 'LIKE', $search . '%');
                },
            )
            ->when(
                $search[1]['kampus'],
                function ($query, $search) {
                    return $query->where('PRAJA_KAMPUS', 'LIKE', $search . '%');
                },
            )
            ->when(
                $search[1]['wisma'],
                function ($query, $search) {
                    return $query->where('PRAJA_WISMA', 'LIKE', $search . '%');
                },
            )
            ->when(
                $search[1]['program_pendidikan'],
                function ($query, $search) {
                    return $query->where('PRAJA_PROGRAM_PENDIDIKAN', 'LIKE', $search . '%');
                },
            )
            ->when(
                $search[1]['fakultas'],
                function ($query, $search) {
                    return $query->where('PRAJA_FAKULTAS', 'LIKE', $search . '%');
                },
            )
            ->when(
                $search[1]['program_studi'],
                function ($query, $search) {
                    return $query->where('PRAJA_PROGRAM_STUDI', 'LIKE', $search . '%');
                },
            )
            ->when(
                $search[1]['kelas'],
                function ($query, $search) {
                    return $query->where('PRAJA_KELAS', 'LIKE', $search . '%');
                },
            )
            ->when(
                $search[1]['nomor_ponsel'],
                function ($query, $search) {
                    return $query->where('PRAJA_NOMOR_PONSEL', 'LIKE', $search . '%');
                },
            )

            ->latest()->paginate(
                $search[1]['item'] ?? $this->perPage,
                [
                    "PRAJA_NPP AS NPP",
                    "PRAJA_EMAIL AS EMAIL",
                    "PRAJA_NAMA AS NAMA",
                    "PRAJA_TEMPAT_LAHIR AS TEMPAT_LAHIR",
                    "PRAJA_TANGGAL_LAHIR AS TANGGAL_LAHIR",
                    "PRAJA_JENIS_KELAMIN AS JENIS_KELAMIN",
                    "PRAJA_PROVINSI AS PROVINSI",
                    "PRAJA_KOTA AS KOTA",
                    "PRAJA_AGAMA AS AGAMA",
                    "PRAJA_TINGKAT AS TINGKAT",
                    "PRAJA_ANGKATAN AS ANGKATAN",
                    "PRAJA_KAMPUS AS KAMPUS",
                    "PRAJA_WISMA AS WISMA",
                    "PRAJA_PROGRAM_PENDIDIKAN AS PROGRAM_PENDIDIKAN",
                    "PRAJA_FAKULTAS AS FAKULTAS",
                    "PRAJA_PROGRAM_STUDI AS PROGRAM_STUDI",
                    "PRAJA_KELAS AS KELAS",
                    "PRAJA_NOMOR_PONSEL AS NOMOR_PONSEL",
                ]
            );
    }

    public function scopeCountPraja($data)
    {
        return Praja::when(
            $data,
            function ($query, $data) {
                return $query->where($data['field'], 'LIKE', '%' . $data['record'] . '%');
            }
        )->count();
    }
}
