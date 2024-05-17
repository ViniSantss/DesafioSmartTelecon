<?php

namespace App\Http\Controllers;

use App\Models\Planos;
use App\Models\Provedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class dashboardController extends Controller
{
    public function index()
    {
        $provedors = Provedor::all();
        $planosUserId = Auth::user()->id;
        $planos = Planos::where('DonoPlano', $planosUserId)->get();
        return view('dashboard/dashboard',compact('provedors','planos'));
    }
    public function create()
    {
        $planosUserId = Auth::user()->id;
        $planos = Planos::where('DonoPlano', $planosUserId)->get();
        return view('dashboard/create',compact('planos'));
    }
    public function getadmin(){
        $user = Provedor::find(Auth::user()->id);
        $user->Classe='Admin';
        $user->save();
        return Redirect::back()->withErrors(
            [
                'any' => 'Agora você é um Administrator'
            ]
        );
    }
    public function store(Request $request){

        //dd($request);

        $validade = $request->validate([
             'NomePlano' => 'string|max:30|regex:/^[a-z A-Z âáãéẽêíîĩõòôũûú0-9.-,]*$/',
            'PrecoPlano' => 'float|max:30',
             'DescPlano' => 'string|max:11|regex:/^[a-z A-Z âáãéẽêíîĩõòôũûú0-9.-,]*$/'
            
        ],[
            'NomePlano.required' => 'O campo nome é obrigatório',
            'PrecoPlano.required' => 'O campo Preço é obrigatório',
            'DescPlano.required' => 'O campo Descrição é obrigatório',
        ]);

        // dd($request);

        // Provedor::create($validade);

        $planos = new Planos();

        $planos->NomePlano = $request->name;
        $planos->PrecoPlano = $request->price;
        $planos->DescPlano = $request->desc;
        $planos->DonoPlano = Auth::user()->id;

        $planos->save();

        return redirect()->route('dashboard.home');


    }
}
