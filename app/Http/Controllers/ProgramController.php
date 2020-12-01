<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\RegistrationProgram;
use Response;

class ProgramController extends Controller
{
    
    public function createProgram(Request $request)
    {
        $p = new Program();
        $p->title = $request->input('title');
        $p->description = $request->input('description');
        $p->arrival_time = $request->input('start_date');
        $p->departure_time = $request->input('end_date');

        $p->save();
        return response()->json($p);
    }

    public function listProgram()
    {
       
        $results = Program::all();
        if($results){
            return response()->json([
                'status'=>'1',
                'message' => 'success',
                'data'=>$results
                ]);
        }else{
            return response()->json([
                'status'=>'0',
                'message' => 'failed',
                'data'=>$results
                ]);
        }
    }

    public function createMyProgram(Request $request)
    {
        $reservation = new RegistrationProgram();
        $reservation->registration_id = $request->input('registration_id');
        $reservation->shuttle_id = $request->input('program_id');
        $reservation->save();
        return response()->json($reservation);
    }

    public function updateProgram(Request $request)
    {
        $data = Program::query()->where('id', $request->input('id'))
            ->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date')
            ]);
        if ($data) {
            return Response::json([
                'message' => 'Data program updated',
                'status' => '1',
                'data_shuttle' => $data,
            ]);
        } else {
            return Response::json([
                'message' => 'this program does not exist',
                'status' => '0',
                'data_shuttle' => $data,
            ]);
        }
    }
}
