<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Response;

class ShuttleController extends Controller
{
    public function listShuttles()
    {
        $data = DB::connection('mysql')->select('select * from shuttles ');
        if($data){
        return Response::json([
            'message'=>'success',
            'status'=>'1',
            'data'=>$data
            ]
        );
        }else
        return Response::json([
            'message'=>'failed',
            'status'=>'0',
            'data'=>$data
            ]
        );
    }
}
