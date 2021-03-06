<?php

namespace App\Http\Controllers;

use App\Models\Delegate;
use App\Mail\SendMailable;
use App\Mail\EditMailable;
use App\Mail\infoMailable;
use App\Mail\PreRegistrationMailable;
use App\Mail\PasswordMailable;
use App\Models\Brochure;
use App\Models\Registration;
use App\Models\Mailapi;
use App\Models\Sponsors;
use App\Models\ImagesUser;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Countries;
use Response;
use PDF;
use Spipu\Html2Pdf\Html2Pdf;
use Illuminate\Support\Facades\Redirect;

class ApiregistrationController extends Controller
{
    public function create(Request $request){
        $register = new Registration();
        $register->registration_as = $request->input('registration_as');
        $register->membership_number = $request->input('membership_number');
        $register->membership = $request->input('membership');
        $register->first_name = $request->input('first_name');
        $register->last_name = $request->input('last_name');
        $register->job_title = $request->input('job_title');
        $register->organization = $request->input('organization');
        $register->email_address = $request->input('email_address');
        $register->country = $request->input('country');
        $register->postal_address = $request->input('postal_address');
        $register->experience = $request->input('experience');
        $register->dietary = $request->input('dietary');
        $register->language_translation = $request->input('language_translation');
        $register->languages = $request->input('languages');
        $register->first_check = $request->input('first_check');
        $register->mode_payment = $request->input('mode_payment');
        $register->payment_status = $request->input('payment_status');
        $register->second_check = $request->input('second_check');
        $register->eventP = $request->input('eventP');
        $register->eventS = $request->input('eventS');
        $register->eventG = $request->input('eventG');
        $register->eventW = $request->input('eventW');
        $register->guests = $request->input('guests');
        $register->price = $request->input('price');
        $register->lead = $request->input('lead');

        $register->save();
        return response()->json($register);
    }
    public function newdelegate(Request $request){
        $D = new Delegate();


        $D->first_name = $request->input('first_name');
        $D->last_name = $request->input('last_name');
        $D->job_title = $request->input('job_title');
        $D->organization = $request->input('organization');
        $D->email_address = $request->input('email_address');
        $D->experience = $request->input('experience');
        $D->dietary = $request->input('dietary');
        $D->language_translation = $request->input('language_translation');
        $D->languages = $request->input('languages');
        $D->first_check = $request->input('first_check');
        $D->second_check = $request->input('second_check');
        $D->lead = $request->input('lead');
        $D->guests = $request->input('guests');
        $D->register_id = $request->input('register_id');

        $D->save();
        if ($D){
        // return response()->json($D);
           return Response::json([
            'message'=>'registration success',
            'status'=>'1',
            'data'=>$D
          ]
        );
    }else{
            return Response::json([
                'message'=>'registration failed',
                'status'=>'0',
                'data'=>$D
                ]
            );
        }
    }

    public function edituser(Request $request, $tab, $id)
    {
        if ($tab == 'registrations'){
        $data=DB::connection('mysql')->table('registrations')->where('id', $id)
                                ->update([
                                    'registration_as' => $request->input('registration_as'),
                                    'membership_number' => $request->input('membership_number'),
                                    'membership' => $request->input('membership'),
                                    'first_name' => $request->input('first_name'),
                                    'last_name' => $request->input('last_name'),
                                    'job_title' => $request->input('job_title'),
                                    'organization' => $request->input('organization'),
                                    'email_address' => $request->input('email_address'),
                                    'country' => $request->input('country'),
                                    'postal_address' => $request->input('postal_address'),
                                    'experience' => $request->input('experience'),
                                    'dietary' => $request->input('dietary'),
                                    'language_translation' => $request->input('language_translation'),
                                    'languages' => $request->input('languages'),
                                    'first_check' => $request->input('first_check'),
                                    'mode_payment' => $request->input('mode_payment'),
                                    'second_check' => $request->input('second_check'),
                                    'eventP' => $request->input('eventP'),
                                    'eventS' => $request->input('eventS'),
                                    'eventG' => $request->input('eventG'),
                                    'eventW' => $request->input('eventW'),
                                    'guests' => $request->input('guests'),
                                    'price' => $request->input('price'),
                                    'lead' => $request->input('lead'),
    ]);
    }else {
          $data=DB::connection('mysql')->table('delegates')->where('id', $id)
                                ->update([
                                    'first_name' => $request->input('first_name'),
                                    'last_name' => $request->input('last_name'),
                                    'job_title' => $request->input('job_title'),
                                    'organization' => $request->input('organization'),
                                    'email_address' => $request->input('email_address'),
                                    'experience' => $request->input('experience'),
                                    'dietary' => $request->input('dietary'),
                                    'language_translation' => $request->input('language_translation'),
                                    'languages' => $request->input('languages'),
                                    'first_check' => $request->input('first_check'),
                                    'second_check' => $request->input('second_check'),
                                    'guests' => $request->input('guests'),
                                    'lead' => $request->input('lead'),
    ]);
    }
    if($data){
        return Response::json([
            'message'=>'Data user updated',
            'status'=>'1',
            'data_user'=>$data,
            ]
        );
        }else{
        return Response::json([
            'message'=>'this user does not exist',
            'status'=>'0',
            'data_user'=>$data,
            ]
        );
        }

    }

    public function mailapi(Request $request){
        $mail = new Mailapi();
        $mail->email_address = $request->input('email_address');
        $mail->save();
        return response()->json($mail);
    }



    public function mail($tab, $id)
    {
	    $email  = DB::connection('mysql')->table($tab)->where('id', $id)->first();
	    $tomail= $email->email_address;
	    $toid= $email->id;
	    Mail::to($tomail)->send(new SendMailable($toid, $email));
	    return 'Email was sent';
    }

     public function editMail($tab, $id)
    {
        $email  = DB::connection('mysql')->table($tab)->where('id', $id)->first();
        $tomail= $email->email_address;
        $toid= $email->id;
        Mail::to($tomail)->send(new EditMailable($toid, $email));
        return response()->json('Email was sent');
    }

    public function checkuser($id)
    {
        $data_u = DB::connection('mysql')->select('select * from registrations where id =:id', ['id' => $id]);
        $data_d = DB::connection('mysql')->select('select * from delegates where register_id =:id', ['id' => $id]);
        $img = ImagesUser::select('image')->where("id_registration",$id)->first();

        if($data_u){
        return Response::json([
            'message'=>'Your URN is valid',
            'status'=>'1',
            'image'=>$img['image'],
            'data_user'=>$data_u,
            'data_delegate'=>$data_d,
            ]
        );
        }else{
        return Response::json([
            'message'=>'this user does not exist',
            'status'=>'0',
            ]
        );
        }
    }



    public function ARcountry()
    {
        return Countries::lookup('ar');
    }
    public function ENcountry()
    {
        return Countries::lookup('en');
    }
    public function RUcountry()
    {
        return Countries::lookup('ru');
    }
    public function EScountry()
    {
        return Countries::lookup('es');
    }
    public function FRcountry()
    {
        return Countries::lookup('fr');
    }


    public function listNamesEvent()
    {
        $data = DB::connection('mysql')->select('select * from events');


        if($data){
        return Response::json([
            'message'=>'success',
            'status'=>'1',
            'data'=>$data
            ]
        );
        }else
        return Response::json([
            'message'=>'failed',
            'status'=>'0',
            'data'=>$data
            ]
        );
    }
    public function listSpeakers()
    {
        $data = DB::connection('mysql')->select('select * from speakers ');
        if($data){
        return Response::json([
            'message'=>'success',
            'status'=>'1',
            'data'=>$data
            ]
        );
        }else
        return Response::json([
            'message'=>'failed',
            'status'=>'0',
            'data'=>$data
            ]
        );
    }

    public function fetchOneEvent($id)
    {
        $data_u = DB::connection('mysql')->select('select * from registrations where id =:id', ['id' => $id]);
        $titleP = $data_u[0]->eventP;
        $titleS = $data_u[0]->eventS;
        $titleW = $data_u[0]->eventW;
        $titleG = $data_u[0]->eventG;
        if($titleP != null){
            $dataP = DB::connection('mysql')->select('select * from events where title =:title', ['title' => $titleP]);
        }else{
            $dataP = null;
        }
        if($titleS != null){
        $dataS = DB::connection('mysql')->select('select * from events where title =:title', ['title' => $titleS]);
        }else{
            $dataS = null;
        }
        if($titleW != null){
        $dataW = DB::connection('mysql')->select('select * from events where title =:title', ['title' => $titleW]);
        }else{
            $dataW = null;
        }
        if($titleG != null){
        $dataG = DB::connection('mysql')->select('select * from events where title =:title', ['title' => $titleG]);
        }else{
            $dataG = null;
        }
        if($data_u){
        return Response::json([
            'message'=>'success',
            'status'=>'1',
            'dataP'=> $dataP,
            'dataS'=> $dataS,
            'dataW'=> $dataW,
            'dataG'=> $dataG
            ]
        );
        }else
        return Response::json([
            'message'=>'failed',
            'status'=>'0',
            'dataP'=> $dataP,
            'dataS'=> $dataS,
            'dataW'=> $dataW,
            'dataG'=> $dataG
            ]
        );
    }

    public function allUsers()
    {
        $data_u = DB::connection('mysql')->select('select * from registrations');
        $data_d = DB::connection('mysql')->select('select * from delegates');

        if($data_u){
        return Response::json([
            'status'=>'1',
            'data_user'=>$data_u,
            'data_delegate'=>$data_d,
            ]
        );
        }else{
        return Response::json([
            'status'=>'0',
            'data_user'=>$data_u,
            'data_delegate'=>$data_d,
            ]
        );
        }
    }

    public function Email(Request $request)
    {
        $data = [
                "id" => $request->input('id'),
                "table" => $request->input('table'),
                "paiment" => $request->input('paiment'),
                ];
        $datamail  = DB::connection('mysql')->table($data['table'])->where('id', $data['id'])->first();
        $datadel  = Delegate::where('register_id', $data['id'])->get();
        $tomail= $datamail->email_address;

        if($data['table'] == 'registrations'){
            $toid= $datamail->id;
        }else if($data['table'] == 'delegates'){
            $toid= $datamail->register_id;
        }

        $infoBT = new infoMailable($toid);
        $BT = new PreRegistrationMailable($toid, $datamail, $datadel, $data['paiment']);
        $ED = new EditMailable($toid, $datamail, $data['table']);
        $OP = new SendMailable($toid, $datamail, $data['table']);

        if($data['paiment'] == 'Credit Card'){
            Mail::to($tomail)->send($OP);
            return response()->json([
                'status'=>'1',
                'message' => 'Email was sent',
                'data'=>$data,
                ]);

        }else if($data['paiment'] == 'Onsite payment'){

            Mail::to($tomail)->send($BT);
            return response()->json([
                'status'=>'1',
                'message' => 'Email was sent',
                'data'=>$data,
                ]);

        }else if($data['paiment'] == 'Bank Transfer'){
            Mail::to($tomail)->send($infoBT);
            Mail::to($tomail)->send($BT);

            return response()->json([
                'status'=>'1',
                'message' => 'Email was sent',
                'data'=>$data,
                ]);

        }else if($data['paiment'] == 'edit'){

            Mail::to($tomail)->send($ED);
            return response()->json([
                'status'=>'1',
                'message' => 'Email was sent',
                'data'=>$data,
                ]);
        }else{
            return response()->json([
                'status'=>'0',
                'message' => 'Failed',
                'data'=>$data,
                ]);
        }

    }

    public function emailPassword(Request $request)
    {
        $data = [
                "id" => $request->input('id'),
                "table" => $request->input('table'),
                "password" => $request->input('password'),
                ];
        $email  = DB::connection('mysql')->table($data['table'])->where('id', $data['id'])->first();
        $tomail= $email->email_address;

        $toid = $data['password'];


        $pwd = new PasswordMailable($toid);


            Mail::to($tomail)->send($pwd);
            return response()->json([
                'status'=>'1',
                'message' => 'Password was sent',
                ]);
    }


    public function payment(Request $request)
    {
        DB::connection('mysql')->table('registrations')->where('id', $request->id)
        ->update([
            'payment_status' => $request->payment,
        ]);
    }

    public function verifEmail(Request $request)
    {
        $fetchR = Registration::where('email_address', $request->input('email'))->get();
        $fetchD = Delegate::where('email_address', $request->input('email'))->get();

        if(!$fetchR->isEmpty()){
            $data_d = Delegate::where('register_id', $fetchR[0]->id)->get();
            $img = ImagesUser::select('image')->where("id_registration",$fetchR[0]->id)->first();
            return Response::json([
                'image'=>$img['image'],
                'data_user'=>$fetchR[0],
                'data_delegate'=>$data_d,
                'status'=>'0',
                'message'=>'Email address is already registered',
                ]
            );
        }else if(!$fetchD->isEmpty()){
            $data_d = Registration::where('id', $fetchD[0]->register_id)->get();
            $data = Delegate::where('register_id', $data_d[0]->id)->get();
            $img = ImagesUser::select('image')->where("id_registration",$fetchD[0]->register_id)->first();
            return Response::json([
                'image'=>$img['image'],
                'data_user'=>$data_d[0],
                'data_delegate'=>$data,
                'status'=>'0',
                'message'=>'Email address is already registered',
                ]
            );
        }else{
            return Response::json([
                'status'=>'1',
                'message'=>'Email address is valid',
                ]
            );
        }

    }

    public function password(Request $request)
    {
        DB::connection('mysql')->table('registrations')->where('id', $request->id)
        ->update([
            'password' => $request->password,
        ]);
    }




    public function generatepdf(Request $request)
    {

        // $html = file_get_contents('test.html');

        $html2pdf = new Html2Pdf();
        $html2pdf->writeHTML($request->text_box); // pass in the HTML
        $html2pdf->output('Bank transfer registration summary - ICA Congress Abu Dhabi 2020.pdf', 'D'); // Generate the PDF and start download

    }



    // DOWNLOAD BROCHURE

    public function downloadBrochure(Request $request)
    {
        $b = new Brochure();
        $b->first_name = $request->input('first_name');
        $b->last_name = $request->input('last_name');
        $b->job_title = $request->input('job_title');
        $b->company = $request->input('company');
        $b->email = $request->input('email');
        $b->tel = $request->input('tel');
        $b->save();
        return Redirect::to('https://devica.digitalresearch.ae/wp-content/uploads/2019/07/ICA-Congress-Abu-Dhabi-2020-Sponsorship-Prospectus_web.pdf');
    }


}
