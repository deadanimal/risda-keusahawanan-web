<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
//use App\Models\Usahawan;

class UsahawanController extends Controller
{
    public function index()
    {
        //$pelanggan = Pelanggan::all();
        $users = User::all();
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
        return view('usahawan.tetapanusahawan',[
            'id'=>$id
        ]);
        //dd($id);
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
        return redirect('/usahawan');
    }

    public function store() {

    }
}
