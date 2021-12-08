<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PTController extends Controller
{
    public function index()
    {
        $pt = DB::table('pusat_tanggungjawabs')->get();

        // dd($daerah);
        return response()->json($pt);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
