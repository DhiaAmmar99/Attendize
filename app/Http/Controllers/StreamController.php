<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stream;
use Response;

class StreamController extends Controller
{
    public function create(Request $request)
    {
        $stream = new Stream();
        $stream->title = $request->input('title');
        $stream->icon = $request->input('icon');
        $stream->couleur = $request->input('couleur');
        $stream->description = $request->input('description');
        $stream->save();
        return response()->json($stream);
    }


    public function update(Request $request)
    {
        $data = Stream::query()->where('id', $request->input('id'))
            ->update([
                'title' => $request->input('title'),
                'icon' => $request->input('icon'),
                'couleur' => $request->input('couleur'),
                'description' => $request->input('description'),
            ]);
        if ($data) {
            return Response::json([
                'message' => 'Data Stream updated',
                'status' => '1',
            ]);
        } else {
            return Response::json([
                'message' => 'this Stream does not exist',
                'status' => '0',
            ]);
        }
    }

    public function listStream(Request $request)
    {
        
        // Search by title.
        if ($request->has('title')) {
            $data = Stream::query();
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
            $data = Stream::query();
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

        // all Stream.
        else{
            $data = Stream::all();
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
