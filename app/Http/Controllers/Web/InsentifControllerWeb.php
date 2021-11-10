<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usahawan;
use App\Models\Insentif;
use App\Models\JenisInsentif;
use App\Models\Report;

class InsentifControllerWeb extends Controller
{
    public function index()
    {
        $users = Usahawan::all();
        return view('insentif.index'
        ,[
            'users'=>$users
        ]
        );
    }

    public function show($id)
    {
        $insentifs = Insentif::where('id_pengguna', $id)->get();
        $ddInsentif = JenisInsentif::where('status', 'aktif')->get();
        $usahawan = Usahawan::where('id', $id)->first();
            //where('status_insentif', 'aktif')->get();
        //dd($insentifs);
        return view('insentif.insentifdetail'
        ,[
            'insentifs'=>$insentifs,
            'id_pengguna'=>$id,
            'ddInsentif'=>$ddInsentif,
            'negeri'=>$usahawan->U_Negeri_ID,
            'daerah'=>$usahawan->U_Daerah_ID,
            'dun'=>$usahawan->U_Dun_ID
        ]
        );
    }
    
    public function store(Request $request)
    {
        $userId = $request->user()->id;
        $insentif = new Insentif();

        $insentif->id_pengguna = $request->id_pengguna;
        $insentif->id_jenis_insentif = $request->id_jenis_insentif;
        $insentif->tahun_terima_insentif = $request->tahun_terima_insentif;
        $insentif->nilai_insentif = $request->nilai_insentif;
        $insentif->created_by = $userId;
        $insentif->modified_by = $userId;
        $insentif->save();
        
        $r_insentifs = Report::all();
        
        if($r_insentifs->count()==0){
            $this->newreport(1,$request,$insentif->id);
        }else{
            foreach ($r_insentifs as $r_insentif) {
                if ($r_insentif->tab3 == $request->tahun_terima_insentif) {
                    if ($r_insentif->tab2 == $request->id_jenis_insentif) {
                        if ($r_insentif->tab1 == $request->negeri) {
                            if($r_insentif->tab8 == $request->daerah){
                                if($r_insentif->tab9 == $request->dun){
                                    $r_insentif->tab4 = $r_insentif->tab4 + 1;
                                    $r_insentif->tab5 = $r_insentif->tab5 + $request->nilai_insentif;
                                    $r_insentif->save();
                                    break;
                                }
                                if($r_insentif->tab9 == null){
                                    $r_insentif->tab4 = $r_insentif->tab4 + 1;
                                    $r_insentif->tab5 = $r_insentif->tab5 + $request->nilai_insentif;
                                    $r_insentif->save();
                                    $this->newreport(3,$request,$insentif->id);
                                    break;
                                }
                            }
                            if($r_insentif->tab8 == null){
                                $r_insentif->tab4 = $r_insentif->tab4 + 1;
                                $r_insentif->tab5 = $r_insentif->tab5 + $request->nilai_insentif;
                                $r_insentif->save();
                                $this->newreport(2,$request,$insentif->id);
                                break;
                            }
                        }else{
                            $this->newreport(1,$request,$insentif->id);
                            break;
                        }
                    }else{
                        $this->newreport(1,$request,$insentif->id);
                        break;
                    }
                }else{
                    $this->newreport(1,$request,$insentif->id);
                    break;
                }
            }
        }
        
        echo '<script language="javascript">';
        echo 'alert("Insentif Berjaya Di Simpan")';
        echo '</script>';
        return redirect('/insentifdetail/'.$request->id_pengguna);
    }

    public function newreport($type, $request, $insenID){
        if($type == 1){
            $report = new Report();
            $report->type = 1;
            $report->tab1 = $request->negeri;
            $report->tab2 = $request->id_jenis_insentif;
            $report->tab3 = $request->tahun_terima_insentif;
            $report->tab4 = 1;
            $report->tab5 = $request->nilai_insentif;
            $report->tab10 = $insenID;
            $report->save();

            $report = new Report();
            $report->type = 2;
            $report->tab1 = $request->negeri;
            $report->tab2 = $request->id_jenis_insentif;
            $report->tab3 = $request->tahun_terima_insentif;
            $report->tab4 = 1;
            $report->tab5 = $request->nilai_insentif;
            $report->tab8 = $request->daerah;
            $report->tab10 = $insenID;
            $report->save();

            $report = new Report();
            $report->type = 3;
            $report->tab1 = $request->negeri;
            $report->tab2 = $request->id_jenis_insentif;
            $report->tab3 = $request->tahun_terima_insentif;
            $report->tab4 = 1;
            $report->tab5 = $request->nilai_insentif;
            $report->tab8 = $request->daerah;
            $report->tab9 = $request->dun;
            $report->tab10 = $insenID;
            $report->save();

        }else if($type == 2){
            $report = new Report();
            $report->type = 2;
            $report->tab1 = $request->negeri;
            $report->tab2 = $request->id_jenis_insentif;
            $report->tab3 = $request->tahun_terima_insentif;
            $report->tab4 = 1;
            $report->tab5 = $request->nilai_insentif;
            $report->tab8 = $request->daerah;
            $report->tab10 = $insenID;
            $report->save();

            $report = new Report();
            $report->type = 3;
            $report->tab1 = $request->negeri;
            $report->tab2 = $request->id_jenis_insentif;
            $report->tab3 = $request->tahun_terima_insentif;
            $report->tab4 = 1;
            $report->tab5 = $request->nilai_insentif;
            $report->tab8 = $request->daerah;
            $report->tab9 = $request->dun;
            $report->tab10 = $insenID;
            $report->save();

        }else if($type == 3){
            $report = new Report();
            $report->type = 3;
            $report->tab1 = $request->negeri;
            $report->tab2 = $request->id_jenis_insentif;
            $report->tab3 = $request->tahun_terima_insentif;
            $report->tab4 = 1;
            $report->tab5 = $request->nilai_insentif;
            $report->tab8 = $request->daerah;
            $report->tab9 = $request->dun;
            $report->tab10 = $insenID;
            $report->save();
        }
    }

    public function update(Request $request, $id)
    {
        $userId = $request->user()->id;
        $insentif = Insentif::where('id', $id)->first();

        $insentif->id_pengguna = $request->id_pengguna;
        $insentif->id_jenis_insentif = $request->id_jenis_insentif;
        $insentif->tahun_terima_insentif = $request->tahun_terima_insentif;
        $insentif->nilai_insentif = $request->nilai_insentif;
        $insentif->modified_by = $userId;
        $insentif->save();

        echo '<script language="javascript">';
        echo 'alert("Insentif Berjaya Di Ubah")';
        echo '</script>'; 
        return redirect('/insentifdetail/'.$request->id_pengguna);
    }

    public function destroy($id)
    {
        $insentif=Insentif::find($id);
        $insentif->delete();

        echo '<script language="javascript">';
        echo 'alert("Insentif Berjaya Di Buang")';
        echo '</script>';
        return redirect(url()->previous());
    }
}
