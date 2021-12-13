<?php

namespace App\Exports;

use Illuminate\Support\Facades\Auth;
use App\Models\Report;
use App\Models\Negeri;
use App\Models\JenisInsentif;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PendBul implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $tahun;

    function __construct($tahun,$jenis) {
        $this->tahun = $tahun;
        $this->jenis = $jenis;
    }

    public function collection()
    {
        // dd($this->tahun);
        if($this->tahun == 'nun' && $this->jenis != 'nun'){
            $reports = Report::where('type', 1)
            ->where('tab2', $this->jenis)
            ->orderBy('tab3', 'ASC')->orderBy('tab2', 'ASC')->orderBy('tab1', 'ASC')->get();
        }
        if($this->jenis == 'nun' && $this->tahun != 'nun'){
            $reports = Report::where('type', 1)
            ->where('tab3', $this->tahun)
            ->orderBy('tab3', 'ASC')->orderBy('tab2', 'ASC')->orderBy('tab1', 'ASC')->get();
        }
        if($this->jenis != 'nun' && $this->tahun != 'nun'){
            $reports = Report::select('tab1','tab2','tab3','tab4','tab5')
            ->where('tab20', Auth::user()->id)
            ->where('type', 1)
            ->where('tab2', $this->jenis)
            ->where('tab3', $this->tahun)
            ->orderBy('tab3', 'ASC')
            ->orderBy('tab2', 'ASC')
            ->orderBy('tab1', 'ASC')
            ->get();
            
        }
        if($this->jenis == 'nun' && $this->tahun == 'nun'){
            $reports = Report::select('tab1','tab2','tab3','tab4','tab5')
            ->where('tab20', Auth::user()->id)
            ->where('type', 1)
            ->orderBy('tab3', 'ASC')
            ->orderBy('tab2', 'ASC')
            ->orderBy('tab1', 'ASC')
            ->get();
        }

        foreach($reports as $report){
            $negeri = Negeri::where('U_Negeri_ID', $report->tab1)->first();
            $jenisinsentif = JenisInsentif::where('id_jenis_insentif', $report->tab2)->first();
            $report->tab2 = $jenisinsentif->nama_insentif;
            $report->tab1 = $negeri->Negeri;
        }
        return $reports;
    }

    public function headings(): array
    {
        return ["NEGERI", "JENIS INSENTIF", "TAHUN", "BILANGAN PENERIMA INSENTIF", "JUMLAH INSENTIF", "JUMLAH JUALAN", "PURATA JUALAN"];
    }
}
