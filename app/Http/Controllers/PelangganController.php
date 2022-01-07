<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Stok;
use App\Models\Katalog;
// use Doctrine\DBAL\Driver\Mysqli\Initializer\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Facades\Excel;

use PDF;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\Date;

class PelangganController extends Controller
{

    public function index()
    {
        $pelanggan = Pelanggan::all();
        return response()->json($pelanggan);
    }

    public function store(Request $request)
    {
        $pelanggan = new Pelanggan();

        $pelanggan->nama_pelanggan = $request->nama_pelanggan;
        $pelanggan->alamat1 = $request->alamat1;
        $pelanggan->alamat2 = $request->alamat2;
        $pelanggan->alamat3 = $request->alamat3;
        $pelanggan->poskod = $request->poskod;
        $pelanggan->U_Negeri_ID = $request->U_Negeri_ID;
        $pelanggan->U_Daerah_ID = $request->U_Daerah_ID;
        $pelanggan->no_telefon = $request->no_telefon;
        $pelanggan->no_fax = $request->no_fax;

        $pelanggan->cukai_sst = $request->cukai_sst;
        $pelanggan->kos_penghantaran = $request->kos_penghantaran;
        $pelanggan->diskaun = $request->diskaun;

        $pelanggan->save();

        return response()->json($pelanggan);
    }


    public function show($id)
    {

        // $pelanggan = DB::table('katalogs')
        // ->join('stoks', 'katalogs.id', 'stoks.id_katalog')
        // ->join('pelanggans', 'stoks.id_pelanggan', 'pelanggans.id' )
        // ->select('katalogs.*', 'pelanggans.*', 'stoks.id', 'stoks.id_pelanggan')
        // ->where('id_pengguna', $id)
        // ->groupBy('stoks.id_pelanggan')
        // // ->count('stoks.id_pelanggan');
        // ->get();

        $pelanggan = DB::table('stoks')
            ->join('katalogs', 'katalogs.id', 'stoks.id_katalog')
            ->join('pelanggans', 'stoks.id_pelanggan', 'pelanggans.id')
            ->select('pelanggans.*', 'stoks.id', 'stoks.id_pelanggan')
            ->where('id_pengguna', $id)->distinct()
            // ->groupBy('stoks.id_pelanggan')
            // ->count('stoks.id_pelanggan')
            ->get();


        // dd($pelanggan);

        return response()->json($pelanggan);
    }

    public function update(Request $request, Pelanggan $pelanggan)
    {
        $pelanggan->nama_pelanggan = $request->nama_pelanggan;
        $pelanggan->alamat1 = $request->alamat1;
        $pelanggan->alamat2 = $request->alamat2;
        $pelanggan->alamat3 = $request->alamat3;
        $pelanggan->poskod = $request->poskod;
        $pelanggan->U_Negeri_ID = $request->U_Negeri_ID;
        $pelanggan->U_Daerah_ID = $request->U_Daerah_ID;
        $pelanggan->no_telefon = $request->no_telefon;
        $pelanggan->no_fax = $request->no_fax;

        $pelanggan->cukai_sst = $request->cukai_sst;
        $pelanggan->kos_penghantaran = $request->kos_penghantaran;
        $pelanggan->diskaun = $request->diskaun;

        $pelanggan->save();

        return response()->json($pelanggan);
    }


    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();

        return response()->json($pelanggan);
    }


    public function janaDokumen($id)
    {
        // dd($id);
        $pelanggan = DB::table('pelanggans', 'pelanggans.id', $id)
            ->get()->first();

        // dd($pelanggan);

        $stok = DB::table('stoks')
            ->join('katalogs', 'katalogs.id', 'stoks.id_katalog')
            ->where('stoks.id_pelanggan', $id)
            ->get();
        // dd($stok);

        $today = date("d/m/Y");
        // dd($today);


        $pdff = new Dompdf();
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $pdff->setOptions($options);
        $pdff->loadHtml(view('pdf.jana_dokumen', [
            'stoks' => $stok,
            'today' => $today
            // 'no_dpa' => $no_dpa
        ]));
        $customPaper = array(2, -35, 480, 627);
        $pdff->setPaper($customPaper);
        $pdff->render();
        $pdff->stream(
            "newdompdf",
            array("Attachment" => false)
        );

        exit(0);
    }
}
