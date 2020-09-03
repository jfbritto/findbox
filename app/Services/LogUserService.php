<?php

namespace App\Services;

use App\LogUser;
use DB;
use Exception;

class LogUserService
{
    // public function index($box)
    // {
    //     $response = [];

    //     try{

    //         $boxes = DB::select( DB::raw("select * from boxes where numero like '%".$box."%' order by numero limit 500"));

    //         $response = ['status' => 'success', 'data' => $boxes];
    //     }catch(Exception $e){
    //         $response = ['status' => 'error', 'data' => $e->getMessage()];
    //     }

    //     return $response;
    // }

    public function addLog(array $data)
    {
        $response = [];

        try{

            DB::beginTransaction();

            $box = LogUser::create($data);

            DB::commit();

            $response = ['status' => 'success', 'data' => $box];

        }catch(Exception $e){
            DB::rollBack();
            $response = ['status' => 'error', 'data' => $e->getMessage()];
        }

        return $response;
    }

}