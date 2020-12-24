<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\RegistrationProgram;
use Response;
use App\Models\Organiser;

class ProgramController extends Controller
{

     /**
     * Show the 'Create Program' Modal
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function showCreateProgram(Request $request)
    {
        $data = [
            'organiser_id' => $request->get('organiser_id') ? $request->get('organiser_id') : false,
        ];
       
        return view('ManageOrganiser.Modals.CreateProgram', $data);
    }


    public function programs($organiser_id){

        $organiser = Organiser::scope()->findOrFail($organiser_id);
        $data = [
            'organiser'=> $organiser,
        ];
        $programs = Program::all();
        return view('ManageOrganiser.Programs', $data)->with('programs', $programs);
    }
    
    public function createProgram(Request $request)
    {
        $p = new Program();
        $p->day = $request->input('day');
        $p->start_date = $request->input('start_date');
        $p->end_date = $request->input('end_date');

        $p->save();
        return response()->json($p);
    }

    public function updateProgram(Request $request)
    {
        $data = Program::query()->where('id', $request->input('id'))
            ->update([
                'day' => $request->input('day'),
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date')
            ]);
        if ($data) {
            return Response::json([
                'message' => 'Data program updated',
                'status' => '1',
                'data' => $data,
            ]);
        } else {
            return Response::json([
                'message' => 'This program does not exist',
                'status' => '0',
                'data' => $data,
            ]);
        }
    }

    public function listProgram()
    {
       
        $results = Program::all();
        if(!$results->isEmpty()){
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
        $reservation->program_id = $request->input('program_id');
        $reservation->save();
        return response()->json($reservation);
    }

    public function MyProgram(Request $request)
    {
       
        $results = RegistrationProgram::all()->where('registration_id', $request->input('id'));
        
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
