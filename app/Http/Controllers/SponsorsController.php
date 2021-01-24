<?php

namespace App\Http\Controllers;

use App\Models\Sponsors;
use Illuminate\Http\Request;
use Response;
use App\Models\Organiser;

class SponsorsController extends Controller
{
    public function showCreateSponsor(Request $request)
    {
        $data = [
            'organiser_id' => $request->get('organiser_id') ? $request->get('organiser_id') : false,
        ];
       
        return view('ManageOrganiser.Modals.CreateSponsor', $data)->with('organiser_id', $data['organiser_id']);
    }


    public function sponsors($organiser_id){

        $organiser = Organiser::scope()->findOrFail($organiser_id);
        $data = [
            'organiser'=> $organiser,
        ];
        $Sponsors = Sponsors::all();
        return view('ManageOrganiser.Sponsors', $data)->with('sponsors', $Sponsors);
    }


    public function createSponsor(Request $request)
    {
        $time=date('Y-m-d-H-i-s');
        $sponsor = new Sponsors();
        $sponsor->title = $request->input('title');
        $sponsor->description = $request->input('description');

        if($file = $request->hasFile('image')) {
            $file = $request->file('image') ;
            $fN = $file->getClientOriginalName() ;
            $fileName = $time."_".$fN ;
            $destinationPath = public_path().'/assets/imgSponsor/' ;
            $file->move($destinationPath,$fileName);
            $sponsor->image = '/assets/imgSponsor/'.$fileName ;
        }
        $sponsor->save();
        
        return response()->json([
            'status'      => 'success',
            'redirectUrl' => route('sponsors', [
                'organiser_id'  => $request->get('organiser_id'),
            ]),
        ]);
    }

    public function showUpdateSponsor(Request $request)
    {
        $data = [
            'organiser_id' => $request->get('organiser_id') ? $request->get('organiser_id') : false,
            'id_sponsor' => $request->get('id_sponsor')
        ];

        $dataS = Sponsors::where('id', $data['id_sponsor'])->get();
                
        return view('ManageOrganiser.Modals.UpdateSponsor', $data)
        ->with([
            'organiser_id'=> $data['organiser_id'],
            'sponsor'=> $dataS[0],

            ]);
    }


    public function updateSponsor(Request $request)
    {
        if($file = $request->hasFile('image')) {
            $time=date('Y-m-d-H-i-s');
            $Sponsor = new Sponsors();
            $file = $request->file('image') ;
            $fN = $file->getClientOriginalName() ;
            $fileName = $time."_".$fN ;
            $destinationPath = public_path().'/assets/imgSponsor/' ;
            $file->move($destinationPath,$fileName);
            $Sponsor->image = '/assets/imgSponsor/'.$fileName ;
        
        $data = Sponsors::where('id', $request->input('id'))->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'image' => $Sponsor->image,
            ]);
        }else{
            $data = Sponsors::where('id', $request->input('id'))->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
            ]);
        }
        
        if ($data) {
           
            return response()->json([
                'message' => 'Data Sponsor updated',
                'id' => $request->input('id'),
                'status'      => '1',
                'redirectUrl' => route('sponsors', [
                    'organiser_id'  => $request->get('organiser_id'),
                ]),
            ]);

        } else {
            return Response::json([
                'message' => 'this Sponsor does not exist',
                'status' => '0',
            ]);
        }
    }

    public function listSponsors(Request $request)
    {

        // Search by id.

         if ($request->has('id')) {
            $data = Sponsors::query();
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

        // all Sponsors.

        else{
            $data = Sponsors::all();
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



    public function removeSponsor(Request $request)
    {
        // remove by id.
        if ($request->has('id')) {
            
            $data = Sponsors::where('id', $request->input('id'))->delete();
           
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
