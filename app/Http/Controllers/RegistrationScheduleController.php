<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Program;
use App\Models\Registration;
use App\Models\RegistrationSchedule;
use App\Models\Stream;
use App\Models\Typeofsession;
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
       
        
        // Search by registration_id.
        if ($request->has('registration_id')) {
            $data = RegistrationSchedule::select( "session_id As session")->where('registration_id', $request->input('registration_id'))->get();
        }
       

        if(!$data->isEmpty()){
            foreach ($data as  $p) {
                // $user = Registration::where('id', $request->input('registration_id'))->get();
                // $data["user"] = $user;

                $session = Event::select('id', 'title', 'description', 'start_date', 'end_date', 'language', 'room', 'nb_session', 'id_stream AS stream', 'id_TOS AS TypeOfSession', 'id_program AS program')->where('id', $p->session)->get();
                $p["session"] = $session;
            

                foreach ($p->session as  $l) {

                        $dataStream = Stream::query()->where('id', $l->stream)->get();
                        $l->stream = $dataStream[0];
            
                        $dataTOS = Typeofsession::query()->where('id', $l->TypeOfSession)->get();
                        $l->TypeOfSession = $dataTOS[0];
            
                        $dataProgram = Program::query()->where('id', $l->program)->get();
                        $l->program = $dataProgram[0]; 
                   
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
               
            ]);
    }
}
