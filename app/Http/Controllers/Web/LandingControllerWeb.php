<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Peranan;

class LandingControllerWeb extends Controller
{
    public function index()
    {
        $role="";
        if(isset(Auth::user()->role)){
            $role = Peranan::where('peranan_id', Auth::user()->role)->first();
        }else{
            echo '<script language="javascript">';
            echo 'alert("Session Expired Kindly Login")';
            echo '</script>';
            return redirect('/');
        }
        
        return view('landing.index'
        ,[
            'peranan'=>$role
        ]
        );
    }

}
