<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\JenisInsentif;
use App\Models\Report;
use App\Models\Negeri;

class InsentifJenisControllerWeb extends Controller
{
    public function index()
    {
        $ddInsentif = JenisInsentif::where('status', 'aktif')->get();
        $authuser = Auth::user();
        if(!isset($authuser)){
            return redirect('/landing');
        }
        $getYear = date("Y");
        $getMonth = date("m");
        $reports = Report::where('type', 5)->where('tab3', $getYear)->where('tab20', $authuser->id)
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
        $total->tujuh = 0;
        $rm = new \stdClass();
        $rm->satu = 0;
        $rm->dua = 0;
        $rm->tiga = 0;
        $rm->empat = 0;
        $rm->lima = 0;
        $rm->enam = 0;
        $rm->tujuh = 0;

        $avg = new \stdClass();
        $avg->satu = 0;
        $avg->dua = 0;
        $avg->tiga = 0;
        $avg->empat = 0;
        $avg->lima = 0;
        $avg->enam = 0;

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

            try{
                if(isset($report->tab4)&&isset($report->tab6 )&&isset($report->tab8)&&isset($report->tab10)&&isset($report->tab12)){
                    $report->jumbil = $report->tab4 + $report->tab6 + $report->tab8 + $report->tab10 + $report->tab12;
                }else{
                    $report->jumbil = 0;
                }
                if(isset($report->tab5)&&isset($report->tab7)&&isset($report->tab9)&&isset($report->tab11)&&isset($report->tab13)){
                    $report->jumrm = $report->tab5 + $report->tab7 + $report->tab9 + $report->tab11 + $report->tab13;
                }else{
                    $report->jumrm = 0;
                }
                
                if(isset($report->jumrm) && isset($report->jumbil)){
                    $report->puratajual = ($report->jumrm / $report->jumbil) /$getMonth;
                    $report->puratapend = $report->puratajual * 0.3;
                }else{
                    $report->puratajual = 0;
                    $report->puratapend = 0;
                }
                
                

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

                $total->tujuh = $total->tujuh + $report->puratajual;
                $rm->tujuh = $rm->tujuh + $report->puratapend;
            }catch(Exception $e){

            }
            
        }

        foreach ($reports as $report) {
            if($total->satu != 0){
                $avg->satu = $rm->satu / $total->satu;}
            if($total->dua != 0){
                $avg->dua = $rm->dua / $total->dua;}
            if($total->tiga != 0){
                $avg->tiga = $rm->tiga / $total->tiga;}
            if($total->empat != 0){
                $avg->empat = $rm->empat / $total->empat;}
            if($total->lima != 0){
                $avg->lima = $rm->lima / $total->lima;}
            if($total->enam != 0){
                $avg->enam = $rm->enam / $total->enam;}
        }

        return view('laporaninsentif.insenjenis'
        ,[
            'ddInsentif'=>$ddInsentif,
            'reports'=>$reports,
            'total'=>$total,
            'rm'=>$rm,
            'getYear'=>$getYear,
            'avg'=>$avg
        ]
        );
    }

    public function show(Request $request, $tahun)
    {
        $authuser = Auth::user();
        if(!isset($authuser)){
            return redirect('/landing');
        }
        $getYear = date("Y");
        $total = new \stdClass();
        $total->satu = 0;
        $total->dua = 0;
        $total->tiga = 0;
        $total->empat = 0;
        $total->lima = 0;
        $total->enam = 0;
        $total->tujuh = 0;
        $rm = new \stdClass();
        $rm->satu = 0;
        $rm->dua = 0;
        $rm->tiga = 0;
        $rm->empat = 0;
        $rm->lima = 0;
        $rm->enam = 0;
        $rm->tujuh = 0;
        $avg = new \stdClass();
        $avg->satu = 0;
        $avg->dua = 0;
        $avg->tiga = 0;
        $avg->empat = 0;
        $avg->lima = 0;
        $avg->enam = 0;

        if($request->tahun == null){
            $reports = Report::where('type', 5)
            ->where('tab2', $request->id_jenis_insentif)->where('tab3', $getYear)->where('tab20', $authuser->id)
            ->orderBy('tab3', 'ASC')->orderBy('tab2', 'ASC')->orderBy('tab1', 'ASC')->get();
        }
        if($request->id_jenis_insentif == null){
            $reports = Report::where('type', 5)
            ->where('tab3', $request->tahun)->where('tab20', $authuser->id)
            ->orderBy('tab3', 'ASC')->orderBy('tab2', 'ASC')->orderBy('tab1', 'ASC')->get();
        }
        if($request->id_jenis_insentif != null && $request->tahun != null){
            $reports = Report::where('type', 5)
            ->where('tab2', $request->id_jenis_insentif)
            ->where('tab3', $request->tahun)->where('tab20', $authuser->id)
            ->orderBy('tab3', 'ASC')->orderBy('tab2', 'ASC')->orderBy('tab1', 'ASC')->get();
        }
        if($request->id_jenis_insentif == null && $request->tahun == null){
            $reports = Report::where('type', 5)->where('tab3', $getYear)->where('tab20', $authuser->id)
            ->orderBy('tab3', 'ASC')->orderBy('tab2', 'ASC')->orderBy('tab1', 'ASC')->get();
        }
        $getYear = date("Y");
        if($request->tahun == $getYear ){
            $getMonth = date("m");
        }else{
            $getMonth = 12;
        }
        

        $result = "";
        $foot = "";
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
            $report->puratajual = ($report->jumrm / $report->jumbil) /$getMonth;
            $report->puratapend = $report->puratajual * 0.3;

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

            $total->tujuh = $total->tujuh + $report->puratajual;
            $rm->tujuh = $rm->tujuh + $report->puratapend;

            $result .= 
            '<tr class="align-middle" style="text-align: center;">
                <td class="text-nowrap" style="padding-right:2vh;">'.$num++.'</td>
                <td class="text-nowrap">'.$report->negeri.'</td>
                <td class="text-nowrap" style="text-align: left;">'.$report->jenis.'</td>
                <td class="text-nowrap">'.$report->tab3.'</td>
                <td class="text-nowrap">'.$report->tab4.'</td>
                <td class="text-nowrap">'.$report->tab5.'</td>
                <td class="text-nowrap">'.$report->tab6.'</td>
                <td class="text-nowrap">'.$report->tab7.'</td>
                <td class="text-nowrap">'.$report->tab8.'</td>
                <td class="text-nowrap">'.$report->tab9.'</td>
                <td class="text-nowrap">'.$report->tab10.'</td>
                <td class="text-nowrap">'.$report->tab11.'</td>
                <td class="text-nowrap">'.$report->tab12.'</td>
                <td class="text-nowrap">'.$report->tab13.'</td>
                <td class="text-nowrap">'.$report->jumbil.'</td>
                <td class="text-nowrap">'.$report->jumrm.'</td>
                <td class="text-nowrap">'.$report->puratajual.'</td>
                <td class="text-nowrap">'.$report->puratapend.'</td>
            </tr>';
        }

        foreach ($reports as $report) {
            if($total->satu != 0){
                $avg->satu = $rm->satu / $total->satu;}
            if($total->dua != 0){
                $avg->dua = $rm->dua / $total->dua;}
            if($total->tiga != 0){
                $avg->tiga = $rm->tiga / $total->tiga;}
            if($total->empat != 0){
                $avg->empat = $rm->empat / $total->empat;}
            if($total->lima != 0){
                $avg->lima = $rm->lima / $total->lima;}
            if($total->enam != 0){
                $avg->enam = $rm->enam / $total->enam;}
        }

        $foot = 
        '<tr class="align-middle" style="text-align: center;">
            <th colspan="4" style="border-top: 1px solid black;border-bottom: 1px solid black;">JUMLAH</th>
            <th class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">'.$total->satu.'</th>
            <th class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">'.$rm->satu.'</th>
            <th class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">'.$total->dua.'</th>
            <th class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">'.$rm->dua.'</th>
            <th class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">'.$total->tiga.'</th>
            <th class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">'.$rm->tiga.'</th>
            <th class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">'.$total->empat.'</th>
            <th class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">'.$rm->empat.'</th>
            <th class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">'.$total->lima.'</th>
            <th class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">'.$rm->lima.'</th>
            <th class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">'.$total->enam.'</th>
            <th class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">'.$rm->enam.'</th>
            <th class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">'.$total->tujuh.'</th>
            <th class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;">'.$rm->tujuh.'</th>
        </tr>
        <tr class="align-middle" style="text-align: center;">
            <th colspan="4" style="border-bottom: 1px solid black;">Purata Jualan</th>
            <th colspan="2" style="border-bottom: 1px solid black;">'.$avg->satu.'</th>
            <th colspan="2" style="border-bottom: 1px solid black;">'.$avg->dua.'</th>
            <th colspan="2" style="border-bottom: 1px solid black;">'.$avg->tiga.'</th>
            <th colspan="2" style="border-bottom: 1px solid black;">'.$avg->empat.'</th>
            <th colspan="2" style="border-bottom: 1px solid black;">'.$avg->lima.'</th>
            <th colspan="2" style="border-bottom: 1px solid black;">'.$avg->enam.'</th>
            <th colspan="2" style="border-bottom: 1px solid black;"></th>
        </tr>
        ';
        
        return [$result, $foot];
    }
}

?>