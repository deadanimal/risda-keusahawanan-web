<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\JenisInsentif;
use App\Models\Report;
use App\Models\Negeri;

use App\Exports\InsenNegeri;
use Maatwebsite\Excel\Facades\Excel;

class LaporanInsentifControllerWeb extends Controller
{
    public function index()
    {
        $ddInsentif = JenisInsentif::where('status', 'aktif')->get();
        $authuser = Auth::user();
        if(isset($authuser)){
            $getYear = date("Y");
            $reports = Report::where('type', 4)->where('tab3', $getYear)->where('tab20', $authuser->id)
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
            $percent = new \stdClass();
            $percent->satu = 0;
            $percent->dua = 0;
            $percent->tiga = 0;
            $percent->empat = 0;
            $percent->lima = 0;
            $percent->enam = 0;

        }else{
            return redirect('/landing');
        }
        foreach ($reports as $report) {
            $negeri = Negeri::where('U_Negeri_ID', $report->tab1)->first();
            if(isset($negeri)){
                $report->negeri = $negeri->Negeri;
            }else{
                $report->negeri = "";
            }
            
            $jenisinsentif = JenisInsentif::where('id_jenis_insentif', $report->tab2)->first();
            if(isset($jenisinsentif)){
                $report->jenis = $jenisinsentif->nama_insentif;
            }else{
                $report->jenis = "";
            }
            

            $total->satu = $total->satu + $report->tab4;
            $total->dua = $total->dua + $report->tab5;
            $total->tiga = $total->tiga + $report->tab6;
            $total->empat = $total->empat + $report->tab7;
            $total->lima = $total->lima + $report->tab8;

            $report->jumproject = $report->tab4 + $report->tab5 + $report->tab6 + $report->tab7 + $report->tab8;
            $total->enam = $total->enam + $report->jumproject;
        }
        foreach ($reports as $report) {
            if($total->satu != 0){
                $report->percent1 = round(($report->tab4/$total->satu)*100, 2);
            }
            if($total->dua != 0){
                $report->percent2 = round(($report->tab5/$total->dua)*100, 2);
            }
            if($total->tiga != 0){
                $report->percent3 = round(($report->tab6/$total->tiga)*100, 2);
            }
            if($total->empat != 0){
                $report->percent4 = round(($report->tab7/$total->empat)*100, 2);
            }
            if($total->lima != 0){
                $report->percent5 = round(($report->tab8/$total->lima)*100, 2);
            }
            
            $percent->satu = $total->satu / $total->enam *100;
            $percent->dua = $total->dua / $total->enam *100;
            $percent->tiga = $total->tiga / $total->enam *100;
            $percent->empat = $total->empat / $total->enam *100;
            $percent->lima = $total->lima / $total->enam *100;
            $percent->enam = 100;
            if(isset($report->jumproject) && isset($total->enam)){
                $report->jumprojectpercent = round(($report->jumproject / $total->enam) *100, 2);
            }else{
                $report->jumprojectpercent = "";
            }
        }
        return view('laporaninsentif.index'
        ,[
            'ddInsentif'=>$ddInsentif,
            'reports'=>$reports,
            'total'=>$total,
            'percent'=>$percent,
            'getYear'=>$getYear
        ]
        );
    }

    public function show(Request $request, $tahun)
    {
        $authuser = Auth::user();
        if(!isset($authuser)){
            return redirect('/landing');
        }
        $total = new \stdClass();
        $total->satu = 0;
        $total->dua = 0;
        $total->tiga = 0;
        $total->empat = 0;
        $total->lima = 0;
        $total->enam = 0;
        $percent = new \stdClass();
        $percent->satu = 0;
        $percent->dua = 0;
        $percent->tiga = 0;
        $percent->empat = 0;
        $percent->lima = 0;
        $percent->enam = 0;

        if($request->tahun == null){
            $reports = Report::where('type', 4)
            ->where('tab2', $request->id_jenis_insentif)->where('tab20', $authuser->id)
            ->orderBy('tab3', 'ASC')->orderBy('tab2', 'ASC')->orderBy('tab1', 'ASC')->get();
        }
        if($request->id_jenis_insentif == null){
            $reports = Report::where('type', 4)
            ->where('tab3', $request->tahun)->where('tab20', $authuser->id)
            ->orderBy('tab3', 'ASC')->orderBy('tab2', 'ASC')->orderBy('tab1', 'ASC')->get();
        }
        if($request->id_jenis_insentif != null && $request->tahun != null){
            $reports = Report::where('type', 4)
            ->where('tab2', $request->id_jenis_insentif)
            ->where('tab3', $request->tahun)->where('tab20', $authuser->id)
            ->orderBy('tab3', 'ASC')->orderBy('tab2', 'ASC')->orderBy('tab1', 'ASC')->get();
        }
        if($request->id_jenis_insentif == null && $request->tahun == null){
            $reports = Report::where('type', 4)->where('tab20', $authuser->id)
            ->orderBy('tab3', 'ASC')->orderBy('tab2', 'ASC')->orderBy('tab1', 'ASC')->get();
        }

        $result = "";
        $foot = "";
        $num=1;
        foreach ($reports as $report) {
            $negeri = Negeri::where('U_Negeri_ID', $report->tab1)->first();
            $report->negeri = $negeri->Negeri;
            $jenisinsentif = JenisInsentif::where('id_jenis_insentif', $report->tab2)->first();
            $report->jenis = $jenisinsentif->nama_insentif;

            $total->satu = $total->satu + $report->tab4;
            $total->dua = $total->dua + $report->tab5;
            $total->tiga = $total->tiga + $report->tab6;
            $total->empat = $total->empat + $report->tab7;
            $total->lima = $total->lima + $report->tab8;

            $report->jumproject = $report->tab4 + $report->tab5 + $report->tab6 + $report->tab7 + $report->tab8;
            $total->enam = $total->enam + $report->jumproject;

        }
        foreach ($reports as $report) {
            if($total->satu != 0){
                $report->percent1 = round(($report->tab4/$total->satu)*100, 2);
            }
            if($total->dua != 0){
                $report->percent2 = round(($report->tab5/$total->dua)*100, 2);
            }
            if($total->tiga != 0){
                $report->percent3 = round(($report->tab6/$total->tiga)*100, 2);
            }
            if($total->empat != 0){
                $report->percent4 = round(($report->tab7/$total->empat)*100, 2);
            }
            if($total->lima != 0){
                $report->percent5 = round(($report->tab8/$total->lima)*100, 2);
            }
            
            $percent->satu = $total->satu / $total->enam *100;
            $percent->dua = $total->dua / $total->enam *100;
            $percent->tiga = $total->tiga / $total->enam *100;
            $percent->empat = $total->empat / $total->enam *100;
            $percent->lima = $total->lima / $total->enam *100;
            $percent->enam = 100;
            $report->jumprojectpercent = round(($report->jumproject / $total->enam) *100, 2);

            $result .= 
            '<tr class="align-middle" style="text-align: center;">
                <td class="text-nowrap" style="padding-right:2vh;">'.$num++.'</td>
                <td class="text-nowrap">'.$report->negeri.'</td>
                <td class="text-nowrap" style="text-align: left;">'.$report->jenis.'</td>
                <td class="text-nowrap">'.$report->tab3.'</td>
                <td class="text-nowrap">'.$report->tab4.'</td>
                <td class="text-nowrap">'.$report->percent1.'</td>
                <td class="text-nowrap">'.$report->tab5.'</td>
                <td class="text-nowrap">'.$report->percent2.'</td>
                <td class="text-nowrap">'.$report->tab6.'</td>
                <td class="text-nowrap">'.$report->percent3.'</td>
                <td class="text-nowrap">'.$report->tab7.'</td>
                <td class="text-nowrap">'.$report->percent4.'</td>
                <td class="text-nowrap">'.$report->tab8.'</td>
                <td class="text-nowrap">'.$report->percent5.'</td>
                <td class="text-nowrap" style="padding-left:2vh;">'.$report->jumproject.'</td>
                <td class="text-nowrap">'.$report->jumprojectpercent.'</td>
            </tr>';
        }
        $foot .=
        '<tr class="align-middle" style="text-align: center;">
            <td colspan="4">Jumlah</td>
            <td class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">'.$total->satu.'</td>
            <td class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">'.$percent->satu.'</td>
            <td class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">'.$total->dua.'</td>
            <td class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">'.$percent->dua.'</td>
            <td class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">'.$total->tiga.'</td>
            <td class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">'.$percent->tiga.'</td>
            <td class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">'.$total->empat.'</td>
            <td class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">'.$percent->empat.'</td>
            <td class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">'.$total->lima.'</td>
            <td class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">'.$percent->lima.'</td>
            <td class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">'.$total->enam.'</td>
            <td class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">'.$percent->enam.'</td>
        </tr>
        ';       

        return [$result, $foot];
    }
}
