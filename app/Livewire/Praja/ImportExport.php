<?php

namespace App\Livewire\Praja;

use App\Imports\prajaImport;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class ImportExport extends Component
{
    use WithFileUploads;

    #[Rule(['required', 'file', 'mimes:xls,xlsx'])]
    public $file;

    public function import()
    {
        // Fungsi pikeun marios request nu di kintun
        $this->validate();

        try {
            // Nangtoskeun nami pikeun data anu bakal disimpen
            $fileName = date('d-m-Y/h:i:s', null) . '_' . $this->file->getClientOriginalName();

            // Maca alamat asli tinu data anu bakal disimpen
            $path = $this->file->getRealPath();

            // Miwarang livewire kanggo nyimpen data dumasar kana katangtosan nu tos di damel
            $this->file->storeAs('file_praja', $fileName, 'public');

            // Ngalakonan proses import data ka database
            Excel::import(new prajaImport, $path);

            // Ngabersihkeun form tilas ngalebetkeun data
            $this->reset();

            // Masihan bewara yen proses import data rengse di lakonan
            session()->flash('success', 'Impot data praja berhasil dijalankan');

        } catch (\Throwable $th) {
            // Masihan bewara yen aya kalepatan tina proses import data excel
            session()->flash('error', $th->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.praja.import-export');
    }
}
