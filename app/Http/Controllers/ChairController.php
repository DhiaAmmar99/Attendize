<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\Chair;
use App\Models\Program;
use App\Models\sessionChair;
use App\Models\Stream;
use App\Models\Typeofsession;
use Response;

class ChairController extends Controller
{
    public function create(Request $request)
    {
        $chair = new Chair();
        $time=date('Y-m-d-H-i-s');
        $chair->firstName = $request->get('firstname');
        $chair->lastName = $request->get('lastname');
        $chair->email = $request->get('email');
        $chair->Country = $request->get('country');
        $chair->organization = $request->get('organization');
        $chair->description = $request->get('description');
        

        if($file = $request->hasFile('image')) {
            $file = $request->file('image') ;
            $fN = $file->getClientOriginalName() ;
            $fileName = $time."_".$fN ;
            $destinationPath = public_path().'/assets/imgChair/' ;
            $file->move($destinationPath,$fileName);
            $chair->image = '/assets/imgChair/'.$fileName ;
        }

        $chair->save();
        return response()->json($chair);
    }

    public function update(Request $request)
    {
        if($file = $request->hasFile('image')) {
        $chair = new Chair();
        $time=date('Y-m-d-H-i-s');
        $file = $request->file('image') ;
        $fN = $file->getClientOriginalName() ;
        $fileName = $time."_".$fN ;
        $destinationPath = public_path().'/assets/imgChair/' ;
        $file->move($destinationPath,$fileName);
        $chair->image = '/assets/imgChair/'.$fileName ;
        
        $data = Chair::where('id', $request->input('id'))->update([
                'firstname' => $request->input('firstname'),
                'lastname' => $request->input('lastname'),
                'email' => $request->input('email'),
                'country' => $request->input('country'),
                'organization' => $request->input('organization'),
                'description' => $request->input('description'),
                'image' => $chair->image,
            ]);
        }
        if ($data) {
            return Response::json([
                'message' => 'Data Chair updated',
                'status' => '1',
            ]);
        } else {
            return Response::json([
                'message' => 'this Chair does not exist',
                'status' => '0',
            ]);
        }
    }


    public function listChair(Request $request)
    {

        // Search by Id.
        if ($request->has('id')) {
            
            $data = Chair::where('id', $request->input('id'))->get();
            if(!$data->isEmpty()){
                foreach ($data as  $p) {
                    $session = sessionChair::where('chair_id', $p->id)->get("session_id AS session");
                    $p["sessions"] = $session;
                    foreach ($p->sessions as  $l) {
                        $sp = Event::select('id', 'title', 'description', 'start_date', 'end_date', 'language', 'room', 'nb_session', 'id_stream AS stream', 'id_TOS AS TypeOfSession', 'id_program AS program')->where('id', $l->session)->get();
                        $l->session = $sp;
                        
                        foreach ($sp as  $c) {
                            $dataStream = Stream::query()->where('id', $c->stream)->get();
                            $c->stream = $dataStream[0];
                
                            $dataTOS = Typeofsession::query()->where('id', $c->TypeOfSession)->get();
                            $c->TypeOfSession = $dataTOS[0];
                
                            $dataProgram = Program::query()->where('id', $c->program)->get();
                            $c->program = $dataProgram[0]; 
                        }
                    }
                }
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

        // all chairs.

        else{
            $data = Chair::all();
        if ($data) {
            foreach ($data as  $p) {
                $session = sessionChair::where('chair_id', $p->id)->get("session_id AS session");
                $p->sessions = $session;
                foreach ($p->sessions as  $l) {
                    $sp = Event::select('id', 'title', 'description', 'start_date', 'end_date', 'language', 'room', 'nb_session', 'id_stream AS stream', 'id_TOS AS TypeOfSession', 'id_program AS program')->where('id', $l->session)->get();
                    $l->session = $sp;
                    $datass [] = $l->session;
                    $p->sessions = $datass;

                    
                        
                    
                    foreach ($sp as  $c) {
                        $dataStream = Stream::query()->where('id', $c->stream)->get();
                        $c->stream = $dataStream[0];
            
                        $dataTOS = Typeofsession::query()->where('id', $c->TypeOfSession)->get();
                        $c->TypeOfSession = $dataTOS[0];
            
                        $dataProgram = Program::query()->where('id', $c->program)->get();
                        $c->program = $dataProgram[0];
                    }
                }
            }
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

    public function SessionChair(Request $request)
    {
        $sc = new sessionChair();
        $sc->session_id = $request->input('session_id');
        $sc->chair_id = $request->input('chair_id');
        $sc->save();
        return response()->json($sc);
    }

    public function SearchSessionChair(Request $request)
    {
       
        // Set query builder
        $data = sessionChair::query();
  
        
        // Search by session_id.
        if ($request->has('session_id')) {
             $data->where('session_id', $request->input('session_id'));
        }
        // Search by chair_id.
        if ($request->has('chair_id')) {
            $data->where('chair_id', $request->input('chair_id'));
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
