<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use App\Models\Organiser;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;


class ListUsersController extends Controller
{
  

    public function list($organiser_id){

        $organiser = Organiser::scope()->findOrFail($organiser_id);
        $data = [
            'organiser'=> $organiser,
        ];

        $BT = DB::connection('mysql2')->select('select * from registrations where mode_payment LIKE "Bank Transfer"');
        $CC = DB::connection('mysql2')->select('select * from registrations where mode_payment LIKE "Credit Card"');
        $OP = DB::connection('mysql2')->select('select * from registrations where mode_payment LIKE "Onsite payment"');
        $users  = DB::connection('mysql2')->select('select * from registrations');
        $DLS = DB::connection('mysql2')->select('select * from delegates');
        
        return view('ManageOrganiser.list',  $data)->with('users', $users)
                                                   ->with('DLS', $DLS)
                                                   ->with('BT', $BT)
                                                   ->with('CC', $CC)
                                                   ->with('OP', $OP);
    }

    public function invitation($id){
        
        $email  = DB::connection('mysql2')->table('registrations')->where('id', $id)->first();
        $tomail= $email->email_address;
        $toid= $email->id;
        Mail::to($tomail)->send(new SendMailable($toid));
        return 'Email was sent';
    }

}
