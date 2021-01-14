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
        $p->date = $request->input('date');

        $p->save();
        
        return response()->json([
            'status'      => 'success',
            'redirectUrl' => route('programs', [
                'organiser_id'  => 2,
            ]),
        ]);
    }

    public function showUpdateProgram(Request $request)
    {
        $data = [
            'organiser_id' => $request->get('organiser_id') ? $request->get('organiser_id') : false,
            'prog_id' => $request->get('prog_id')
        ];

        $dataProg = Program::where('id', $data['prog_id'])->get();
                
       
        return view('ManageOrganiser.Modals.updateProgram', $data)->with('program', $dataProg[0]);
    }

    public function updateProgram(Request $request)
    {
        $data = Program::query()->where('id', $request->input('id'))
            ->update([
                'day' => $request->input('day'),
                'date' => $request->input('date'),
            ]);
        if ($data) {
            return response()->json([
                'status'      => 'success',
                'message' => 'Data program updated',
                'id'          => $request->input('id'),
                'redirectUrl' => route('programs', [
                    'organiser_id'  => $request->input('organiser_id'),
                ]),
            ]);
           
        } else {
            return Response::json([
                'message' => 'This program does not exist',
                'status' => '0',
                'data' => $data,
            ]);
        }
    }

    public function listProgram(Request $request)
    {
        // Search by id.
        
        if ($request->has('id')) {
            $data = Program::query();
             $data->where('id', $request->input('id'));
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
                    'data' => $data
                ]);
        }else {
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
    }

    public function removeProgram(Request $request)
    {
        // remove by id.
        if ($request->has('id')) {
            
            $data = Program::where('id', $request->input('id'))->delete();
            if ($data) {
                return Response::json([
                    'message' => 'success',
                    'status' => '1',
                ]);
            } else
                return Response::json([
                    'message' => 'failed',
                    'status' => '0'
                ]);
        }else{
            return response()->json([
                'status'=>'0',
                'message' => 'failed'
                ]);
        }
        
    }

}
