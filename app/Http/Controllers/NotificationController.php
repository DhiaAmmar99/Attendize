<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class NotificationController extends Controller
{
    public function notification(Request $request)
    {
        // $data = [
        //     "to" => "f-gg-UlOSgqopInq-rwfCj:APA91bHLCMAWbSe0lR8VWMxmmTCvnPSQ2EZ-zcCketnd5QHnSV44frz3_HoFR0jpqLHH5DlM7QB2w3pWgz3Zx2eUb8Sv8UE5KfaJrrOQr15IR6U_9OGXSoBdJf-9Q_JQ6ZG506G04vDC",
        //     "collapse_key" => "type_a",
        // ​​​​​​​​];
        return $response = Http::get('https://www.google.com', [
            'name' => 'na',
            'role' => 'Network Administrator',
        ]);

     
    }
}