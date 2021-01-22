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
use App\Http\Controllers\NotificationController;


class RegistrationScheduleController extends Controller
{ 
    public function createMySchedule(Request $request)
    {
        $schedule = new RegistrationSchedule();
        
        $schedule->registration_id = $request->input('registration_id');
        $schedule->session_id = $request->input('session_id');
        
        
        $data = Event::select("title" , "nb_places")->where('id', $schedule->session_id)->get();
        if(!$data->isEmpty()){
            
            $nb_places = $data[0]->nb_places;

            if($nb_places > 0){
                $rest = $nb_places - 1;
                $schedule->status = 1;
                Event::where('id', $schedule->session_id)->update([
                    'nb_places' => $rest,
                ]);
                $schedule->save();
                return redirect()->action([NotificationController::class, 'sendNotification'], 
                    [
                    'token' => $request->input('token'),
                    'title' => $data[0]->title,
                    'body' => "Participate",
                    'status' => 1,
                    ]);
            }else{
                $schedule->status = 0;
                
                return redirect()->action([NotificationController::class, 'sendNotification'], 
                    [
                    'token' => $request->input('token'),
                    'title' => $data[0]->title,
                    'body' => "Waiting",
                    'status' => 0,
                    ]);
            }
            
        }
        
    }

    public function MySchedule(Request $request)
    {
       
        
        // Search by registration_id.
        if ($request->has('registration_id')) {
            $data = RegistrationSchedule::select( "session_id As session")->where('registration_id', $request->input('registration_id'))->get();
        }
       

        if(!$data->isEmpty()){
            foreach ($data as  $p) {
                $session = Event::select('id', 'title', 'description', 'start_date', 'end_date', 'language', 'room', 'nb_session', 'id_stream AS stream', 'id_TOS AS TypeOfSession', 'id_program AS program')->where('id', $p->session)->get();
                $p["session"] = $session;
                $datasession [] = $p->session[0];
                $data = $datasession;
                
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
