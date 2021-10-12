<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class PegawaiController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('pegawai.index'
        ,[
            'users'=>$users
        ]
        );
    }

    public function update(Request $request, $id)
    {
        echo $request->status;
        $user = User::where('id', $id)->first();
        if($request->status == 0){
            $user->status_pengguna = 1;
        }else{
            $user->status_pengguna = 0;
        }
        
        $user->save();
        return redirect('/pegawai');
    }

}
