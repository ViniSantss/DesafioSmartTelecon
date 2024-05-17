<?php

namespace App\Http\Controllers;

use App\Http\Requests\Provedor;
use App\Models\Provedor as ProvedorModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class loginController extends Controller
{
    public function index()
    {
        return view('Login');
    }
    public function store(Request $request){

        if (Auth::attempt(['EmailProvedor' => $request->input('email'), 'password' => $request->input('password')]))
        {
            
            return redirect()->intended('dashboard');
        }else {
            return Redirect::back()->withErrors(
                [
                    'any' => 'Senha ou Email incorreto'
                ]
            );
            //return redirect()->route('login')->with('error', 'Senha ou Email incorreto. Por favor, tente novamente.');
        }
        // $credentials = $request->validate([
//     'EmailProvedor' => $request->input('email'),
//         'SenhaProvedor' => $request->input('password')
// ]

// );


//         // $ProvedorLogin = ProvedorModel::where([
//         //     'EmailProvedor' => $request->input('email'),
//         //     'SenhaProvedor' => $request->input('password')
//         // ]);
//         if(Auth::attempt($credentials)){

//             //Auth::login($ProvedorLogin);
//             //return redirect()->route('dashboard.home');
//             return redirect()->route('inicio');
//         }else{
//             return redirect()->route('login')->with('error', 'Email ou senha incorretos');
//         }
    }
    public function destroy()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    //
}
