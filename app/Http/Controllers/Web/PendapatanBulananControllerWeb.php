<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Insentif;
use App\Models\User;
use App\Models\Usahawan;
use App\Models\JenisInsentif;

class PendapatanBulananControllerWeb extends Controller
{
    public function index()
    {
        $pendbulanan = Insentif::All();
        foreach ($pendbulanan as $pendbulanan_L) {
            $User = User::where('id', $pendbulanan_L->id_pengguna)->first();
            if(isset($User->usahawanid) == true){
                $Usahawan = Usahawan::where('id', $User->usahawanid)->first();
                if(isset($Usahawan->U_Negeri_ID) == true){
                    $pendbulanan_L->negeri = $Usahawan->U_Negeri_ID;
                }
            }
        }
        $ddInsentif = JenisInsentif::where('status', 'aktif')->get();
        return view('pendapatanbulanan.index'
        ,[
            'pendbulanans'=>$pendbulanan,
            'ddInsentif'=>$ddInsentif
        ]
        );
    }

    public function show(Request $request, $tahun)
    {
        if($request->tahun == ""){
            $pendbulanan = Insentif::where('id_jenis_insentif', $request->id_jenis_insentif)
            ->get();
        }else if($request->id_jenis_insentif == ""){
            $pendbulanan = Insentif::where('tahun_terima_insentif', $request->tahun)
            ->get();
        }else{
            $pendbulanan = Insentif::where('tahun_terima_insentif', $request->tahun)
            ->where('id_jenis_insentif', $request->id_jenis_insentif)
            ->get();
        }
        
        $result = "";
        $num=1;
        foreach ($pendbulanan as $pendbulanan_L) {
            $User = User::where('id', $pendbulanan_L->id_pengguna)->first();
            if(isset($User->usahawanid) == true){
                $Usahawan = Usahawan::where('id', $User->usahawanid)->first();
                if(isset($Usahawan->U_Negeri_ID) == true){
                    $pendbulanan_L->negeri = $Usahawan->U_Negeri_ID;
                }
            }
            
            $result .= 
            '<tr class="align-middle">
                <td class="text-nowrap">'.$num++.'</td>
                <td class="text-nowrap">'.$pendbulanan_L->negeri.'</td>
                <td class="text-nowrap">'.$pendbulanan_L->id_jenis_insentif.'</td>
            </tr>';
        }

        return $result;
    }

}
