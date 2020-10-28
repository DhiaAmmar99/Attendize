<?php

namespace App\Http\Controllers;

use App\Models\Registration;
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
                'data' => $data
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
        $register = new Shuttle();
        $register->title = $request->input('title');
        $register->description = $request->input('description');
        $register->places_available = $request->input('places_available');
        $register->departure_time = $request->input('departure_time');
        $register->arrival_time = $request->input('arrival_time');
        $register->station_departure_id = $request->input('station_departure_id');
        $register->station_destination_id = $request->input('station_destination_id');
        $register->save();
        return response()->json($register);
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

    public function findCurrentShuttle(Request $request)
    {
        $id = Auth::id(); 
        $data = Registration::query()->find($id);
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
}
