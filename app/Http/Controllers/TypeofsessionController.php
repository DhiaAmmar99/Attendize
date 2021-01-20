<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Typeofsession;
use Response;
use App\Models\Organiser;

class TypeofsessionController extends Controller
{


    public function showCreateTypeofsession(Request $request)
    {
        $data = [
            'organiser_id' => $request->get('organiser_id') ? $request->get('organiser_id') : false,
        ];
       
        return view('ManageOrganiser.Modals.CreateTypeofsession', $data)->with('organiser_id', $data['organiser_id']);
    }


    public function typeofsessions($organiser_id){

        $organiser = Organiser::scope()->findOrFail($organiser_id);
        $data = [
            'organiser'=> $organiser,
        ];
        $Typeofsessions = Typeofsession::all();
        return view('ManageOrganiser.Typeofsessions', $data)->with('Typeofsessions', $Typeofsessions);
    }


    public function create(Request $request)
    {
        $time=date('Y-m-d-H-i-s');
        $tos = new Typeofsession();
        $tos->title = $request->input('title');
        $tos->description = $request->input('description');

        if($file = $request->hasFile('icon')) {
            $file = $request->file('icon') ;
            $fN = $file->getClientOriginalName() ;
            $fileName = $time."_".$fN ;
            $destinationPath = public_path().'/assets/TOSicons/' ;
            $file->move($destinationPath,$fileName);
            $tos->icon = '/assets/TOSicons/'.$fileName ;
        }
        
        $tos->save();
        return response()->json([
            'status'      => 'success',
            'redirectUrl' => route('typeofsessions', [
                'organiser_id'  => $request->get('organiser_id'),
            ]),
        ]);
    }


    public function showUpdateTypeofsession(Request $request)
    {
        $data = [
            'organiser_id' => $request->get('organiser_id') ? $request->get('organiser_id') : false,
            'id_tos' => $request->get('id_tos')
        ];

        $dataS = Typeofsession::where('id', $data['id_tos'])->get();
                
        return view('ManageOrganiser.Modals.UpdateTypeofsession', $data)
        ->with([
            'organiser_id'=> $data['organiser_id'],
            'tos'=> $dataS[0],

            ]);
    }

    public function update(Request $request)
    {
        $time=date('Y-m-d-H-i-s');
        if($file = $request->hasFile('icon')) {
            $time=date('Y-m-d-H-i-s');
            $tos = new Typeofsession();
            $file = $request->file('icon') ;
            $fN = $file->getClientOriginalName() ;
            $fileName = $time."_".$fN ;
            $destinationPath = public_path().'/assets/TOSicons/' ;
            $file->move($destinationPath,$fileName);
            $tos->icon = '/assets/TOSicons/'.$fileName ;

        $data = Typeofsession::query()->where('id', $request->input('id'))
            ->update([
                'title' => $request->input('title'),
                'icon' => $tos->icon,
                'description' => $request->input('description'),
            ]);
        if ($data) 
            
            return response()->json([
                'message' => 'Data type of session updated',
                'id' => $request->input('id'),
                'status'      => '1',
                'redirectUrl' => route('streams', [
                    'organiser_id'  => $request->get('organiser_id'),
                ]),
            ]);
        } else {
            return Response::json([
                'message' => 'this type of session does not exist',
                'status' => '0',
            ]);
        }
    }

    public function listTypeofsession(Request $request)
    {
        
        // Search by title.

        if ($request->has('title')) {
            $data = Typeofsession::query();
             $data->where('title', $request->input('title'));
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
        }

        // Search by id.

        else if ($request->has('id')) {
            $data = Typeofsession::query();
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
        }

        // all Typeofsession.

        else{
            $data = Typeofsession::all();
        if ($data) {
            return Response::json([
                'message' => 'success',
                'status' => '1',
                'data' => $data
            ]);
        } else
            return Response::json([
                'message' => 'failed',
                'status' => '0',
                'data' => $data
            ]);
        }
    }

    public function removeTypeofsession(Request $request)
    {
        // remove by id.
        if ($request->has('id')) {
            
            $data = Typeofsession::where('id', $request->input('id'))->delete();
            //$sp = Event::where('id_stream', $request->input('id'))->delete();
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

