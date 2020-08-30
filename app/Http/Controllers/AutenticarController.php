<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;

class AutenticarController extends Controller
{
    public function get_autenticar()
    {
        return view("login");
    }

    public function post_autenticar(Request $request)
    {
        $data_valid = $request->validate([
            'login' => 'required',
            'senha' => 'required',
            ]);

        if($request->login == 'gerente' && $request->senha == 'gerentecaixa'){

            session(['login' => 'gerencia']);
            session(['nome' => 'Gerente']);
            session(['nivel' => '1']);
            session(['id' => '1']);
    
            return response()->json(['status' => true]);
            
        }else if($request->login == 'tecnico' && $request->senha == 'tecnico123'){

            session(['login' => 'tecnico']);
            session(['nome' => 'Tecnico']);
            session(['nivel' => '2']);
            session(['id' => '2']);
    
            return response()->json(['status' => true]);

        }


            

        return response()->json(['status' => false, 'mensagem' => 'Usuário ou senha incorretos']);

    }

    public function deslogar()
    {
        session()->flush();   
        return true;
    }



    
}
