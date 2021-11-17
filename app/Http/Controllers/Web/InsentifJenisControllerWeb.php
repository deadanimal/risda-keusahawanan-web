<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\JenisInsentif;
use App\Models\Report;
use App\Models\Negeri;

class InsentifJenisControllerWeb extends Controller
{
    public function index()
    {
        $ddInsentif = JenisInsentif::where('status', 'aktif')->get();
        $reports = Report::where('type', 5)
        ->orderBy('tab3', 'ASC')
        ->orderBy('tab2', 'ASC')
        ->orderBy('tab1', 'ASC')
        ->get();

        $total = new \stdClass();
        $total->satu = 0;
        $total->dua = 0;
        $total->tiga = 0;
        $total->empat = 0;
        $total->lima = 0;
        $total->enam = 0;
        $rm = new \stdClass();
        $rm->satu = 0;
        $rm->dua = 0;
        $rm->tiga = 0;
        $rm->empat = 0;
        $rm->lima = 0;
        $rm->enam = 0;

        foreach ($reports as $report) {
            $negeri = Negeri::where('U_Negeri_ID', $report->tab1)->first();
            if(isset($negeri)){
                $report->negeri = $negeri->Negeri;
            }
            $jenisinsentif = JenisInsentif::where('id_jenis_insentif', $report->tab2)->first();
            if(isset($jenisinsentif)){
                $report->jenis = $jenisinsentif->nama_insentif;
            }

            $report->jumbil = $report->tab4 + $report->tab6 + $report->tab8 + $report->tab10 + $report->tab12;
            $report->jumrm = $report->tab5 + $report->tab7 + $report->tab9 + $report->tab11 + $report->tab13;

            $total->satu = $total->satu + $report->tab4;
            $total->dua = $total->dua + $report->tab6;
            $total->tiga = $total->tiga + $report->tab8;
            $total->empat = $total->empat + $report->tab10;
            $total->lima = $total->lima + $report->tab12;
            $total->enam = $total->satu + $total->dua + $total->tiga + $total->empat + $total->lima;

            $rm->satu = $rm->satu + $report->tab5;
            $rm->dua = $rm->dua + $report->tab7;
            $rm->tiga = $rm->tiga + $report->tab9;
            $rm->empat = $rm->empat + $report->tab11;
            $rm->lima = $rm->lima + $report->tab13;
            $rm->enam = $rm->satu + $rm->dua + $rm->tiga + $rm->empat + $rm->lima;

        }
        
        return view('laporaninsentif.insenjenis'
        ,[
            'ddInsentif'=>$ddInsentif,
            'reports'=>$reports,
            'total'=>$total,
            'rm'=>$rm
        ]
        );
    }

    public function show(Request $request, $tahun)
    {
        $total = new \stdClass();
        $total->satu = 0;
        $total->dua = 0;
        $total->tiga = 0;
        $total->empat = 0;
        $total->lima = 0;
        $total->enam = 0;
        $rm = new \stdClass();
        $rm->satu = 0;
        $rm->dua = 0;
        $rm->tiga = 0;
        $rm->empat = 0;
        $rm->lima = 0;
        $rm->enam = 0;

        if($request->tahun == null){
            $reports = Report::where('type', 5)
            ->where('tab2', $request->id_jenis_insentif)
            ->orderBy('tab3', 'ASC')->orderBy('tab2', 'ASC')->orderBy('tab1', 'ASC')->get();
        }
        if($request->id_jenis_insentif == null){
            $reports = Report::where('type', 5)
            ->where('tab3', $request->tahun)
            ->orderBy('tab3', 'ASC')->orderBy('tab2', 'ASC')->orderBy('tab1', 'ASC')->get();
        }
        if($request->id_jenis_insentif != null && $request->tahun != null){
            $reports = Report::where('type', 5)
            ->where('tab2', $request->id_jenis_insentif)
            ->where('tab3', $request->tahun)
            ->orderBy('tab3', 'ASC')->orderBy('tab2', 'ASC')->orderBy('tab1', 'ASC')->get();
        }
        if($request->id_jenis_insentif == null && $request->tahun == null){
            $reports = Report::where('type', 5)
            ->orderBy('tab3', 'ASC')->orderBy('tab2', 'ASC')->orderBy('tab1', 'ASC')->get();
        }

        $result = "";
        $num=1;
        foreach ($reports as $report) {

            $negeri = Negeri::where('U_Negeri_ID', $report->tab1)->first();
            if(isset($negeri)){
                $report->negeri = $negeri->Negeri;
            }
            $jenisinsentif = JenisInsentif::where('id_jenis_insentif', $report->tab2)->first();
            if(isset($jenisinsentif)){
                $report->jenis = $jenisinsentif->nama_insentif;
            }

            $report->jumbil = $report->tab4 + $report->tab6 + $report->tab8 + $report->tab10 + $report->tab12;
            $report->jumrm = $report->tab5 + $report->tab7 + $report->tab9 + $report->tab11 + $report->tab13;

            $total->satu = $total->satu + $report->tab4;
            $total->dua = $total->dua + $report->tab6;
            $total->tiga = $total->tiga + $report->tab8;
            $total->empat = $total->empat + $report->tab10;
            $total->lima = $total->lima + $report->tab12;
            $total->enam = $total->satu + $total->dua + $total->tiga + $total->empat + $total->lima;

            $rm->satu = $rm->satu + $report->tab5;
            $rm->dua = $rm->dua + $report->tab7;
            $rm->tiga = $rm->tiga + $report->tab9;
            $rm->empat = $rm->empat + $report->tab11;
            $rm->lima = $rm->lima + $report->tab13;
            $rm->enam = $rm->satu + $rm->dua + $rm->tiga + $rm->empat + $rm->lima;

            $result .= 
            '<tr class="align-middle" style="text-align: center;">
                <td class="text-nowrap" style="padding-right:2vh;"><label class="form-check-label">'.$num++.'</label></td>
                <td class="text-nowrap"><label class="form-check-label">'.$report->negeri.'</label></td>
                <td class="text-nowrap" style="text-align: left;"><label class="form-check-label">'.$report->jenis.'</label></td>
                <td class="text-nowrap"><label class="form-check-label">'.$report->tab3.'</label></td>
                <td class="text-nowrap"><label class="form-check-label">'.$report->tab4.'</label></td>
                <td class="text-nowrap"><label class="form-check-label">'.$report->tab5.'</label></td>
                <td class="text-nowrap"><label class="form-check-label">'.$report->tab6.'</label></td>
                <td class="text-nowrap"><label class="form-check-label">'.$report->tab7.'</label></td>
                <td class="text-nowrap"><label class="form-check-label">'.$report->tab8.'</label></td>
                <td class="text-nowrap"><label class="form-check-label">'.$report->tab9.'</label></td>
                <td class="text-nowrap"><label class="form-check-label">'.$report->tab10.'</label></td>
                <td class="text-nowrap"><label class="form-check-label">'.$report->tab11.'</label></td>
                <td class="text-nowrap"><label class="form-check-label">'.$report->tab12.'</label></td>
                <td class="text-nowrap"><label class="form-check-label">'.$report->tab13.'</label></td>
                <td class="text-nowrap"><label class="form-check-label">'.$report->jumbil.'</label></td>
                <td class="text-nowrap"><label class="form-check-label">'.$report->jumrm.'</label></td>
            </tr>';
        }
        return $result;
    }
}

?>