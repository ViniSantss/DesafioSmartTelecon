<?php

namespace App\Http\Controllers;

use App\Models\Provedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class registerController extends Controller
{
    public function index()
    {
        return view('Register');
    }

    public function store(Request $request){

        //dd($request);

        $validade = $request->validate([
            'name' =>'required|string|max:90|regex:/^[a-zA-Z âáãéẽêíîĩõòôũûú]*$/',
            'email' =>'required|string|max:80|email',
            'cnpj' =>'required|string|max:90|regex:/[0-9.-]{11,14}/',
            'password' => 'required|min:8',
        ],[
            'name.required' => 'O campo nome é obrigatório',
            
            'email.required' => 'O campo email é obrigatório',
            'cnpj.required' => 'O campo cnpj é obrigatório',
            'password.required' => 'O campo senha é obrigatório',
        ]);

        // dd($request);

        // Provedor::create($validade);

        $provedor = new Provedor();

        $provedor->NomeProvedor = $request->name;
        $provedor->EmailProvedor = $request->email;
        $provedor->CnpjProvedor = $request->cnpj;
        $provedor->Classe = 'Provedor';
        $provedor->password = Hash::make($request->password);

        $provedor->save();

        return redirect()->route('login')->withErrors(
            [
                'any' => 'Logue com sua nova conta'
            ]
        );;


    }

}
