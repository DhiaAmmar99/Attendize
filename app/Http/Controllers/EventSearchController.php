<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Program;
use App\Models\sessionChair;
use App\Models\sessionSpeaker;
use App\Models\Speaker;
use App\Models\Typeofsession;
use App\Models\Stream;
use App\Models\Chair;
use Illuminate\Http\Request;
use Response;

class EventSearchController extends Controller
{
    public function listEvent(Request $request)
    {

        // Search by Id.
        
       if ($request->has('id')) {
            
            $data=Event::select('id', 'title', 'description', 'start_date', 'end_date', 'language', 'room', 'nb_session', 'id_stream AS stream', 'id_TOS AS TypeOfSession', 'id_program AS program')->where('id', $request->input('id'))->get();
            
            if(!$data->isEmpty()){
                foreach ($data as  $p) {
                
                    $dataStream = Stream::query()->where('id', $p->stream)->get();
                    $p->stream = $dataStream[0];
    
                    $dataTOS = Typeofsession::query()->where('id', $p->TypeOfSession)->get();
                    $p->TypeOfSession = $dataTOS[0];
    
                    $dataProgram = Program::query()->where('id', $p->program)->get();
                    $p->program = $dataProgram[0];
    
                    $speaker = sessionSpeaker::where('session_id', $p->id)->get("speaker_id AS speaker");
                    $p["speakers"] = $speaker;
    
                    $chair = sessionChair::where('session_id', $p->id)->get("chair_id AS chair");
                    $p["chairs"] = $chair;
    
                    foreach ($p->speakers as  $l) {
                        $sp = Speaker::where('id', $l->speaker)->get();
                        $l->speaker = $sp;
                        $dataspeaker [] = $l->speaker[0];
                        $p["speakers"] = $dataspeaker;
                        
                    }
                    $dataspeaker  = [];
    
                    foreach ($p->chairs as  $c) {
                        $sp = Chair::where('id', $c->chair)->get();
                        $c->chair = $sp;
                        $datachair [] = $c->chair[0];
                        $p["chairs"] = $datachair;
                    }
                    $datachair  = [];
                  
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

        // Search by Start date.

       if ($request->has('start_date')) {
            
            $data = Event::select('id', 'title', 'description', 'start_date', 'end_date', 'language', 'room', 'nb_session', 'id_stream AS stream', 'id_TOS AS TypeOfSession', 'id_program AS program')->where('start_date', $request->input('start_date'))->get();
            if(!$data->isEmpty()){
                foreach ($data as  $p) {
                
                    $dataStream = Stream::query()->where('id', $p->stream)->get();
                    $p->stream = $dataStream[0];
    
                    $dataTOS = Typeofsession::query()->where('id', $p->TypeOfSession)->get();
                    $p->TypeOfSession = $dataTOS[0];
    
                    $dataProgram = Program::query()->where('id', $p->program)->get();
                    $p->program = $dataProgram[0];
    
                    $speaker = sessionSpeaker::where('session_id', $p->id)->get("speaker_id AS speaker");
                    $p["speakers"] = $speaker;
    
                    $chair = sessionChair::where('session_id', $p->id)->get("chair_id AS chair");
                    $p["chairs"] = $chair;
    
                    foreach ($p->speakers as  $l) {
                        $sp = Speaker::where('id', $l->speaker)->get();
                        $l->speaker = $sp;
                        $dataspeaker [] = $l->speaker[0];
                        $p["speakers"] = $dataspeaker;
                        
                    }
                    $dataspeaker  = [];
    
                    foreach ($p->chairs as  $c) {
                        $sp = Chair::where('id', $c->chair)->get();
                        $c->chair = $sp;
                        $datachair [] = $c->chair[0];
                        $p["chairs"] = $datachair;
                    }
                    $datachair  = [];
                  
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

        // Search by Stream.

       if ($request->has('id_stream')) {
            $data = Event::select('id_stream AS stream','id', 'title', 'description', 'start_date', 'end_date', 'language', 'room', 'nb_session',  'id_TOS AS TypeOfSession', 'id_program AS program')->where('id_stream', $request->input('id_stream'))->get();
            if(!$data->isEmpty()){
                foreach ($data as  $p) {
                
                    $dataStream = Stream::query()->where('id', $p->stream)->get();
                    $p->stream = $dataStream[0];
    
                    $dataTOS = Typeofsession::query()->where('id', $p->TypeOfSession)->get();
                    $p->TypeOfSession = $dataTOS[0];
    
                    $dataProgram = Program::query()->where('id', $p->program)->get();
                    $p->program = $dataProgram[0];
    
                    $speaker = sessionSpeaker::where('session_id', $p->id)->get("speaker_id AS speaker");
                    $p["speakers"] = $speaker;
    
                    $chair = sessionChair::where('session_id', $p->id)->get("chair_id AS chair");
                    $p["chairs"] = $chair;
    
                    foreach ($p->speakers as  $l) {
                        $sp = Speaker::where('id', $l->speaker)->get();
                        $l->speaker = $sp;
                        $dataspeaker [] = $l->speaker[0];
                        $p["speakers"] = $dataspeaker;
                        
                    }
                    $dataspeaker  = [];
    
                    foreach ($p->chairs as  $c) {
                        $sp = Chair::where('id', $c->chair)->get();
                        $c->chair = $sp;
                        $datachair [] = $c->chair[0];
                        $p["chairs"] = $datachair;
                    }
                    $datachair  = [];
                  
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


        // Search by Type of session.

       if ($request->has('id_TOS')) {
            $data = Event::select('id_TOS AS TypeOfSession', 'id', 'title', 'description', 'start_date', 'end_date', 'language', 'room', 'nb_session',  'id_stream AS stream', 'id_program AS program')->where('id_TOS', $request->input('id_TOS'))->get();
            if(!$data->isEmpty()){
                foreach ($data as  $p) {
                
                    $dataStream = Stream::query()->where('id', $p->stream)->get();
                    $p->stream = $dataStream[0];
    
                    $dataTOS = Typeofsession::query()->where('id', $p->TypeOfSession)->get();
                    $p->TypeOfSession = $dataTOS[0];
    
                    $dataProgram = Program::query()->where('id', $p->program)->get();
                    $p->program = $dataProgram[0];
    
                    $speaker = sessionSpeaker::where('session_id', $p->id)->get("speaker_id AS speaker");
                    $p["speakers"] = $speaker;
    
                    $chair = sessionChair::where('session_id', $p->id)->get("chair_id AS chair");
                    $p["chairs"] = $chair;
    
                    foreach ($p->speakers as  $l) {
                        $sp = Speaker::where('id', $l->speaker)->get();
                        $l->speaker = $sp;
                        $dataspeaker [] = $l->speaker[0];
                        $p["speakers"] = $dataspeaker;
                        
                    }
                    $dataspeaker  = [];
    
                    foreach ($p->chairs as  $c) {
                        $sp = Chair::where('id', $c->chair)->get();
                        $c->chair = $sp;
                        $datachair [] = $c->chair[0];
                        $p["chairs"] = $datachair;
                    }
                    $datachair  = [];
                  
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

        // Search by day program.

       if ($request->has('id_program')) {
            $data = Event::select('id_program AS program','id', 'title', 'description', 'start_date', 'end_date', 'language', 'room', 'nb_session', 'id_stream AS stream', 'id_TOS AS TypeOfSession')->where('id_program', $request->input('id_program'))->get();
            if(!$data->isEmpty()){
                foreach ($data as  $p) {
                
                    $dataStream = Stream::query()->where('id', $p->stream)->get();
                    $p->stream = $dataStream[0];
    
                    $dataTOS = Typeofsession::query()->where('id', $p->TypeOfSession)->get();
                    $p->TypeOfSession = $dataTOS[0];
    
                    $dataProgram = Program::query()->where('id', $p->program)->get();
                    $p->program = $dataProgram[0];
    
                    $speaker = sessionSpeaker::where('session_id', $p->id)->get("speaker_id AS speaker");
                    $p["speakers"] = $speaker;
    
                    $chair = sessionChair::where('session_id', $p->id)->get("chair_id AS chair");
                    $p["chairs"] = $chair;
    
                    foreach ($p->speakers as  $l) {
                        $sp = Speaker::where('id', $l->speaker)->get();
                        $l->speaker = $sp;
                        $dataspeaker [] = $l->speaker[0];
                        $p["speakers"] = $dataspeaker;
                        
                    }
                    $dataspeaker  = [];
    
                    foreach ($p->chairs as  $c) {
                        $sp = Chair::where('id', $c->chair)->get();
                        $c->chair = $sp;
                        $datachair [] = $c->chair[0];
                        $p["chairs"] = $datachair;
                    }
                    $datachair  = [];
                  
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

        // all sessions.

        else{
            $data = Event::all('id', 'title', 'description', 'start_date', 'end_date', 'language', 'room', 'nb_session', 'id_stream AS stream', 'id_TOS AS TypeOfSession', 'id_program AS program');
            
        if ($data) {
            
            foreach ($data as  $p) {
                
                $dataStream = Stream::query()->where('id', $p->stream)->get();
                $p->stream = $dataStream[0];

                $dataTOS = Typeofsession::query()->where('id', $p->TypeOfSession)->get();
                $p->TypeOfSession = $dataTOS[0];

                $dataProgram = Program::query()->where('id', $p->program)->get();
                $p->program = $dataProgram[0];

                $speaker = sessionSpeaker::where('session_id', $p->id)->get("speaker_id AS speaker");
                $p["speakers"] = $speaker;

                $chair = sessionChair::where('session_id', $p->id)->get("chair_id AS chair");
                $p["chairs"] = $chair;

                foreach ($p->speakers as  $l) {
                    $sp = Speaker::where('id', $l->speaker)->get();
                    $l->speaker = $sp;
                    $dataspeaker [] = $l->speaker[0];
                    $p["speakers"] = $dataspeaker;
                    
                }
                $dataspeaker  = [];

                foreach ($p->chairs as  $c) {
                    $sp = Chair::where('id', $c->chair)->get();
                    $c->chair = $sp;
                    $datachair [] = $c->chair[0];
                    $p["chairs"] = $datachair;
                }
                $datachair  = [];
              
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


}
