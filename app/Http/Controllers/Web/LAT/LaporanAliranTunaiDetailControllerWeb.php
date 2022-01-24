<?php

namespace App\Http\Controllers\Web\LAT;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Report;
use App\Models\KategoriAliran;

class LaporanAliranTunaiDetailControllerWeb extends Controller
{
    public function index()
    {
        $authuser = Auth::user();
        if(!isset($authuser)){
            return redirect('/landing');
        }
        $getYear = date("Y");
        $reports = Report::where('type', 11)
        ->where('tab20', $authuser->id)
        ->whereIn('tab2', [$getYear,1000])
        ->orderBy('tab8', 'ASC')
        ->orderBy('tab2', 'ASC')
        ->orderBy('tab1', 'ASC')
        ->get();

        $total = new \stdClass();
        $total->satu = 0;
        $total->dua = 0;
        $total->tiga = 0;

        foreach ($reports as $report) {
            $kate_aliran = KategoriAliran::where('id', $report->tab4)->first();
            if(isset($kate_aliran)){
                $report->nama_jenis = $kate_aliran->nama_kategori_aliran;
            }
            if($report->tab1 != 1000){
                $report->total = $report->tab6 - $report->tab7;
            }
            if($report->tab8 <= 2){
                $total->satu = $total->satu + $report->total;
            }else if($report->tab8 == 3){
                $total->dua = $total->dua + $report->total;
            }
        }

        $total->tiga = $total->satu + $total->dua;

        return view('laporanalirantunai.bukutunaidetail'
        ,[
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

        // if($request->tahun == null){
        //     $reports = Report::where('type', 11)
        //     ->where('tab1', $request->bulan)->where('tab20', $authuser->id)
        //     ->orderBy('tab8', 'ASC')->orderBy('tab2', 'ASC')->orderBy('tab1', 'ASC')->get();
        // }
        if($request->bulan == null){
            $reports = Report::where('type', 11)
            ->whereIn('tab2', [$request->tahun,1000])->where('tab20', $authuser->id)
            ->orderBy('tab8', 'ASC')->orderBy('tab2', 'ASC')->orderBy('tab1', 'ASC')->get();
        }
        if($request->bulan != null && $request->tahun != null){
            $reports = Report::where('type', 11)
            ->whereIn('tab1', [$request->bulan,1000])
            ->whereIn('tab2', [$request->tahun,1000])->where('tab20', $authuser->id)
            ->orderBy('tab8', 'ASC')->orderBy('tab2', 'ASC')->orderBy('tab1', 'ASC')->get();
        }

        $result = "";
        $index = 0;
        $total = new \stdClass();
        $total->satu = 0;
        $total->dua = 0;
        $total->tiga = 0;
        foreach ($reports as $report) {
            if($report->tab1 != 1000){
                $report->total = $report->tab6 - $report->tab7;
            }
            if($report->tab8 <= 2){
                $total->satu = $total->satu + $report->total;
            }else if($report->tab8 == 3){
                $total->dua = $total->dua + $report->total;
            }
        }
        $total->tiga = $total->satu + $total->dua;

        foreach ($reports as $report) {
            $index++;
            $kate_aliran = KategoriAliran::where('id', $report->tab4)->first();
            if(isset($kate_aliran)){
                $report->nama_jenis = $kate_aliran->nama_kategori_aliran;
            }  
            $count = 1;

            if($index == 1 && $report->tab8 == 1){
                $result .= '<tr class="align-middle" style="text-align: left;">
                    <td></td>
                    <td class="text-nowrap">A) PENDAPATAN AKTIF</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>';
            }
            if($report->tab8 == 1){
                $result .='<tr class="align-middle" style="text-align: center;">
                    <td class="text-nowrap">'.$report->tab3.'</td>
                    <td class="text-nowrap">'.$report->nama_jenis.'</td>
                    <td class="text-nowrap">'.$report->tab5.'</td>
                    <td class="text-nowrap">'.$report->tab6.'</td>
                    <td class="text-nowrap">'.$report->tab7.'</td>
                    <td class="text-nowrap">'.$report->total.'</td>
                </tr>';
            }
            if($report->tab8 == 2 && $count != 3){
                $count = 2;
            }
            if($report->tab8 == 2 && $count == 2){
                $count = 3;
                $result .='<tr class="align-middle" style="text-align: left;">
                    <td></td>
                    <td class="text-nowrap">B) PENDAPATAN PASIF</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>';
            }
            if($report->tab8 == 2){
                $result .= '<tr class="align-middle" style="text-align: center;">
                    <td class="text-nowrap">'.$report->tab3.'</td>
                    <td class="text-nowrap">'.$report->nama_jenis.'</td>
                    <td class="text-nowrap">'.$report->tab5.'</td>
                    <td class="text-nowrap">'.$report->tab6.'</td>
                    <td class="text-nowrap">'.$report->tab7.'</td>
                    <td class="text-nowrap">'.$report->total.'</td>
                </tr>';
            }
            if($report->tab8 == 3 && $count != 4){
                $count = 3;
            }
            if($report->tab8 == 3 && $count == 3){
                $result .= '<tr class="align-middle" style="text-align: left;">
                    <td></td>
                    <td class="text-nowrap">C) JUMLAH ALIRAN MASUK (RM)</td>
                    <td style="text-align: center;">'.$total->satu.'</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>';
            }
            if($report->tab8 == 3 && $count == 3){
                // return $report->tab8;
                $count = 4;
                $result .='<tr class="align-middle" style="text-align: left;">
                    <td></td>
                    <td class="text-nowrap">D) PERBELANJAAN PERNIAGAAN (RM)</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>';
            }
            if($report->tab8 == 3){
                $result .= '<tr class="align-middle" style="text-align: center;">
                    <td class="text-nowrap">'.$report->tab3.'</td>
                    <td class="text-nowrap">'.$report->nama_jenis.'</td>
                    <td class="text-nowrap">'.$report->tab5.'</td>
                    <td class="text-nowrap">'.$report->tab6.'</td>
                    <td class="text-nowrap">'.$report->tab7.'</td>
                    <td class="text-nowrap">'.$report->total.'</td>
                </tr>';
            }
        }
        if($count == 4){
            $result .='<tr class="align-middle" style="text-align: left;">
                <td></td>
                <td class="text-nowrap">G) JUMLAH ALIRAN KELUAR</td>
                <td style="text-align: center;">'.$total->dua.'</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            ';
        }
        $result .='
        <tr class="align-middle" style="text-align: left;">
            <td></td>
            <td class="text-nowrap">JUMLAH BAKI/SIMPANAN</td>
            <td style="text-align: center;">'.$total->tiga.'</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>';
        return $result;
    }
}
