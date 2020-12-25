<?php

namespace App\Http\Controllers;

use App\Models\RegistrationSchedule;
use Illuminate\Http\Request;
use Response;

class RegistrationScheduleController extends Controller
{
    public function createMySchedule(Request $request)
    {
        $schedule = new RegistrationSchedule();
        $schedule->registration_id = $request->input('registration_id');
        $schedule->session_id = $request->input('session_id');
        $schedule->save();
        return response()->json($schedule);
    }

    public function MySchedule(Request $request)
    {
       
        $results = RegistrationSchedule::all()->where('registration_id', $request->input('id'));
        
        if(!$results->isEmpty()){
            return Response::json([
                'status'=>'1',
                'message' => 'success',
                'data'=>$results
                ]);
        }else{
            return Response::json([
                'status'=>'0',
                'message' => 'failed',
                'data'=>$results
                ]);
        }
    }
}
