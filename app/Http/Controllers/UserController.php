<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use League\Config\Exception\ValidationException;

class UserController extends Controller
{
    
    public function index()
    {
        $user = User::all();

        return response()->json($user);
    }

   
    public function store(Request $request)
    {
        $user = User::where('no_kp', $request->no_kp)->get()->first();

        
        if (!$user || !Hash::check($request->password, $user->password)) {
            // throw ValidationException::withMessages([
            //     'no_kp' => ['The provided credentials are incorrect.'],
            // ]);
            return response()->json();

            
        }
        return response()->json($user);

        // $token = $request->user()->createToken($request->token_name);

        // return ['token' => $token->plainTextToken];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function checkUser(Request $request)
    {
        $user = User::where('no_kp', $request->no_kp)->get()->first();

        if ($user != null) {
            return response()->json("success");
        } else {
            return response()->json("failed");
        }
    }
}
