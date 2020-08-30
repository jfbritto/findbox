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
            'numero' => $request->numero,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'id' => $request->id
        ];

        $response = $this->boxService->editBox($data);

        if($response['status'] == 'success')
            return response()->json(['status'=>'success'], 201);

        return response()->json(['status'=>'error', 'message'=>$response['data']], 201);
    }

    public function addBox(Request $request)
    {
        $data = [
            'numero' => $request->numero,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude
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

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
