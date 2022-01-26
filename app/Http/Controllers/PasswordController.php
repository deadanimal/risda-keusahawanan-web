<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class PasswordController extends Controller
{


    public function forgot_user(Request $request){

        $user = User::where('email',$request->email)->first();

        // return $user;
        if($user != null) {
            $fourRandom = rand(1000,9999);
            $defpassword = "Risda".$fourRandom;

            $maildata = [
                'name' => $user->name,
                'email' => $user->email,
                'password' => $defpassword
            ];

            // return $maildata;

            Mail::to($request->email)->send(new \App\Mail\ForgotPassword($maildata));

            $user->password = Hash::make($defpassword);
            $user->profile_status = 0;
            $user->save();

            $header = "Berjaya";
            $response = "Kata laluan sementara telah dihantar ke e-mel ".$user->email;

        }else{
            $header = "Tidak Berjaya";
            $response = "E-mel yang diberikan tidak wujud.";
        }

        return response()->json(['message' => $response,
    'title' => $header]);

    }


    public function updateEmailPassword(Request $request, $id){

        // User::find($id)->update(['password'=> Hash::make($request->password)]);

        $user = User::find($id);
        

        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->profile_status = 1;
        
        $user->save();

        return response()->json($user);
    }

    public function updatePassword(Request $request, $id){

        $user = User::find($id);

        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json($user);
    }

    
}
