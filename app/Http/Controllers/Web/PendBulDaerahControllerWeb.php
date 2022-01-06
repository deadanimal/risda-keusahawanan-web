<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\JenisInsentif;
use App\Models\Report;
use App\Models\Negeri;
use App\Models\Daerah;
use PDF;
use Exception;

class PendBulDaerahControllerWeb extends Controller
{
    public function index()
    {
        try{
            $ddInsentif = JenisInsentif::where('status', 'aktif')->get();
            $reports = Report::where('type', 2)
            ->orderBy('tab3', 'ASC')->orderBy('tab2', 'ASC')->orderBy('tab1', 'ASC')->orderBy('tab8', 'ASC')->get();

            $c_penerima = 0;
            $c_insentif = 0;
            foreach ($reports as $report) {
                $negeri = Negeri::where('U_Negeri_ID', $report->tab1)->first();
                $report->negeri = $negeri->Negeri;
                $jenisinsentif = JenisInsentif::where('id_jenis_insentif', $report->tab2)->first();
                $report->jenis = $jenisinsentif->nama_insentif;
                $daerah = Daerah::where('U_Daerah_ID', $report->tab8)->first();
                $report->daerah = $daerah->Daerah;
                $c_penerima = $c_penerima + $report->tab4;
                $c_insentif = $c_insentif + $report->tab5;
            }
        }
        catch(Exception $e){

        }
        

        return view('pendapatanbulanan.pendbulDaerah'
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
        try{
            if($request->tahun == null){
                $reports = Report::where('type', 2)
                ->where('tab2', $request->id_jenis_insentif)
                ->orderBy('tab3', 'ASC')->orderBy('tab2', 'ASC')->orderBy('tab1', 'ASC')->orderBy('tab8', 'ASC')->get();
            }
            if($request->id_jenis_insentif == null){
                $reports = Report::where('type', 2)
                ->where('tab3', $request->tahun)
                ->orderBy('tab3', 'ASC')->orderBy('tab2', 'ASC')->orderBy('tab1', 'ASC')->orderBy('tab8', 'ASC')->get();
            }
            if($request->id_jenis_insentif != null && $request->tahun != null){
                $reports = Report::where('type', 2)
                ->where('tab2', $request->id_jenis_insentif)
                ->where('tab3', $request->tahun)
                ->orderBy('tab3', 'ASC')->orderBy('tab2', 'ASC')->orderBy('tab1', 'ASC')->orderBy('tab8', 'ASC')->get();
            }
            if($request->id_jenis_insentif == null && $request->tahun == null){
                $reports = Report::where('type', 2)
                ->orderBy('tab3', 'ASC')->orderBy('tab2', 'ASC')->orderBy('tab1', 'ASC')->orderBy('tab8', 'ASC')->get();
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
                $daerah = Daerah::where('U_Daerah_ID', $report->tab8)->first();
                $report->daerah = $daerah->Daerah;
                $c_penerima = $c_penerima + $report->tab4;
                $c_insentif = $c_insentif + $report->tab5;
    
                $result .= 
                '<tr class="align-middle" style="text-align: center;">
                    <td class="text-nowrap" style="padding-right:2vh;"><label class="form-check-label">'.$report->negeri.'</label></td>
                    <td class="text-nowrap"><label class="form-check-label">'.$report->daerah.'</label></td>
                    <td class="text-nowrap" style="text-align: left;"><label class="form-check-label">'.$report->jenis.'</label></td>
                    <td class="text-nowrap"><label class="form-check-label">'.$report->tab3.'</label></td>
                    <td class="text-nowrap"><label class="form-check-label">'.$report->tab4.'</label></td>
                    <td class="text-nowrap"><label class="form-check-label">'.$report->tab5.'</label></td>
                </tr>';
            }
            $result .=
            '<tr class="align-middle" style="text-align: center;">
                <td colspan="4"></td>
                <td class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;"><label class="form-check-label">'.$c_penerima.'</label></td>
                <td class="text-nowrap" style="border-top: 1px solid black;border-bottom: 1px solid black;"><label class="form-check-label">'.$c_insentif.'</label></td>
            </tr>
            ';       
    
            return $result;
        }
        catch(Exception $e){}
    }

}
