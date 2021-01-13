<?php

namespace App\Http\Controllers;

use App\Models\Chair;
use Log;
use Auth;
use Image;
use Response;
use App\Models\Event;
use App\Models\Speaker;
use App\Models\Organiser;
use App\Models\EventImage;
use App\Models\Program;
use App\Models\sessionChair;
use App\Models\sessionSpeaker;
use App\Models\Stream;
use App\Models\Typeofsession;
use Illuminate\Http\Request;
use Spatie\GoogleCalendar\Event as GCEvent;
use Illuminate\Support\Facades\DB;

class EventController extends MyBaseController
{
    /**
     * Show the 'Create Event' Modal
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function showCreateEvent(Request $request)
    {
        $data = [
            'modal_id'     => $request->get('modal_id'),
            'organisers'   => Organiser::scope()->pluck('name', 'id'),
            'organiser_id' => $request->get('organiser_id') ? $request->get('organiser_id') : false,
        ];
        $events = $this->listEventSelect();
        $programs = Program::all();
        $streams = Stream::all();
        $tos = Typeofsession::all();
        $speakers = Speaker::all();
        $chairs = Chair::all();
        return view('ManageOrganiser.Modals.CreateEvent', $data)->with([
            'events'=> $events,
            'programs'=> $programs,
            'streams'=> $streams,
            'tos'=> $tos,
            'speakers'=> $speakers,
            'chairs'=> $chairs,
            ]);
    }

    public function showUpdateEvent(Request $request)
    {
        $data = [
            'event_id'     => $request->get('event_id'),
            'modal_id'     => $request->get('modal_id'),
            'organisers'   => Organiser::scope()->pluck('name', 'id'),
            'organiser_id' => $request->get('organiser_id') ? $request->get('organiser_id') : false,
        ];

        $event = Event::select('id', 'title', 'description', 'start_date', 'end_date', 'language', 'room', 'nb_session', 'id_stream', 'id_TOS', 'id_program')->where('id', $data['event_id'])->get();
        

        $programs = Program::all();
        $streams = Stream::all();
        $tos = Typeofsession::all();
        $speakers = Speaker::all();
        $chairs = Chair::all();
        $sessionSpeaker = sessionSpeaker::where('session_id', $event[0]->id)->get();
        $sessionChair = sessionChair::where('session_id', $event[0]->id)->get();
        return view('ManageOrganiser.Modals.updateEvent', $data)
        ->with([
            'event'=> $event[0],
            'programs'=> $programs,
            'streams'=> $streams,
            'tos'=> $tos,
            'speakers'=> $speakers,
            'chairs'=> $chairs,
            'sessionSpeaker'=> $sessionSpeaker,
            'sessionChair'=> $sessionChair,
            ]);
    }

    /**
     * Create an event
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    // public function postCreateEvent(Request $request)
    // {
    //     $event = Event::createNew();

        
    //     if (!$event->validate($request->all())) {
    //         return response()->json([
    //             'status'   => 'error',
    //             'messages' => $event->errors(),
    //         ]);
    //     }

    //     $event->title = $request->get('title');
    //     $event->description = strip_tags($request->get('description'));
    //     $event->start_date = $request->get('start_date');

      
    //     if ($request->get('program')){
    //         $event->program_event = '1';
    //     }else{
    //         $event->program_event = '0'; 
    //     }
    //     if( $request->get('Social_events')) {
    //         $event->social_event = '1';
    //     }else{
    //         $event->social_event = '0'; 
    //     }
    //     if( $request->get('Gala_dinner') ) {
    //         $event->gala_event = '1';
    //     }else{
    //         $event->gala_event = '0'; 
    //     }
    //     if( $request->get('workshops') ) {
    //         $event->workshops_event = '1';
    //     }else{
    //         $event->workshops_event = '0'; 
    //     }

    //     if(($event->program_event === '0')&&($event->social_event === '0')&&($event->gala_event === '0')&&($event->workshops_event === '0')){
    //         return 'error';
    //     }
        
        
    //     /*
    //      * Venue location info (Usually auto-filled from google maps)
    //      */

    //     $is_auto_address = (trim($request->get('place_id')) !== '');

    //     if ($is_auto_address) { /* Google auto filled */
            
    //         $event->venue_name = $request->get('name');
    //         $event->venue_name_full = $request->get('venue_name_full');
    //         $event->location_lat = $request->get('lat');
    //         $event->location_long = $request->get('lng');
    //         $event->location_address = $request->get('formatted_address');
    //         $event->location_country = $request->get('country');
    //         $event->location_country_code = $request->get('country_short');
    //         $event->location_state = $request->get('administrative_area_level_1');
    //         $event->location_address_line_1 = $request->get('route');
    //         $event->location_address_line_2 = $request->get('locality');
    //         $event->location_post_code = $request->get('postal_code');
    //         $event->location_street_number = $request->get('street_number');
    //         $event->location_google_place_id = $request->get('place_id');
    //         $event->location_is_manual = 0;
    //     } else { /* Manually entered */
            
    //         $event->venue_name = $request->get('location_venue_name');
    //         $event->location_address_line_1 = $request->get('location_address_line_1');
    //         $event->location_address_line_2 = $request->get('location_address_line_2');
    //         $event->location_state = $request->get('location_state');
    //         $event->location_post_code = $request->get('location_post_code');
    //         $event->location_is_manual = 1;
    //     }

    //     $event->end_date = $request->get('end_date');

    //     $event->currency_id = Auth::user()->account->currency_id;
    //     //$event->timezone_id = Auth::user()->account->timezone_id;
    //     /*
    //      * Set a default background for the event
    //      */
    //     $event->bg_type = 'image';
    //     $event->bg_image_path = config('attendize.event_default_bg_image');


    //     if ($request->get('organiser_name')) {
    //         $organiser = Organiser::createNew(false, false, true);

    //         $rules = [
    //             'organiser_name'  => ['required'],
    //             'organiser_email' => ['required', 'email'],
    //         ];
    //         $messages = [
    //             'organiser_name.required' => trans("Controllers.no_organiser_name_error"),
    //         ];

    //         $validator = Validator::make($request->all(), $rules, $messages);

    //         if ($validator->fails()) {
    //             return response()->json([
    //                 'status'   => 'error',
    //                 'messages' => $validator->messages()->toArray(),
    //             ]);
    //         }

    //         $organiser->name = $request->get('organiser_name');
    //         $organiser->about = $request->get('organiser_about');
    //         $organiser->email = $request->get('organiser_email');
    //         $organiser->facebook = $request->get('organiser_facebook');
    //         $organiser->twitter = $request->get('organiser_twitter');
    //         $organiser->save();
    //         $event->organiser_id = $organiser->id;
    //     } elseif ($request->get('organiser_id')) {
    //         $event->organiser_id = $request->get('organiser_id');
    //     } else { /* Somethings gone horribly wrong */
    //         return response()->json([
    //             'status'   => 'error',
    //             'messages' => trans("Controllers.organiser_other_error"),
    //         ]);
    //     }

    //     /*
    //      * Set the event defaults.
    //      * @todo these could do mass assigned
    //      */
    //     $defaults = $event->organiser->event_defaults;
    //     if ($defaults) {
    //         $event->organiser_fee_fixed = $defaults->organiser_fee_fixed;
    //         $event->organiser_fee_percentage = $defaults->organiser_fee_percentage;
    //         $event->pre_order_display_message = $defaults->pre_order_display_message;
    //         $event->post_order_display_message = $defaults->post_order_display_message;
    //         $event->offline_payment_instructions = $defaults->offline_payment_instructions;
    //         $event->enable_offline_payments = $defaults->enable_offline_payments;
    //         $event->social_show_facebook = $defaults->social_show_facebook;
    //         $event->social_show_linkedin = $defaults->social_show_linkedin;
    //         $event->social_show_twitter = $defaults->social_show_twitter;
    //         $event->social_show_email = $defaults->social_show_email;
    //         $event->social_show_googleplus = $defaults->social_show_googleplus;
    //         $event->social_show_whatsapp = $defaults->social_show_whatsapp;
    //         $event->is_1d_barcode_enabled = $defaults->is_1d_barcode_enabled;
    //         $event->ticket_border_color = $defaults->ticket_border_color;
    //         $event->ticket_bg_color = $defaults->ticket_bg_color;
    //         $event->ticket_text_color = $defaults->ticket_text_color;
    //         $event->ticket_sub_text_color = $defaults->ticket_sub_text_color;
    //     }


    //     try {
    //         $event->save();
    //     } catch (\Exception $e) {
    //         Log::error($e);

    //         return response()->json([
    //             'status'   => 'error',
    //             'messages' => trans("Controllers.event_create_exception"),
    //         ]);
    //     }

    //     if ($request->hasFile('event_image')) {
    //         $path = public_path() . '/' . config('attendize.event_images_path');
    //         $filename = 'event_image-' . md5(time() . $event->id) . '.' . strtolower($request->file('event_image')->getClientOriginalExtension());

    //         $file_full_path = $path . '/' . $filename;

    //         $request->file('event_image')->move($path, $filename);

    //         $img = Image::make($file_full_path);

    //         $img->resize(800, null, function ($constraint) {
    //             $constraint->aspectRatio();
    //             $constraint->upsize();
    //         });

    //         $img->save($file_full_path);

    //         /* Upload to s3 */
    //         \Storage::put(config('attendize.event_images_path') . '/' . $filename, file_get_contents($file_full_path));

    //         $eventImage = EventImage::createNew();
    //         $eventImage->image_path = config('attendize.event_images_path') . '/' . $filename;
    //         $eventImage->event_id = $event->id;
    //         $eventImage->save();
    //     }

    //     return response()->json([
    //         'status'      => 'success',
    //         'id'          => $event->id,
    //         'redirectUrl' => route('showEventTickets', [
    //             'event_id'  => $event->id,
    //             'first_run' => 'yup',
    //         ]),
    //     ]);
    // }

    /**
     * Edit an event
     *
     * @param Request $request
     * @param $event_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateEvent(Request $request)
    {
        //$event = Event::scope()->findOrFail('id', $request->input('id'));

        // if (!$event->validate($request->all())) {
        //     return response()->json([
        //         'status'   => 'error',
        //         'messages' => $event->errors(),
        //     ]);
        // }

        // $event->is_live = $request->get('is_live');
        // $event->currency_id = $request->get('currency_id');
        // $event->google_tag_manager_code = $request->get('google_tag_manager_code');

        $event = Event::where('id', $request->input('id'))->update([
                'title' => $request->input('title'),
                'description' => strip_tags($request->input('description')),
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),
                'language' => $request->input('language'),
                'room' => $request->input('room') ,
                'nb_session' => $request->input('nb_session') ,
                'id_stream' => $request->input('stream') ,
                'id_TOS' => $request->input('TypeOfSession') ,
                'id_program' => $request->input('program') ,
        ]);
        
       
        // $event->save();
        /*
         * If the google place ID is the same as before then don't update the venue
         */
        // if (($request->get('place_id') !== $event->location_google_place_id) || $event->location_google_place_id == '') {
        //     $is_auto_address = (trim($request->get('place_id')) !== '');

        //     if ($is_auto_address) { /* Google auto filled */
        //         $event->venue_name = $request->get('name');
        //         $event->venue_name_full = $request->get('venue_name_full');
        //         $event->location_lat = $request->get('lat');
        //         $event->location_long = $request->get('lng');
        //         $event->location_address = $request->get('formatted_address');
        //         $event->location_country = $request->get('country');
        //         $event->location_country_code = $request->get('country_short');
        //         $event->location_state = $request->get('administrative_area_level_1');
        //         $event->location_address_line_1 = $request->get('route');
        //         $event->location_address_line_2 = $request->get('locality');
        //         $event->location_post_code = $request->get('postal_code');
        //         $event->location_street_number = $request->get('street_number');
        //         $event->location_google_place_id = $request->get('place_id');
        //         $event->location_is_manual = 0;
        //     } else { /* Manually entered */
        //         $event->venue_name = $request->get('location_venue_name');
        //         $event->location_address_line_1 = $request->get('location_address_line_1');
        //         $event->location_address_line_2 = $request->get('location_address_line_2');
        //         $event->location_state = $request->get('location_state');
        //         $event->location_post_code = $request->get('location_post_code');
        //         $event->location_is_manual = 1;
        //         $event->location_google_place_id = '';
        //         $event->venue_name_full = '';
        //         $event->location_lat = '';
        //         $event->location_long = '';
        //         $event->location_address = '';
        //         $event->location_country = '';
        //         $event->location_country_code = '';
        //         $event->location_street_number = '';
        //     }
        // }

        
        // $event->event_image_position = $request->get('event_image_position');

        // if ($request->get('remove_current_image') == '1') {
        //     EventImage::where('event_id', '=', $event->id)->delete();
        // }

        

        // if ($request->hasFile('event_image')) {
        //     $path = public_path() . '/' . config('attendize.event_images_path');
        //     $filename = 'event_image-' . md5(time() . $event->id) . '.' . strtolower($request->file('event_image')->getClientOriginalExtension());

        //     $file_full_path = $path . '/' . $filename;

        //     $request->file('event_image')->move($path, $filename);

        //     $img = Image::make($file_full_path);

        //     $img->resize(800, null, function ($constraint) {
        //         $constraint->aspectRatio();
        //         $constraint->upsize();
        //     });

        //     $img->save($file_full_path);

        //     \Storage::put(config('attendize.event_images_path') . '/' . $filename, file_get_contents($file_full_path));

        //     EventImage::where('event_id', '=', $event->id)->delete();

        //     $eventImage = EventImage::createNew();
        //     $eventImage->image_path = config('attendize.event_images_path') . '/' . $filename;
        //     $eventImage->event_id = $event->id;
        //     $eventImage->save();
        // }

        // DB::connection('mysql')->table('speakers')->where('id_event', $event_id)
        // ->update([
        //     'firstName' => $request->get('firstName'),
        //     'lastName' => $request->get('lastName'),
        //     'email' => $request->get('email'),
        //     'phone' => $request->get('phone'),
        //     'description' => strip_tags($request->get('desc')),
        // ]);

        return response()->json([
            'status'      => 'success',
            //'id'          => $event->id,
            //'message'     => trans("Controllers.event_successfully_updated"),
            //'redirectUrl' => route('showOrganiserDashboard', [
                //'organiser_id'  => $event->organiser->id,
                
            //]),
        ]);
    }

    /**
     * Upload event image
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function postUploadEventImage(Request $request)
    {
        if ($request->hasFile('event_image')) {
            $the_file = \File::get($request->file('event_image')->getRealPath());
            $file_name = 'event_details_image-' . md5(microtime()) . '.' . strtolower($request->file('event_image')->getClientOriginalExtension());

            $relative_path_to_file = config('attendize.event_images_path') . '/' . $file_name;
            $full_path_to_file = public_path() . '/' . $relative_path_to_file;

            $img = Image::make($the_file);

            $img->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            $img->save($full_path_to_file);
            if (\Storage::put($file_name, $the_file)) {
                return response()->json([
                    'link' => '/' . $relative_path_to_file,
                ]);
            }

            return response()->json([
                'error' => trans("Controllers.image_upload_error"),
            ]);
        }
    }

    /**
     * Puplish event and redirect
     * @param  Integer|false $event_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function makeEventLive($event_id = false) {
        $event = Event::scope()->findOrFail($event_id);
        $event->is_live = 1;
        $event->save();
        \Session::flash('message', trans('Event.go_live'));

        return redirect()->action(
            'EventDashboardController@showDashboard', ['event_id' => $event_id]
        );
    }

    public function listEventSelect(){

        $p = DB::connection('mysql')->select('select * from events where program_event = "1"');
        $s = DB::connection('mysql')->select('select * from events where social_event = "1"');
        $g = DB::connection('mysql')->select('select * from events where gala_event = "1"');
        $w = DB::connection('mysql')->select('select * from events where workshops_event = "1"');

        $data=[
            'program'       => $p,
            'social'        => $s,
            'gala'          => $g,
            'workshops'     => $w,
        ];
        
        return $data ;
    }





 public function newEvent(Request $request)
   {
        $event = Event::createNew();
        

        if (!$event->validate($request->all())) {
            return response()->json([
                'status'   => 'error',
                'messages' => $event->errors(),
            ]);
        }
        

        $event->title = $request->get('title');
        $event->description = strip_tags($request->get('description'));
        $event->start_date = $request->get('start_date');
        $event->end_date = $request->get('end_date');

        $event->language = $request->get('language');
        $event->room = $request->get('room') ;
        $event->nb_session = $request->get('nb_session') ;
        $event->id_stream = $request->get('stream') ;
        $event->id_TOS = $request->get('TypeOfSession') ;
        $event->id_program = $request->get('program') ;

        $event->account_id = $request->get('organiser_id');
        $event->user_id = $request->get('organiser_id');
        $event->currency_id = $request->get('currency_id');
        $event->organiser_id = $request->get('organiser_id');
        $event->venue_name = $request->get('title');
       
        $event->save();
        $id_event = $event->id;
        
        $chairs = $request->get('chair');
        $speakers = $request->get('speaker');
        
        if ($id_event != null)
        {
            foreach($speakers as  $sp){
                $ss = new sessionSpeaker();
        
                $ss->session_id = $id_event;
                $ss->speaker_id = $sp;
                $ss->save();
            }
            foreach($chairs as  $ch){
                $sc = new sessionChair();
                $sc->session_id = $id_event;
                $sc->chair_id = $ch;
                $sc->save();
            }

            return response()->json([
                'status'      => 'success',
                'id'          => $id_event,
                'redirectUrl' => route('showOrganiserDashboard', [
                    'organiser_id'  => $event->organiser->id,
                    
                ]),
            ]);

        }
        
    }

    public function removeSession(Request $request)
    {
        // remove by id.
        if ($request->has('id')) {
            
            $data = Event::where('id', $request->input('id'))->delete();
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

