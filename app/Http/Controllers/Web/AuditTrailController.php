<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuditTrailController extends Controller
{
    public function index()
    {
        return view('audittrail.index'
        // ,[
        //     'users'=>$users
        // ]
        );
    }

}
