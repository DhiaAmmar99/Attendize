<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stream;
use Response;

class StreamController extends Controller
{
    public function create(Request $request)
    {
        $time=date('Y-m-d-H-i-s');
        $stream = new Stream();
        $stream->title = $request->input('title');
        $stream->couleur = $request->input('couleur');
        $stream->description = $request->input('description');

        if($file = $request->hasFile('icon')) {
            $file = $request->file('icon') ;
            $fN = $file->getClientOriginalName() ;
            $fileName = $time."_".$fN ;
            $destinationPath = public_path().'/assets/icons/' ;
            $file->move($destinationPath,$fileName);
            $stream->icon = '/assets/icons/'.$fileName ;
        }
        $stream->save();
        return response()->json($stream);
    }


    public function update(Request $request)
    {
        if($file = $request->hasFile('icon')) {
            $time=date('Y-m-d-H-i-s');
            $stream = new Stream();
            $file = $request->file('icon') ;
            $fN = $file->getClientOriginalName() ;
            $fileName = $time."_".$fN ;
            $destinationPath = public_path().'/assets/icons/' ;
            $file->move($destinationPath,$fileName);
            $stream->icon = '/assets/icons/'.$fileName ;
        
        $data = Stream::where('id', $request->input('id'))->update([
                'title' => $request->input('title'),
                'couleur' => $request->input('couleur'),
                'description' => $request->input('description'),
                'icon' => $stream->icon,
            ]);
        
        if ($data) 
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
