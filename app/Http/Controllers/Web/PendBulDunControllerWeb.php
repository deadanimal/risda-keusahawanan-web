<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\JenisInsentif;
use App\Models\Report;
use App\Models\Negeri;
use App\Models\Dun;
use App\Models\Parlimen;

class PendBulDunControllerWeb extends Controller
{
    public function index()
    {
        $ddInsentif = JenisInsentif::where('status', 'aktif')->get();
        $reports = Report::where('type', 3)
        ->orderBy('tab3', 'ASC')->orderBy('tab2', 'ASC')->orderBy('tab1', 'ASC')->orderBy('tab9', 'ASC')->get();

        $c_penerima = 0;
        $c_insentif = 0;
        foreach ($reports as $report) {
            $negeri = Negeri::where('U_Negeri_ID', $report->tab1)->first();
            $report->negeri = $negeri->Negeri;
            $jenisinsentif = JenisInsentif::where('id_jenis_insentif', $report->tab2)->first();
            $report->jenis = $jenisinsentif->nama_insentif;
            $dun = Dun::where('U_Dun_ID', $report->tab9)->first();
            $report->dun = $dun->Dun;
            $parlimen = Parlimen::where('U_Parlimen_ID', $dun->U_Parlimen_ID)->first();
            $report->parlimen = $parlimen->Parlimen;
            $c_penerima = $c_penerima + $report->tab4;
            $c_insentif = $c_insentif + $report->tab5;
        }

        return view('pendapatanbulanan.pendbulDun'
        ,[
            'ddInsentif'=>$ddInsentif,
            'reports'=>$reports,
            'c_penerima'=>$c_penerima,
            'c_insentif'=>$c_insentif
        ]
        );
    }

    public function show(Request $request, $tahun)
    {
        if($request->tahun == null){
            $reports = Report::where('type', 3)
            ->where('tab2', $request->id_jenis_insentif)
            ->orderBy('tab3', 'ASC')->orderBy('tab2', 'ASC')->orderBy('tab1', 'ASC')->orderBy('tab9', 'ASC')->get();
        }
        if($request->id_jenis_insentif == null){
            $reports = Report::where('type', 3)
            ->where('tab3', $request->tahun)
            ->orderBy('tab3', 'ASC')->orderBy('tab2', 'ASC')->orderBy('tab1', 'ASC')->orderBy('tab9', 'ASC')->get();
        }
        if($request->id_jenis_insentif != null && $request->tahun != null){
            $reports = Report::where('type', 3)
            ->where('tab2', $request->id_jenis_insentif)
            ->where('tab3', $request->tahun)
            ->orderBy('tab3', 'ASC')->orderBy('tab2', 'ASC')->orderBy('tab1', 'ASC')->orderBy('tab9', 'ASC')->get();
        }
        if($request->id_jenis_insentif == null && $request->tahun == null){
            $reports = Report::where('type', 3)
            ->orderBy('tab3', 'ASC')->orderBy('tab2', 'ASC')->orderBy('tab1', 'ASC')->orderBy('tab9', 'ASC')->get();
        }
        
        $result = "";
        $num=1;
        $c_penerima = 0;
        $c_insentif = 0;
        foreach ($reports as $report) {
            $negeri = Negeri::where('U_Negeri_ID', $report->tab1)->first();
            $report->negeri = $negeri->Negeri;
            $jenisinsentif = JenisInsentif::where('id_jenis_insentif', $report->tab2)->first();
            $report->jenis = $jenisinsentif->nama_insentif;
            $dun = Dun::where('U_Dun_ID', $report->tab9)->first();
            $report->dun = $dun->Dun;
            $parlimen = Parlimen::where('U_Parlimen_ID', $dun->U_Parlimen_ID)->first();
            $report->parlimen = $parlimen->Parlimen;
            $c_penerima = $c_penerima + $report->tab4;
            $c_insentif = $c_insentif + $report->tab5;

            $result .= 
            '<tr class="align-middle" style="text-align: center;">
                <td class="text-nowrap" style="padding-right:2vh;"><label class="form-check-label">'.$report->negeri.'</label></td>
                <td class="text-nowrap"><label class="form-check-label">'.$report->parlimen.'</label></td>
                <td class="text-nowrap"><label class="form-check-label">'.$report->dun.'</label></td>
                <td class="text-nowrap" style="text-align: left;"><label class="form-check-label">'.$report->jenis.'</label></td>
                <td class="text-nowrap"><label class="form-check-label">'.$report->tab3.'</label></td>
                <td class="text-nowrap"><label class="form-check-label">'.$report->tab4.'</label></td>
                <td class="text-nowrap"><label class="form-check-label">'.$report->tab5.'</label></td>
            </tr>';
        }
        $result .=
        '<tr class="align-middle" style="text-align: center;">
            <td colspan="5"></td>
            <td class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;"><label class="form-check-label">'.$c_penerima.'</label></td>
            <td class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;"><label class="form-check-label">'.$c_insentif.'</label></td>
        </tr>
        ';  
        
        return $result;
    }

}
