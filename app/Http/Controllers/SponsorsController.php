<?php

namespace App\Http\Controllers;

use App\Models\Sponsors;
use Illuminate\Http\Request;

class SponsorsController extends Controller
{
    public function listSponsors()
    {
        
        $results = Sponsors::all();
     
        if(!$results->isEmpty()){
            return response()->json([
                'status'=>'1',
                'message' => 'success',
                'data'=>$results
                ]);
        }else{
            return response()->json([
                'status'=>'0',
                'message' => 'success',
                'data'=>$results
                ]);
        }
        
    }
}
