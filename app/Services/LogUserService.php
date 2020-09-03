<?php

namespace App\Services;

use App\LogUser;
use DB;
use Exception;

class LogUserService
{
    public function relatorioLog()
    {
        $response = [];

        try{

            $boxes = DB::select( DB::raw("SELECT 
                                            sum(id_usuario = '1') as gerente,
                                            sum(id_usuario = '2') as tecnico,
                                            concat(extract(day from datahora), '/', extract(month from datahora), '/', extract(year from datahora)) as dia
                                        FROM 
                                            log_users
                                        group by	
                                            dia
                                        order by
                                            datahora desc"));

            $response = ['status' => 'success', 'data' => $boxes];
        }catch(Exception $e){
            $response = ['status' => 'error', 'data' => $e->getMessage()];
        }

        return $response;
    }

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