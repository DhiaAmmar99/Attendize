<?php

namespace App\Http\Controllers;

use App\Models\sessionSpeaker;
use App\Models\Speaker;
use App\Models\Event;
use App\Models\Program;
use App\Models\Stream;
use App\Models\Typeofsession;
use Illuminate\Http\Request;
use Response;
use Redirect;
use App\Models\Organiser;

class SpeakerController extends Controller
{
    public function showCreatespeaker(Request $request)
    {
        $data = [
            'organiser_id' => $request->get('organiser_id') ? $request->get('organiser_id') : false,
        ];
       
        return view('ManageOrganiser.Modals.Createspeaker', $data);
    }


    public function speakers($organiser_id){

        $organiser = Organiser::scope()->findOrFail($organiser_id);
        $data = [
            'organiser'=> $organiser,
        ];
        $speakers = Speaker::all();
        return view('ManageOrganiser.Speakers', $data)->with('speakers', $speakers);
    }


    public function create(Request $request)
    {
        $speaker = new Speaker();
        $time=date('Y-m-d-H-i-s');
        $speaker->firstname = $request->get('firstname');
        $speaker->lastname = $request->get('lastname');
        $speaker->email = $request->get('email');
        $speaker->Country = $request->get('country');
        $speaker->organization = $request->get('organization');
        $speaker->description = $request->get('description');

        if($file = $request->hasFile('image')) {
            $file = $request->file('image') ;
            $fN = $file->getClientOriginalName() ;
            $fileName = $time."_".$fN ;
            $destinationPath = public_path().'/assets/imgSpeaker/' ;
            $file->move($destinationPath,$fileName);
            $speaker->image = '/assets/imgSpeaker/'.$fileName ;
        }

        $speaker->save();

        return response()->json([
            'status'      => 'success',
            'redirectUrl' => route('speakers', [
                'organiser_id'  => $request->get('organiser_id'),
            ]),
        ]);
    }


    public function showUpdateSpeaker(Request $request)
    {
        $data = [
            'organiser_id' => $request->get('organiser_id') ? $request->get('organiser_id') : false,
            'speaker_id' => $request->get('speaker_id')
        ];

        $dataSP = Speaker::where('id', $data['speaker_id'])->get();
                
       
        return view('ManageOrganiser.Modals.updatespeaker', $data)
        ->with([
            'organiser_id'=> $data['organiser_id'],
            'speaker'=> $dataSP[0],

            ]);
    }

    public function update(Request $request)
    {
        if($file = $request->hasFile('image')) {
        $speaker = new Speaker();
        $time=date('Y-m-d-H-i-s');
        $file = $request->file('image') ;
        $fN = $file->getClientOriginalName() ;
        $fileName = $time."_".$fN ;
        $destinationPath = public_path().'/assets/imgSpeaker/' ;
        $file->move($destinationPath,$fileName);
        $speaker->image = '/assets/imgSpeaker/'.$fileName ;
        
        $data = Speaker::where('id', $request->input('id'))->update([
                'firstname' => $request->input('firstname'),
                'lastname' => $request->input('lastname'),
                'email' => $request->input('email'),
                'country' => $request->input('country'),
                'organization' => $request->input('organization'),
                'description' => $request->input('description'),
                'image' => $speaker->image,
            ]);
        
        if ($data) 
        return view('ManageOrganiser.Speakers', [
                    'organiser_id'  => $request->input('organiser_id'),
                    'organiser'  => $request->input('organiser_id'),
                    'id'  => $request->input('organiser_id'),
                ]);
            // return response()->json([
            //     'status'      => 'Data Speaker updated',
            //     'redirectUrl' => route('speakers', [
            //         'organiser_id'  => $request->input('organiser_id'),
            //     ]),
            // ]);
        } else {
            return Response::json([
                'message' => 'this Speaker does not exist',
                'status' => '0',
            ]);
        }
    }


    public function listSpeaker(Request $request)
    {

        // Search by Id.
       if ($request->has('id')) {
            
            $data = Speaker::where('id', $request->input('id'))->get();
            if(!$data->isEmpty()){
                foreach ($data as  $p) {
                    $session = sessionSpeaker::where('speaker_id', $p->id)->get("session_id AS session");
                    $p["sessions"] = $session;
                    foreach ($p->sessions as  $l) {
                        $sp = Event::select('id', 'title', 'description', 'start_date', 'end_date', 'language', 'room', 'nb_session', 'id_stream AS stream', 'id_TOS AS TypeOfSession', 'id_program AS program')->where('id', $l->session)->get();
                        $l->session = $sp;
                        
                        foreach ($sp as  $c) {
                            $dataStream = Stream::query()->where('id', $c->stream)->get();
                            $c->stream = $dataStream;
                
                            $dataTOS = Typeofsession::query()->where('id', $c->TypeOfSession)->get();
                            $c->TypeOfSession = $dataTOS;
                
                            $dataProgram = Program::query()->where('id', $c->program)->get();
                            $c->program = $dataProgram; 
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

        // all Speaker.

        else{
            $data = Speaker::all();
        if ($data) {
            foreach ($data as  $p) {
                $session = sessionSpeaker::where('speaker_id', $p->id)->get("session_id AS session");
                $p["sessions"] = $session;
                foreach ($p->sessions as  $l) {
                    $sp = Event::select('id', 'title', 'description', 'start_date', 'end_date', 'language', 'room', 'nb_session', 'id_stream AS stream', 'id_TOS AS TypeOfSession', 'id_program AS program')->where('id', $l->session)->get();
                    $l->session = $sp;
                    
                    foreach ($sp as  $c) {
                        $dataStream = Stream::query()->where('id', $c->stream)->get();
                        $c->stream = $dataStream;
            
                        $dataTOS = Typeofsession::query()->where('id', $c->TypeOfSession)->get();
                        $c->TypeOfSession = $dataTOS;
            
                        $dataProgram = Program::query()->where('id', $c->program)->get();
                        $c->program = $dataProgram; 
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

    public function SessionSpeaker(Request $request)
    {
        $ss = new sessionSpeaker();
        $ss->session_id = $request->input('session_id');
        $ss->speaker_id = $request->input('speaker_id');
        $ss->save();
        return response()->json($ss);
    }


    public function removeSpeaker(Request $request)
    {
        // remove by id.
        if ($request->has('id')) {
            
            $data = Speaker::where('id', $request->input('id'))->delete();
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
    // public function SearchSessionSpeaker(Request $request)
    // {
       
    //     // Set query builder
    //     $data = sessionSpeaker::query();
  
        
    //     // Search by session_id.
    //     if ($request->has('session_id')) {
    //          $data->where('session_id', $request->input('session_id'))->get();
    //     }
    //     // Search by speaker_id.
    //     if ($request->has('speaker_id')) {
    //         $data->where('speaker_id', $request->input('speaker_id'))->get();
    //     }
       

    //     if(!$data->isEmpty()){
    //         return Response::json([
    //             'message' => 'success',
    //             'status' => '1',
    //             'data' => $data
    //         ]);
    //     } else
    //         return Response::json([
    //             'message' => 'failed',
    //             'status' => '0',
               
    //         ]);
    // }

}