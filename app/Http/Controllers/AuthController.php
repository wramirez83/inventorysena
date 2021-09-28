<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $res){
        //Que Campos Son obligatorio y de que tipo
        $validator = Validator::make($res->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if($validator->fails())
            return redirect()->back()->withErrors($validator);
        
        //Create credentials
        $credentials = $res->only('email', 'password');
        if(Auth::attempt($credentials)){
            //Correct
            $res->session()->regenerate();
            return redirect()->route('dashboard');//Salta al controlador o ruta necesaria
        }
        return redirect()->back()->withErrors([
            'email' => 'Las Credenciales NO son Correctas'
        ]);
    }
}
