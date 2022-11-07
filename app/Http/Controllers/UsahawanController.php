<?php

namespace App\Http\Controllers;

use App\Models\Usahawan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class UsahawanController extends Controller
{

    public function index()
    {
        $usahawan = DB::table('usahawans')
            ->join('users', 'users.usahawanid', 'usahawans.usahawanid')
            ->select('users.id as id_pengguna', 'usahawans.*')
            ->get();
        // dd($usahawan);
        return response()->json($usahawan);
    }

    public function store(Request $request)
    {

        $usahawan = new Usahawan();

        $usahawan->Kod_PT = $request->Kod_PT;
        $usahawan->namausahawan = $request->namausahawan;
        $usahawan->nokadpengenalan = $request->nokadpengenalan;
        $usahawan->tarikhlahir = $request->tarikhlahir;
        $usahawan->U_Jantina_ID = $request->U_Jantina_ID;
        $usahawan->U_Bangsa_ID = $request->U_Bangsa_ID;
        $usahawan->statusperkahwinan = $request->statusperkahwinan;
        $usahawan->U_Pendidikan_ID = $request->U_Pendidikan_ID;
        $usahawan->alamat1 = $request->alamat1;
        $usahawan->alamat2 = $request->alamat2;
        $usahawan->alamat3 = $request->alamat3;
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
        $usahawan->gambar_url = $request->gambar_url;
        $usahawan->notelefon = $request->notelefon;
        $usahawan->nohp = $request->nohp;
        $usahawan->email = $request->email;
        $usahawan->createdby_id = $request->createdby_id;
        $usahawan->createdby_kod_PT = $request->createdby_kod_PT;
        $usahawan->modifiedby_id = $request->modifiedby_id;
        $usahawan->modifiedby_kod_PT = $request->modifiedby_kod_PT;

        $usahawan->save();

        // return redirect("/usahawan");
        return response()->json($usahawan);
    }

    public function show($id)
    {
        // dd($id);
        $usahawan = Usahawan::where('usahawans.usahawanid', $id)
            ->join('perniagaans', 'perniagaans.usahawanid', 'usahawans.usahawanid')
            ->select(
                'perniagaans.U_Negeri_ID as negeri_perniagaan',
                'usahawans.gambar_url',
                'usahawans.Kod_PT',
                'usahawans.usahawanid',
                'usahawans.namausahawan',
                'usahawans.nokadpengenalan',
                'usahawans.tarikhlahir',
                'usahawans.U_Jantina_ID',
                'usahawans.U_Bangsa_ID',
                'usahawans.U_Etnik_ID',
                'usahawans.statusperkahwinan',
                'usahawans.U_Pendidikan_ID',
                'usahawans.U_Taraf_Pendidikan_Tertinggi_ID',
                'usahawans.alamat1',
                'usahawans.alamat2',
                'usahawans.alamat3',
                'usahawans.bandar',
                'usahawans.poskod',
                'usahawans.U_Negeri_ID',
                'usahawans.U_Daerah_ID',
                'usahawans.U_Mukim_ID',
                'usahawans.U_Parlimen_ID',
                'usahawans.U_Dun_ID',
                'usahawans.U_Kampung_ID',
                'usahawans.U_Seksyen_ID',
                'usahawans.status_daftar_usahawan',
                'usahawans.id_kategori_usahawan',
                'usahawans.notelefon',
                'usahawans.nohp',
                'usahawans.email',
                // 'usahawans.',
            )
            ->get()->first();
        return response()->json($usahawan);
    }

    public function update(Request $request, $id)
    {

        $usahawan = Usahawan::where('usahawanid', $id)->get()->first();

        $image = $request->gambar_url; // your base64 encoded
        $ext = explode(';base64', $image);
        $ext = explode('/', $ext[0]);
        $ext = $ext[1];

        $image = str_replace('data:image/' . $ext . ';base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = $id . '.' . $ext;
        $result = File::put(public_path() . '/storage/images/usahawan/' . $imageName, base64_decode($image));

        // $usahawan->Kod_PT = $request->Kod_PT;
        // $usahawan->namausahawan = $request->namausahawan;
        // $usahawan->nokadpengenalan = $request->nokadpengenalan;
        $usahawan->tarikhlahir = $request->tarikhlahir;
        $usahawan->U_Jantina_ID = $request->U_Jantina_ID;
        $usahawan->U_Bangsa_ID = $request->U_Bangsa_ID;
        $usahawan->U_Etnik_ID = $request->U_Etnik_ID;
        $usahawan->statusperkahwinan = $request->statusperkahwinan;
        $usahawan->U_Pendidikan_ID = $request->U_Pendidikan_ID;
        $usahawan->U_Taraf_Pendidikan_Tertinggi_ID = $request->U_Taraf_Pendidikan_Tertinggi_ID;
        $usahawan->alamat1 = $request->alamat1;
        $usahawan->alamat2 = $request->alamat2;
        $usahawan->alamat3 = $request->alamat3;
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
        // $usahawan->gambar_url = $request->gambar_url;
        $usahawan->gambar_url = "/images/usahawan/" . $imageName;
        $usahawan->notelefon = $request->notelefon;
        $usahawan->nohp = $request->nohp;
        $usahawan->email = $request->email;
        $usahawan->createdby_id = $request->createdby_id;
        $usahawan->createdby_kod_PT = $request->createdby_kod_PT;
        $usahawan->modifiedby_id = $request->modifiedby_id;
        $usahawan->modifiedby_kod_PT = $request->modifiedby_kod_PT;

        $usahawan->status_daftar_usahawan = $request->status_daftar_usahawan;

        $usahawan->save();

        $user = User::where('usahawanid', $id)->get()->first();
        $user->profile_status = 1;
        $user->email = $request->email;
        $user->save();

        // return redirect("/usahawan");
        return response()->json($usahawan);
    }

    public function destroy(Usahawan $usahawan)
    {
        //
    }
}
