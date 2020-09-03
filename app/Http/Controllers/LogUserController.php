<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LogUserService;

class LogUserController extends Controller
{
    private $logUserService;

    public function __construct(LogUserService $logUserService)
    {
        $this->logUserService = $logUserService;
    }

    //exibir tela de log
    public function logs_tela()
    {
        return view('box.log_results');
    }

    public function relatorioLog()
    {
        $response = $this->logUserService->relatorioLog();

        if($response['status'] == 'success')
            return response()->json(['status'=>'success', 'data'=>$response['data']], 201);
            
        return response()->json(['status'=>'error', 'message'=>$response['data']], 500);
    }

    public function addLog(Request $request)
    {

        $data = [
            'datahora' => date("Y-m-d H:i:s"),
            'id_caixa' => $request->id_caixa,
            'id_usuario' => $request->id_usuario
        ];

        $response = $this->logUserService->addLog($data);

        if($response['status'] == 'success')
            return response()->json(['status'=>'success'], 201);

        return response()->json(['status'=>'error', 'message'=>$response['data']], 201);
    }
}
