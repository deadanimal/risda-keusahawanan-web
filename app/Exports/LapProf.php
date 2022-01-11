<?php

namespace App\Exports;

use Illuminate\Support\Facades\Auth;
use App\Models\Report;
use App\Models\Negeri;
use App\Models\JenisInsentif;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LapProf implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
        $negeri = Negeri::all();
        return $negeri;
    }

    public function headings(): array
    {
        return ["NEGERI", "PUSAT TANGGUNGJAWAB RISDA", "TAHUN", "BILANGAN PENERIMA INSENTIF", "JUMLAH INSENTIF", "JUMLAH JUALAN", "PURATA JUALAN"];
    }
}