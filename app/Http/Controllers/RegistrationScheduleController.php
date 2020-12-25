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
       
        // Set query builder
        $data = RegistrationSchedule::query();
  
        
        // Search by session_id.
        if ($request->has('session_id')) {
             $data->where('session_id', $request->input('session_id'));
        }
        // Search by chair_id.
        if ($request->has('registration_id')) {
            $data->where('registration_id', $request->input('registration_id'));
        }
       

        if ($data->get()) {
            return Response::json([
                'message' => 'success',
                'status' => '1',
                'data' => $data->get()
            ]);
        } else
            return Response::json([
                'message' => 'failed',
                'status' => '0',
               
            ]);
    }
}
