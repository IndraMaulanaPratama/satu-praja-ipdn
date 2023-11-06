<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('PRAJA', function (Blueprint $table) {
            $table->string('PRAJA_NPP', 7)->primary()->comment('2 digit Angkatan . 4 digit nomor urut');
            $table->string('PRAJA_EMAIL', 200);
            $table->string('PRAJA_NAMA', 200);
            $table->string('PRAJA_TEMPAT_LAHIR', 200);
            $table->date('PRAJA_TANGGAL_LAHIR');
            $table->enum('PRAJA_JENIS_KELAMIN', ['L', 'P'])->comment('P:Perempuan - L:Laki-laki')->default('L');
            $table->string('PRAJA_PROVINSI', 150);
            $table->string('PRAJA_KOTA', 150);
            $table->enum('PRAJA_AGAMA', ['ISLAM', 'HINDU', 'PROTESTAN', 'KATOLIK', 'KRISTEN', 'BUDHA', 'KONGHUCU']);
            $table->string('PRAJA_TINGKAT', 100);
            $table->smallInteger('PRAJA_ANGKATAN', false);
            $table->string('PRAJA_KAMPUS', 150);
            $table->string('PRAJA_WISMA', 150);
            $table->enum('PRAJA_PROGRAM_PENDIDIKAN', ['D IV', 'S2']);
            $table->enum('PRAJA_FAKULTAS', ['MANAJEMEN PEMERINTAHAN', 'PERLINDUNGAN MASYARAKAT', 'POLITIK PEMERINTAHAN']);
            $table->enum('PRAJA_PROGRAM_STUDI', [
                'ADMINISTRASI PEMERINTAHAN DAERAH',
                'STUDI KEPENDUDUKAN DAN PENCATATAN SIPIL',
                'MANAJEMEN KEAMANAN DAN KESELAMATAN PUBLIK',
                'PRAKTIK PERPOLISIAN TATA PAMONG',
                'KEUANGAN PUBLIK',
                'STUDI KEBIJAKAN PUBLIK',
                'PEMBANGUNAN EKONOMI DAN PEMBERDAYAAN MASYARAKAT',
                'MANAJEMEN SUMBER DAYA MANUSIA SEKTOR PUBLIK',
                'POLITIK INDONESIA TERAPAN',
                'TEKNOLOGI REKAYASA INFORMASI PEMERINTAHAN',
            ])->comment('Enum base on data praja utama 2023-2024');
            $table->string('PRAJA_KELAS', 4);
            $table->string('PRAJA_NOMOR_PONSEL', 15)->nullable(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PRAJA');
    }
};
