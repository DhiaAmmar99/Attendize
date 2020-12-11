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

        $BT = DB::connection('mysql')->select('select * from registrations where mode_payment LIKE "Bank Transfer"');
        $CC = DB::connection('mysql')->select('select * from registrations where mode_payment LIKE "Credit Card"');
        $OP = DB::connection('mysql')->select('select * from registrations where mode_payment LIKE "Onsite payment"');
        $users  = DB::connection('mysql')->select('select id, first_name, last_name, registration_as, membership_number , membership, email_address, 
        eventS, eventP, eventG, eventW, postal_address, job_title, organization, country, dietary, experience ,language_translation, languages, first_check, 
        second_check, guests, lead, price, mode_payment,payment_status from registrations');
        $DLS = DB::connection('mysql')->select('select id, first_name, last_name, email_address, job_title, organization, dietary, experience ,language_translation, 
        languages, first_check, second_check, guests, lead, register_id from delegates');
        
        return view('ManageOrganiser.list',  $data)->with('users', $users)
                                                   ->with('DLS', $DLS)
                                                   ->with('BT', $BT)
                                                   ->with('CC', $CC)
                                                   ->with('OP', $OP);
    }

    public function invitation($id){
        
        $email  = DB::connection('mysql')->table('registrations')->where('id', $id)->first();
        $tomail= $email->email_address;
        $toid= $email->id;
        Mail::to($tomail)->send(new SendMailable($toid));
        return 'Email was sent';
    }

}
