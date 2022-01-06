<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\JenisInsentif;
use App\Models\Report;
use App\Models\Negeri;

// use App\PendBul;
use App\Exports\PendBul;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class PendapatanBulananControllerWeb extends Controller
{
    public function index()
    {
        $reports = Report::where('type', 1)
        ->orderBy('tab3', 'ASC')
        ->orderBy('tab2', 'ASC')
        ->orderBy('tab1', 'ASC')
        ->get();
        
        $c_penerima = 0;
        $c_insentif = 0;
        foreach ($reports as $report) {
            $negeri = Negeri::where('U_Negeri_ID', $report->tab1)->first();
            if(isset($negeri)){
                $report->negeri = $negeri->Negeri;
            }
            $jenisinsentif = JenisInsentif::where('id_jenis_insentif', $report->tab2)->first();
            if(isset($jenisinsentif)){
                $report->jenis = $jenisinsentif->nama_insentif;
            }
            $c_penerima = $c_penerima + $report->tab4;
            $c_insentif = $c_insentif + $report->tab5;
        }
        $ddInsentif = JenisInsentif::where('status', 'aktif')->get();
        
        return view('pendapatanbulanan.index'
        ,[
            'reports'=>$reports,
            'ddInsentif'=>$ddInsentif,
            'c_penerima'=>$c_penerima,
            'c_insentif'=>$c_insentif
        ]
        );
    }

    public function show(Request $request, $tahun)
    {
        if($request->tahun == null){
            $reports = Report::where('type', 1)
            ->where('tab2', $request->id_jenis_insentif)
            ->orderBy('tab3', 'ASC')->orderBy('tab2', 'ASC')->orderBy('tab1', 'ASC')->get();
        }
        if($request->id_jenis_insentif == null){
            $reports = Report::where('type', 1)
            ->where('tab3', $request->tahun)
            ->orderBy('tab3', 'ASC')->orderBy('tab2', 'ASC')->orderBy('tab1', 'ASC')->get();
        }
        if($request->id_jenis_insentif != null && $request->tahun != null){
            $reports = Report::where('type', 1)
            ->where('tab2', $request->id_jenis_insentif)
            ->where('tab3', $request->tahun)
            ->orderBy('tab3', 'ASC')->orderBy('tab2', 'ASC')->orderBy('tab1', 'ASC')->get();
        }
        if($request->id_jenis_insentif == null && $request->tahun == null){
            $reports = Report::where('type', 1)
            ->orderBy('tab3', 'ASC')->orderBy('tab2', 'ASC')->orderBy('tab1', 'ASC')->get();
        }
        
        $result = "";
        $num=1;
        $c_penerima = 0;
        $c_insentif = 0;
        foreach ($reports as $report) {
            $negeri = Negeri::where('U_Negeri_ID', $report->tab1)->first();
            if(isset($negeri)){
                $report->negeri = $negeri->Negeri;
            }
            $jenisinsentif = JenisInsentif::where('id_jenis_insentif', $report->tab2)->first();
            if(isset($jenisinsentif)){
                $report->jenis = $jenisinsentif->nama_insentif;
            }
            $c_penerima = $c_penerima + $report->tab4;
            $c_insentif = $c_insentif + $report->tab5;

            $result .= 
            '<tr class="align-middle" style="text-align: center;">
                <td class="text-nowrap" style="padding-right:2vh;"><label class="form-check-label">'.$num++.'</label></td>
                <td class="text-nowrap"><label class="form-check-label">'.$report->negeri.'</label></td>
                <td class="text-nowrap" style="text-align: left;"><label class="form-check-label">'.$report->jenis.'</label></td>
                <td class="text-nowrap"><label class="form-check-label">'.$report->tab3.'</label></td>
                <td class="text-nowrap"><label class="form-check-label">'.$report->tab4.'</label></td>
                <td class="text-nowrap"><label class="form-check-label">'.$report->tab5.'</label></td>
            </tr>';
        }
        $result .=
        '<tr class="align-middle" style="text-align: center;">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;"><label class="form-check-label">'.$c_penerima.'</label></td>
            <td class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;"><label class="form-check-label">'.$c_insentif.'</label></td>
        </tr>
        ';       

        return $result;
    }

    // public function export2(Request $request, $tahun, $jenis)
    // {
    //     // dd($request);
    //     return Excel::download(new PendBul($request->tahun,$request->id_jenis_insentif), 'PendapatanBulanan.xlsx');
    // }

    public function export2($tahun, $jenis)
    {
            return Excel::download(new PendBul($tahun,$jenis), 'PendapatanBulanan.xlsx');
    }
}
