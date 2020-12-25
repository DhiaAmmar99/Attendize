<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Speaker;
use App\Models\Organiser;
use App\Models\EventImage;
use Illuminate\Http\Request;
use Response;

class EventSearchController extends Controller
{
    public function listEvent(Request $request)
    {

        // Search by Id.
        
       if ($request->has('id')) {
            $data = Event::query();
            $data->select('id', 'title', 'description', 'start_date', 'end_date', 'language', 'room', 'nb_session', 'id_stream', 'id_TOS', 'id_program')->where('id', $request->input('id'))->get();
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

        // Search by Start date.

       if ($request->has('start_date')) {
            $data = Event::query();
            $data->select('id', 'title', 'description', 'start_date', 'end_date', 'language', 'room', 'nb_session', 'id_stream', 'id_TOS', 'id_program')->where('start_date', $request->input('start_date'))->get();
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

        // Search by Stream.

       if ($request->has('id_stream')) {
            $data = Event::query();
            $data->select('id', 'title', 'description', 'start_date', 'end_date', 'language', 'room', 'nb_session', 'id_stream', 'id_TOS', 'id_program')->where('id_stream', $request->input('id_stream'))->get();
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


        // Search by Type of session.

       if ($request->has('id_TOS')) {
            $data = Event::query();
            $data->select('id', 'title', 'description', 'start_date', 'end_date', 'language', 'room', 'nb_session', 'id_stream', 'id_TOS', 'id_program')->where('id_TOS', $request->input('id_TOS'))->get();
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

        // Search by day program.

       if ($request->has('id_program')) {
            $data = Event::query();
            $data->select('id', 'title', 'description', 'start_date', 'end_date', 'language', 'room', 'nb_session', 'id_stream', 'id_TOS', 'id_program')->where('id_program', $request->input('id_program'))->get();
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

        // all Speaker.

        else{
            $data = Event::all('id', 'title', 'description', 'start_date', 'end_date', 'language', 'room', 'nb_session', 'id_stream', 'id_TOS', 'id_program');
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
}
