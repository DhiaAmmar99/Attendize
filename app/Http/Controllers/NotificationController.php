<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Response;



class NotificationController extends Controller
{
    use AuthorizesRequests,DispatchesJobs, ValidatesRequests;

    public function notification(Request $request)
    {

        $token = $request->input('token');
        $from = "AAAAM9hpnTk:APA91bH3aPlfBIqHOXMWOBG6eTyJAR8nE0FlzMq0amcv45YY1TPmwSzFsP6Tu_J-fS8GmvrJs4M7z0aKd4wVHeinL3xpN54JTaV3BIxL1ZA3uRA6hRqwBT3gPij86WYDhyrcY6y5NpF2";
        $msg = array
              (
                'body'  => $request->input('body'),
                'title' => $request->input('title'),
                'receiver' => 'erw',
                'icon'  => "https://image.flaticon.com/icons/png/512/270/270014.png",/*Default Icon*/
                'sound' => 'mySound'/*Default sound*/
              );

        $fields = array
                (
                    'to'        => $token,
                    'notification'  => $msg
                );

        $headers = array
                (
                    'Authorization: key=' . $from,
                    'Content-Type: application/json'
                );
        //#Send Reponse To FireBase Server 
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec($ch );
        curl_close( $ch );

       
    }
 
   

    public function sendNotification(Request $request)
    {
        $token = $request->input('token');
        $from = "AAAAM9hpnTk:APA91bH3aPlfBIqHOXMWOBG6eTyJAR8nE0FlzMq0amcv45YY1TPmwSzFsP6Tu_J-fS8GmvrJs4M7z0aKd4wVHeinL3xpN54JTaV3BIxL1ZA3uRA6hRqwBT3gPij86WYDhyrcY6y5NpF2";
        $msg = array
              (
                'body'  => $request->input('body'),
                'title' => $request->input('title'),
                'receiver' => 'erw',
                'icon'  => "https://image.flaticon.com/icons/png/512/270/270014.png",/*Default Icon*/
                'sound' => 'mySound'/*Default sound*/
              );

        $fields = array
                (
                    'to'        => $token,
                    'notification'  => $msg
                );

        $headers = array
                (
                    'Authorization: key=' . $from,
                    'Content-Type: application/json'
                );
        //#Send Reponse To FireBase Server 
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec($ch );
        //dd($result);
        curl_close( $ch );
    }
}
