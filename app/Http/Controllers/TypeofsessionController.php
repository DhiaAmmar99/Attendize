<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Typeofsession;
use Response;

class TypeofsessionController extends Controller
{
    public function create(Request $request)
    {
        $tos = new Typeofsession();
        $tos->title = $request->input('title');
        $tos->icon = $request->input('icon');
        $tos->description = $request->input('description');
        $tos->save();
        return response()->json($tos);
    }


    public function update(Request $request)
    {
        $data = Typeofsession::query()->where('id', $request->input('id'))
            ->update([
                'title' => $request->input('title'),
                'icon' => $request->input('icon'),
                'description' => $request->input('description'),
            ]);
        if ($data) {
            return Response::json([
                'message' => 'Data type of session updated',
                'status' => '1',
            ]);
        } else {
            return Response::json([
                'message' => 'this type of session does not exist',
                'status' => '0',
            ]);
        }
    }

    public function listTypeofsession(Request $request)
    {
        
        // Search by title.

        if ($request->has('title')) {
            $data = Typeofsession::query();
             $data->where('title', $request->input('title'));
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

        // Search by id.

        else if ($request->has('id')) {
            $data = Typeofsession::query();
            $data->where('id', $request->input('id'));
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

        // all Typeofsession.

        else{
            $data = Typeofsession::all();
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
