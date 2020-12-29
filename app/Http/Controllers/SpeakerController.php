<?php

namespace App\Http\Controllers;

use App\Models\sessionSpeaker;
use App\Models\Speaker;
use Illuminate\Http\Request;
use Response;

class SpeakerController extends Controller
{
   
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
        return response()->json($speaker);
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
        }
        if ($data) {
            return Response::json([
                'message' => 'Data Speaker updated',
                'status' => '1',
            ]);
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
            $data = Speaker::query();
            $data->where('id', $request->input('id'));
            if (! $data->get()->isEmpty()) {
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

        // all Speaker.

        else{
            $data = Speaker::all();
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

    public function SessionSpeaker(Request $request)
    {
        $ss = new sessionSpeaker();
        $ss->session_id = $request->input('session_id');
        $ss->speaker_id = $request->input('speaker_id');
        $ss->save();
        return response()->json($ss);
    }

    public function SearchSessionSpeaker(Request $request)
    {
       
        // Set query builder
        $data = sessionSpeaker::query();
  
        
        // Search by session_id.
        if ($request->has('session_id')) {
             $data->where('session_id', $request->input('session_id'));
        }
        // Search by speaker_id.
        if ($request->has('speaker_id')) {
            $data->where('speaker_id', $request->input('speaker_id'));
        }
       

        if (! $data->get()->isEmpty()) {
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
