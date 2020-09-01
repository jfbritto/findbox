<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BoxService;

class BoxController extends Controller
{
    private $boxService;

    public function __construct(BoxService $boxService)
    {
        $this->boxService = $boxService;
    }

    public function index()
    {
        return view('box.home');
    }

    public function searchBox()
    {
        $box = $_POST['box'];

        $response = $this->boxService->index($box);

        if($response['status'] == 'success')
            return response()->json(['status'=>'success', 'data'=>$response['data']], 201);
            
        return response()->json(['status'=>'error', 'message'=>$response['data']], 500);
    }

    public function editBox(Request $request)
    {
        $data = [
            'numero' => trim($request->numero),
            'latitude' => trim($request->latitude),
            'longitude' => trim($request->longitude),
            'id' => $request->id
        ];

        $response = $this->boxService->editBox($data);

        if($response['status'] == 'success')
            return response()->json(['status'=>'success'], 201);

        return response()->json(['status'=>'error', 'message'=>$response['data']], 201);
    }

    public function addBox(Request $request)
    {

        $num = trim($request->tipo)." ".trim($request->sigla)." ".str_pad(trim($request->numero), 4, '0', STR_PAD_LEFT);

        $data = [
            'numero' => $num,
            'latitude' => trim($request->latitude),
            'longitude' => trim($request->longitude)
        ];

        $response = $this->boxService->addBox($data);

        if($response['status'] == 'success')
            return response()->json(['status'=>'success'], 201);

        return response()->json(['status'=>'error', 'message'=>$response['data']], 201);
    }

    public function deleteBox(Request $request)
    {
        $data = [
            'id' => $request->id
        ];

        $response = $this->boxService->deleteBox($data);

        if($response['status'] == 'success')
            return response()->json(['status'=>'success'], 201);

        return response()->json(['status'=>'error', 'message'=>$response['data']], 201);
    }

}
