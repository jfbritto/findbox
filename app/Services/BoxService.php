<?php

namespace App\Services;

use App\Box;
use DB;
use Exception;

class BoxService
{
    public function index($box)
    {
        $response = [];

        try{

            $boxes = DB::select( DB::raw("select * from boxes where numero like '%".$box."%' order by numero limit 500"));

            $response = ['status' => 'success', 'data' => $boxes];
        }catch(Exception $e){
            $response = ['status' => 'error', 'data' => $e->getMessage()];
        }

        return $response;
    }

    public function editBox(array $data)
    {
        $response = [];

        try{

            DB::beginTransaction();

            $box = DB::table('boxes')
                        ->where('id', $data['id'])
                        ->update(['numero' => $data['numero'],
                                'latitude' => $data['latitude'],
                                'longitude' => $data['longitude']]
                        );

            DB::commit();

            $response = ['status' => 'success', 'data' => $box];

        }catch(Exception $e){
            DB::rollBack();
            $response = ['status' => 'error', 'data' => $e->getMessage()];
        }

        return $response;
    }

    public function addBox(array $data)
    {
        $response = [];

        try{

            DB::beginTransaction();

            $box = Box::create($data);

            DB::commit();

            $response = ['status' => 'success', 'data' => $box];

        }catch(Exception $e){
            DB::rollBack();
            $response = ['status' => 'error', 'data' => $e->getMessage()];
        }

        return $response;
    }

    public function deleteBox($data)
    {
        $response = [];

        try{
            $box = Box::find($data['id']);
            $box->delete();

            $response = ['status' => 'success'];
        }catch(Exception $e){
            $response = ['status' => 'error', 'data' => $e->getMessage()];
        }

        return $response;
    }
}