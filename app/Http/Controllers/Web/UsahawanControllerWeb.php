<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Usahawan;

class UsahawanControllerWeb extends Controller
{
    public function index()
    {
        //$pelanggan = Pelanggan::all();
        $users = Usahawan::all();
        foreach ($users as $usahawan) {
            $status = User::where('usahawanid', $usahawan->id)->first();
            //dd($usahawan->id);
            $usahawan->status_pengguna = $status->status_pengguna;
        }
        //$users = DB::table('products')->where('title','LIKE','%'.$request->search."%")->get();
        // foreach ($User as $Users) {
        //dd($user);    
        // }
        return view('usahawan.index',[
            'users'=>$users
        ]);
    }

    public function show($id)
    {
        // return view('usahawan.tetapanusahawan',[
        //     'id'=>$id
        // ]);
    }

    public function update(Request $request, $id)
    {
        if ($request->status){
            $user = User::where('usahawanid', $id)->first();
            $user->status_pengguna = $request->status;
            $user->save();

        }else{
            $user = User::where('usahawanid', $id)->first();
            $user->name = $request->namausahawan;
            $user->email = $request->email;
            $user->nokadpengenalan = $request->nokadpengenalan;
            $user->save();

            $usahawan = Usahawan::where('id', $id)->first();
            $usahawan->namausahawan = $request->namausahawan;
            $usahawan->nokadpengenalan = $request->nokadpengenalan;
            $usahawan->tarikhlahir = $request->tarikhlahir;
            $usahawan->U_Jantina_ID = $request->U_Jantina_ID;
            $usahawan->U_Bangsa_ID = $request->U_Bangsa_ID;
            $usahawan->statusperkahwinan = $request->statusperkahwinan;
            $usahawan->U_Pendidikan_ID = $request->U_Pendidikan_ID;
            $usahawan->alamat1 = $request->alamat1;
            $usahawan->bandar = $request->bandar;
            $usahawan->poskod = $request->poskod;
            $usahawan->U_Negeri_ID = $request->U_Negeri_ID;
            $usahawan->U_Daerah_ID = $request->U_Daerah_ID;
            $usahawan->U_Mukim_ID = $request->U_Mukim_ID;
            $usahawan->U_Parlimen_ID = $request->U_Parlimen_ID;
            $usahawan->U_Dun_ID = $request->U_Dun_ID;
            $usahawan->U_Kampung_ID = $request->U_Kampung_ID;
            $usahawan->U_Seksyen_ID = $request->U_Seksyen_ID;
            $usahawan->id_kategori_usahawan = $request->id_kategori_usahawan;
            if($request->gambarusahawan()) {
                $path = $request->gambarusahawan('file')->store('uploads');
                $usahawan->gambar_url =  $path;
            }
            $usahawan->notelefon = $request->notelefon;
            $usahawan->nohp = $request->nohp;
            $usahawan->email = $request->email;
            
            $usahawan->save();
            //dd($usahawan->namausahawan);
        }

        return redirect('/usahawan');
    }

    public function store() {
        
    }
}
 