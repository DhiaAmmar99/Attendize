<?php

namespace App\Http\Controllers;

use App\Models\Shuttle;
use DB;
use Illuminate\Http\Request;
use Response;

class ShuttleController extends Controller
{
    public function listShuttles(Request $request)
    {
        #region filter
        // Set query builder
        $data = Shuttle::query();
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
}
