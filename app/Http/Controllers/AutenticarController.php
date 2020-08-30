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

        $response = true;

        if($response){
            session(['login' => 'britto']);
            session(['nome' => 'João FIlipi']);
            session(['id' => '1']);
            // session(['login' => $response->data->login]);
            // session(['nome' => $response->data->nome]);
            // session(['id' => $response->data->id]);

            return response()->json(['status' => true]);
        }
        
        return response()->json(['status' => false, 'mensagem' => 'Erro ao logar']);

    }

    public function deslogar()
    {
        session()->flush();   
        return true;
    }



    
}
