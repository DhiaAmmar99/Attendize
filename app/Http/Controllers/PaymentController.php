<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\SendMailable;
use Illuminate\Support\Facades\Mail;
use App\Models\Delegate;
use App\Models\Registration;

class PaymentController extends Controller
{
    public function PaymentEmail(Request $request)
    {
       
     $data = [
             "reference_number" => $request->input('reference_number'),
             ];
            

        $dataR  = Registration::find($data['reference_number']);
        $dataD  = Delegate::all()->where('register_id', $request->input('reference_number'));


  
        if($dataR != null) {

            $toid= $dataR->id;
            $tomail= $dataR->email_address;
            Mail::to($tomail)->send(new SendMailable($toid, $dataR, $dataD));
                return response()->json([
                'status'=>'success',
                'message' => 'Email has been sent',
                ]);
           
        }else{
            return response()->json([
             'status'=>'error',
             'message' => 'Reference number doesnt exist',
             ]);
        }

    }

}
