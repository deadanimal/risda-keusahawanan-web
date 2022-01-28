<?php

namespace App\Http\Controllers\Web\LPL;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Negeri;
use App\Models\Report;
use App\Models\Daerah;
use App\Models\Pegawai;

class PLStafNegeriControllerWeb extends Controller
{
    public function index()
    {
        $ddNegeri = Negeri::where('status', '1')->get();
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
        $reports = Report::where('type', 9)->where('tab20', $authuser->id)->where('tab2', $getYear)
        ->orderBy('tab2', 'ASC')
        ->orderBy('tab1', 'ASC')
        ->orderBy('tab3', 'ASC')
        ->get();

        foreach ($reports as $report) {
            $daerah = Daerah::select('Daerah')->where('U_Daerah_ID', $report->tab3)->first();
            if(isset($daerah)){
                $report->daerah = $daerah->Daerah;
            }else{
                $report->daerah = "";
            }
            $pegawai = Pegawai::select('nama')->where('id', $report->tab4)->first();
            if(isset($pegawai)){
                $report->pegawai = $pegawai->nama;
            }else{
                $report->pegawai = "";
            }
            
            
            $total->satu = $total->satu + $report->tab5;
            $total->dua = $total->dua + $report->tab6;
            $total->tiga = $total->tiga + $report->tab7;
            $total->empat = $total->empat + $report->tab8;
        }

        foreach ($reports as $report) {
            if(isset($report->tab5) && isset($total->satu)){
                $report->percent = round(($report->tab5/$total->satu *100), 2);
            }else{
                $report->percent = "";
            }
            
        }

        return view('pemantauanlawatan.pantaustafnegeri'
        ,[
            'ddNegeri'=>$ddNegeri,
            'reports'=>$reports,
            'total'=>$total
        ]
        );
    }

    public function show(Request $request)
    {
        $authuser = Auth::user();
        if(!isset($authuser)){
            return redirect('/landing');
        }

        if($request->tahun == null){
            $reports = Report::where('type', 9)
            ->where('tab1', $request->negeri)->where('tab20', $authuser->id)
            ->orderBy('tab2', 'ASC')->orderBy('tab1', 'ASC')->orderBy('tab3', 'ASC')->get();
        }
        if($request->negeri == null){
            $reports = Report::where('type', 9)
            ->where('tab2', $request->tahun)->where('tab20', $authuser->id)
            ->orderBy('tab2', 'ASC')->orderBy('tab1', 'ASC')->orderBy('tab3', 'ASC')->get();
        }
        if($request->negeri != null && $request->tahun != null){
            $reports = Report::where('type', 9)
            ->where('tab1', $request->negeri)
            ->where('tab2', $request->tahun)->where('tab20', $authuser->id)
            ->orderBy('tab2', 'ASC')->orderBy('tab1', 'ASC')->orderBy('tab3', 'ASC')->get();
        }
        if($request->negeri == null && $request->tahun == null){
            $reports = Report::where('type', 9)->where('tab20', $authuser->id)
            ->orderBy('tab2', 'ASC')->orderBy('tab1', 'ASC')->orderBy('tab3', 'ASC')->get();
        }

        $result = "";
        $foot = "";
        $num=1;

        $total = new \stdClass();
        $total->satu = 0;
        $total->dua = 0;
        $total->tiga = 0;
        $total->empat = 0;

        foreach ($reports as $report) {
            $daerah = Daerah::select('Daerah')->where('U_Daerah_ID', $report->tab3)->first();
            $report->daerah = $daerah->Daerah;
            $pegawai = Pegawai::select('nama')->where('id', $report->tab4)->first();
            $report->pegawai = $pegawai->nama;
            $total->satu = $total->satu + $report->tab5;
            $total->dua = $total->dua + $report->tab6;
            $total->tiga = $total->tiga + $report->tab7;
            $total->empat = $total->empat + $report->tab8;
        }

        foreach ($reports as $report) {
            $report->percent = round(($report->tab5/$total->satu *100), 2);
            $result .= 
            '<tr class="align-middle" style="text-align: center;">
                <td class="text-nowrap" style="padding-right:2vh;">'.$num++.'</td>
                <td class="text-nowrap">'.$report->daerah.'</td>
                <td class="text-nowrap">'.$report->pegawai.'</td>
                <td class="text-nowrap">'.$report->tab5.'</td>
                <td class="text-nowrap">'.$report->tab6.'</td>
                <td class="text-nowrap">'.$report->tab7.'</td>
                <td class="text-nowrap">'.$report->tab8.'</td>
                <td class="text-nowrap">'.$report->percent.'</td>
            </tr>';
        }        

        $tfoot = '<tr class="align-middle" style="text-align: center;">
            <th class="text-nowrap" colspan="3">Jumlah</th>
            <th class="text-nowrap">'.$total->satu.'</th>
            <th class="text-nowrap">'.$total->dua.'</th>
            <th class="text-nowrap">'.$total->tiga.'</th>
            <th class="text-nowrap">'.$total->empat.'</th>
            <th class="text-nowrap">100</th>
        </tr>';

        return [$result, $foot];
    }
}
