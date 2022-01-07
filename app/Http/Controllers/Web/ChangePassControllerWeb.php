<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePassControllerWeb extends Controller
{
    public function index()
    {
        return view('ChangePass');
    }

    public function store(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
        $check = Hash::check($request->current_password, auth()->user()->password);
        if($check == false){
            echo '<script language="javascript">';
            echo 'alert("Kata Laluan Lama Tidak Tepat");';
            echo "window.location.href = '/ChangePass';";
            echo '</script>';
        }else{
            echo '<script language="javascript">';
            echo 'alert("Tukar Password Berjaya");';
            echo "window.location.href = '/landing';";
            echo '</script>';
        }
    }

}
