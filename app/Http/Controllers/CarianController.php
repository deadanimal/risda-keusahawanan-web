<?php

namespace App\Http\Controllers;

use App\Models\Usahawan;
use Illuminate\Http\Request;

use PDF;

class CarianController extends Controller
{
    

    public function carianUsahawan($input){

        $usahawan = Usahawan::where('nokadpengenalan', $input)
        ->orWhere('namausahawan', $input)
        ->orWhere('usahawanid', $input)
        ->get();

        return response()->json($usahawan);

    }

    public function downloadCarian($id){

       
        $usahawan = Usahawan::where('usahawanid', $id)
        ->get()->first();


        $pdf = PDF::loadView('pdf.maklumat_usahawan', [
            'usahawan'=> $usahawan
        ]);

        // $pdf->render();

        // $fname = time() . '-maklumat-usahawan-'. $id .'.pdf';

        // \Storage::put('maklumat-usahawan/' . $fname, $pdf->output());

        // // dd($file);

        // return response()->json("maklumat-usahawan/".$fname);

    }
}
