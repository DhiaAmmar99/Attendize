<?php

namespace App\Http\Controllers;

use App\Models\ReservedShuttle;
use App\Models\Shuttle;
use DB;
use Illuminate\Http\Request;
use Response;
use Illuminate\Support\Facades\Auth;

class ShuttleController extends Controller
{
    public function listShuttles(Request $request)
    {
        #region filter
        // Set query builder
        $data = Shuttle::query();
        // $data = DB::table('shuttles');
        // $data = DB::connection('mysql')->table('shuttles');
        
        // Search for a shuttle based on their station_departure_id.
        if ($request->has('station_departure_id')) {
             $data->where('station_departure_id', $request->input('station_departure_id'));
        }
        // Search for a shuttle based on their station_destination_id.
        if ($request->has('station_destination_id')) {
            $data->where('station_destination_id', $request->input('station_destination_id'));
        }
        // Search for a shuttle based on their departure_time.
        if ($request->has('departure_time')) {
            $data->where('departure_time', $request->input('departure_time'));
        }
        // Search for a shuttle based on their arrival_time.
        if ($request->has('arrival_time')) {
            $data->where('arrival_time', $request->input('arrival_time'));
        }
        // Search for a shuttle based on their places_available.
        if ($request->has('places_available')) {
            $data->where('places_available', $request->input('places_available'));
        }
        #endregion

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

    public function createShuttle(Request $request)
    {
        $shuttle = new Shuttle();
        $shuttle->title = $request->input('title');
        $shuttle->description = $request->input('description');
        $shuttle->places_available = $request->input('places_available');
        $shuttle->arrival_time = $request->input('arrival_time');
        $shuttle->departure_time = $request->input('departure_time');
        $shuttle->station_departure_id = $request->input('station_departure_id');
        $shuttle->station_destination_id = $request->input('station_destination_id');
        $shuttle->save();
        return response()->json($shuttle);
    }

    public function updateShuttle(Request $request)
    {
        $data = Shuttle::query()->where('id', $request->input('id'))
            ->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'places_available' => $request->input('places_available'),
                'departure_time' => $request->input('departure_time'),
                'arrival_time' => $request->input('arrival_time'),
                'station_departure_id' => $request->input('station_departure_id'),
                'station_destination_id' => $request->input('station_destination_id')
            ]);
        if ($data) {
            return Response::json([
                'message' => 'Data shuttle updated',
                'status' => '1',
                'data_shuttle' => $data,
            ]);
        } else {
            return Response::json([
                'message' => 'this shuttle does not exist',
                'status' => '0',
                'data_shuttle' => $data,
            ]);
        }
    }

    public function findCurrentShuttle($id)
    {
        $idAuth = $id; 
        // $id = Auth::id(); 
        $data = Shuttle::query()->find($idAuth);
        if ($data->get()) {
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

    public function ReservationShuttle(Request $request)
    {
        $reservation = new ReservedShuttle();
        $reservation->registration_id = $request->input('registration_id');
        $reservation->shuttle_id = $request->input('shuttle_id');
        $reservation->nb_places = $request->input('nb_places');
        $reservation->save();
        return response()->json($reservation);
    }

}
