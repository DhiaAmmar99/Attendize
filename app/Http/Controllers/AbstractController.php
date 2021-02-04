<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Models\Organiser;
use App\Models\Abstracts;
use App\Models\Speaker;
use App\Models\Chair;
use App\Models\AbstractChair;

class AbstractController extends Controller
{
    public function showCreateAbstract(Request $request)
    {
        $data = [
            'organiser_id' => $request->get('organiser_id') ? $request->get('organiser_id') : false,
        ];
        $speakers = Speaker::all();
        $chairs = Chair::all();
        return view('ManageOrganiser.Modals.CreateAbstract', $data)->with([
            'organiser_id', $data['organiser_id'],
            'speakers'=> $speakers,
            'chairs'=> $chairs,
        ]);
    }


    public function abstracts($organiser_id){

        $organiser = Organiser::scope()->findOrFail($organiser_id);
        $data = [
            'organiser'=> $organiser,
        ];
        $Abstracts = Abstracts::all();
        return view('ManageOrganiser.Abstracts', $data)->with('abstracts', $Abstracts);
    }


    public function createAbstract(Request $request)
    {
        
        $abstract = new Abstracts();
        $abstract->title = $request->input('title');
        $abstract->description = $request->input('description');
        $abstract->speaker_id = $request->input('id_speaker');
        
        $abstract->save();
        $chairs = $request->get('chair');
        $id_abstract = $abstract->id;

        if ($abstract->id != null){
            foreach($chairs as  $ch){
                $sc = new AbstractChair();
                $sc->abstract_id = $id_abstract;
                $sc->chair_id = $ch;
                $sc->save();
            }
        }
        return response()->json([
            'status'      => 'success',
            'redirectUrl' => route('abstracts', [
                'organiser_id'  => $request->get('organiser_id'),
            ]),
        ]);
    }

    public function showUpdateAbstract(Request $request)
    {
        $data = [
            'organiser_id' => $request->get('organiser_id') ? $request->get('organiser_id') : false,
            'id_abstract' => $request->get('id_abstract')
        ];

        $dataAB = Abstracts::where('id', $data['id_abstract'])->get();
        $speakers = Speaker::all();
        $chairs = Chair::all();
        $speaker = Speaker::where('id', $dataAB[0]->speaker_id)->get();
        $abstractChair = AbstractChair::where('abstract_id', $dataAB[0]->id)->get();
        return view('ManageOrganiser.Modals.UpdateAbstract', $data)
        ->with([
            'organiser_id'=> $data['organiser_id'],
            'abstract'=> $dataAB[0],
            'speakers'=> $speakers,
            'speaker'=> $speaker[0],
            'chairs'=> $chairs,
            'abstractChair'=> $abstractChair,
            ]);
    }


    public function updateAbstract(Request $request)
    {
        
        $data = Abstracts::where('id', $request->input('id'))->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'speaker_id' => $request->input('speaker_id'),
        ]);
       
        AbstractChair::where('abstract_id', $request->input('id'))->delete();
        $chairs = $request->get('chair');
        $id_abstract = $request->input('id');

        if ($id_abstract != null){
            foreach($chairs as  $ch){
                $sc = new AbstractChair();
                $sc->abstract_id = $id_abstract;
                $sc->chair_id = $ch;
                $sc->save();
            }
        }
        
        if ($data) {
           
            return response()->json([
                'status'      => 'success',
                'id'          => $request->input('id'),
                'redirectUrl' => route('abstracts', [
                    'organiser_id'  => $request->input('organiser_id'),
                ]),
            ]);

        } else {
            return Response::json([
                'message' => 'this Abstract does not exist',
                'status' => '0',
            ]);
        }
    }

    public function listAbstracts(Request $request)
    {

        // Search by id.

         if ($request->has('id')) {
            $data = Abstracts::query();
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

        // all Abstracts.

        else{
            $data = Abstracts::all();
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



    public function removeAbstract(Request $request)
    {
        // remove by id.
        if ($request->has('id')) {
            
            $data = Abstracts::where('id', $request->input('id'))->delete();
            
            $ab = AbstractChair::where('abstract_id', $request->input('id'))->delete();
           
            if ($data) {
                return Response::json([
                    'message' => 'success',
                    'status' => '1',
                ]);
            } else
                return Response::json([
                    'message' => 'failed',
                    'status' => '0'
                ]);
        }else{
            return response()->json([
                'status'=>'0',
                'message' => 'failed'
                ]);
        }

    }

}
