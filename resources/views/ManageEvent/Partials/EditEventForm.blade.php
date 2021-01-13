@include('ManageOrganiser.Partials.EventCreateAndEditJS')

{!! Form::model($event, array('url' => route('postEditEvent', ['event_id' => $event->id]), 'class' => 'ajax gf')) !!}

<div class="row">
    <div class="col-md-12">
        <div class="form-group" id="group-check">
            
            {{-- {!! Form::label('title', 'event type', array('class'=>'control-label required event_type')) !!}<br/>
         
            
                @if ($event->program_event == 1)
                <input type="checkbox" name="program" id="program" value="P" checked />
                @else
                <input type="checkbox" name="program" id="program" value="P" >
                @endif
                <label for="program" class="checkEvent">Professional program </label>

                @if ($event->social_event == 1)
                <input type="checkbox" name="Social_events" id="Social_events" value="S" checked />
                @else
                <input type="checkbox" name="Social_events" id="Social_events" value="S">
                @endif
                <label for="Social_events" class="checkEvent">Social events  </label>

                @if ($event->gala_event == 1)
                <input type="checkbox" name="Gala_dinner" id="Gala_dinner" value="G" checked />
                @else
                <input type="checkbox" name="Gala_dinner" id="Gala_dinner" value="G">
                @endif
                <label for="Gala_dinner" class="checkEvent">Gala dinner</label>

                @if ($event->workshops_event == 1)
                <input type="checkbox" name="workshops" id="workshops" value="W" checked />
                @else
                <input type="checkbox" name="workshops" id="workshops" value="W">
                @endif
                <label for="workshops" class="checkEvent">Workshops</label>  
                
                <div id="event_error" style="color: #ED5466;"></div>  
        </div> --}}


        {{-- <div class="form-group">
          {!! Form::label('currency_id', trans("ManageEvent.default_currency"), array('class'=>'control-label required')) !!}
          {!! Form::select('currency_id', $currencies, $event->currency_id, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('is_live', trans("Event.event_visibility"), array('class'=>'control-label required')) !!}
            {!!  Form::select('is_live', [
            '1' => trans("Event.vis_public"),
            '0' => trans("Event.vis_hide")],null,
                                        array(
                                        'class'=>'form-control'
                                        ))  !!}
        </div> --}}
        <div class="form-group">
            {!! Form::label('title', trans("Event.event_title"), array('class'=>'control-label required')) !!}
            {!!  Form::text('title', old('title'),
                                        array(
                                        'class'=>'form-control',
                                        'placeholder'=>trans("Event.event_title_placeholder", ["name"=>Auth::user()->first_name])
                                        ))  !!}
        </div>

        <div class="form-group">
           {!! Form::label('description', trans("Event.event_description"), array('class'=>'control-label')) !!}
            {!!  Form::textarea('description', old('description'),
                                        array(
                                        'class'=>'form-control editable',
                                        'rows' => 5
                                        ))  !!}
        </div>

        {{-- <div class="form-group address-automatic" style="display:{{$event->location_is_manual ? 'none' : 'block'}};">
            {!! Form::label('name', trans("Event.venue_name"), array('class'=>'control-label required ')) !!}
            {!!  Form::text('venue_name_full', old('venue_name_full'),
                                        array(
                                        'class'=>'form-control geocomplete location_field',
                                        'placeholder'=>trans("Event.venue_name_placeholder")//'E.g: The Crab Shack'
                                        ))  !!}

            <!--These are populated with the Google places info-->
            <div>
               {!! Form::hidden('formatted_address', $event->location_address, ['class' => 'location_field']) !!}
               {!! Form::hidden('street_number', $event->location_street_number, ['class' => 'location_field']) !!}
               {!! Form::hidden('country', $event->location_country, ['class' => 'location_field']) !!}
               {!! Form::hidden('country_short', $event->location_country_short, ['class' => 'location_field']) !!}
               {!! Form::hidden('place_id', $event->location_google_place_id, ['class' => 'location_field']) !!}
               {!! Form::hidden('name', $event->venue_name, ['class' => 'location_field']) !!}
               {!! Form::hidden('location', '', ['class' => 'location_field']) !!}
               {!! Form::hidden('postal_code', $event->location_post_code, ['class' => 'location_field']) !!}
               {!! Form::hidden('route', $event->location_address_line_1, ['class' => 'location_field']) !!}
               {!! Form::hidden('lat', $event->location_lat, ['class' => 'location_field']) !!}
               {!! Form::hidden('lng', $event->location_long, ['class' => 'location_field']) !!}
               {!! Form::hidden('administrative_area_level_1', $event->location_state, ['class' => 'location_field']) !!}
               {!! Form::hidden('sublocality', '', ['class' => 'location_field']) !!}
               {!! Form::hidden('locality', $event->location_address_line_1, ['class' => 'location_field']) !!}
            </div>
            <!-- /These are populated with the Google places info-->

        </div>

         <div class="address-manual" style="display:{{$event->location_is_manual ? 'block' : 'none'}};">
            <div class="form-group">
                {!! Form::label('location_venue_name', trans("Event.venue_name"), array('class'=>'control-label required ')) !!}
                {!!  Form::text('location_venue_name', $event->venue_name, [
                                        'class'=>'form-control location_field',
                                        'placeholder'=>trans("Event.venue_name_placeholder") // same as above
                            ])  !!}
            </div>
            <div class="form-group">
                {!! Form::label('location_address_line_1', trans("Event.address_line_1"), array('class'=>'control-label')) !!}
                {!!  Form::text('location_address_line_1', $event->location_address_line_1, [
                                        'class'=>'form-control location_field',
                                        'placeholder'=>trans("Event.address_line_1_placeholder")//'E.g: 45 Grafton St.'
                            ])  !!}
            </div>
            <div class="form-group">
                {!! Form::label('location_address_line_2', trans("Event.address_line_2"), array('class'=>'control-label')) !!}
                {!!  Form::text('location_address_line_2', $event->location_address_line_2, [
                                        'class'=>'form-control location_field',
                                        'placeholder'=>trans("Event.address_line_2_placeholder")//'E.g: Dublin.'
                            ])  !!}
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('location_state', trans("Event.city"), array('class'=>'control-label')) !!}
                        {!!  Form::text('location_state', $event->location_state, [
                                        'class'=>'form-control location_field',
                                        'placeholder'=>trans("Event.city_placeholder")//'E.g: Dublin.'
                            ])  !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('location_post_code', trans("Event.post_code"), array('class'=>'control-label')) !!}
                        {!!  Form::text('location_post_code', $event->location_post_code, [
                                        'class'=>'form-control location_field',
                                        'placeholder'=>trans("Event.post_code_placeholder")// 'E.g: 94568.'
                            ])  !!}
                    </div>
                </div>
            </div>
        </div> 

         <div class="clearfix" style="margin-top:-10px; padding: 5px; padding-top: 0px;">
            <span class="pull-right">
                @lang("Event.or(manual/existing_venue)") <a data-clear-field=".location_field" data-toggle-class=".address-automatic, .address-manual" data-show-less-text="{{$event->location_is_manual ? trans("Event.enter_manual"):trans("Event.enter_existing")}}" href="javascript:void(0);" class="show-more-options clear_location">{{$event->location_is_manual ? trans("Event.enter_existing"):trans("Event.enter_manual")}}</a>
            </span>
        </div> --}}

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('start_date', trans("Event.event_start_date"), array('class'=>'required control-label')) !!}
                    {!!  Form::text('start_date', $event->getFormattedDate('start_date'),
                                                [
                                                    'class'=>'form-control start hasDatepicker ',
                                                    'data-field'=>'datetime',
                                                    'data-startend'=>'start',
                                                    'data-startendelem'=>'.end',
                                                    'readonly'=>''
                                                ])  !!}
                </div>
            </div>

            <div class="col-sm-6 ">
                <div class="form-group">
                    {!!  Form::label('end_date', trans("Event.event_end_date"),
                                        [
                                    'class'=>'required control-label '
                                ])  !!}
                    {!!  Form::text('end_date', $event->getFormattedDate('end_date'),
                                        [
                                            'class'=>'form-control end hasDatepicker ',
                                            'data-field'=>'datetime',
                                            'data-startend'=>'end',
                                            'data-startendelem'=>'.start',
                                            'readonly'=>''
                                        ])  !!}
                </div>
            </div>
        </div>
        {{-- <div>
            <label for="fisrtName" class="required  control-label">Fisrt name</label>
            <input type="text" id="firstName" name="firstName" value="{{ $speaker[0]->firstName }}" class="form-control" />

            <label for="lastName" class="required control-label">Last name</label>
            <input type="text" id="lastName" name="lastName" value="{{ $speaker[0]->lastName }}" class="form-control"/>

            <label for="email" class="required control-label">Email</label>
            <input type="email" id="email" name="email" value="{{ $speaker[0]->email }}" class="form-control"/>

            <label for="phone" class="required control-label">Phone</label>
            <input type="tel" pattern="[0-9]{8}" id="phone" name="phone" value="{{ $speaker[0]->phone }}" class="form-control"/>

            <label for="desc" class="required control-label">Discription</label>
            
            <!-- {!!  Form::textarea('desc', old('desc'),
                        array(
                        'class'=>'form-control  editable',
                        'rows' => 5
                        ))  !!} -->

            <textarea class="form-control  editable" id="desc" name="desc">{{ $speaker[0]->description }}</textarea>
        </div> --}}

        {{-- <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                   {!! Form::label('event_image', trans("Event.event_flyer"), array('class'=>'control-label ')) !!}
                   {!! Form::styledFile('event_image', 1) !!}
                </div>

                @if($event->images->count())
                    <div class="form-group">
                        {!! Form::label('event_image_position', trans("Event.event_image_position"), array('class'=>'control-label')) !!}
                        {!! Form::select('event_image_position', [
                                '' => trans("Event.event_image_position_hide"),
                                'before' => trans("Event.event_image_position_before"),
                                'after' => trans("Event.event_image_position_after"),
                                'left' => trans("Event.event_image_position_left"),
                                'right' => trans("Event.event_image_position_right"),
                            ],
                            old('event_image_position'),
                            ['class'=>'form-control']
                        ) !!}
                    </div>
                    {!! Form::label('', trans("Event.current_event_flyer"), array('class'=>'control-label ')) !!}
                    <div class="form-group">
                        <div class="well well-sm well-small">
                           {!! Form::label('remove_current_image', trans("Event.delete?"), array('class'=>'control-label ')) !!}
                           {!! Form::checkbox('remove_current_image') !!}

                        </div>
                    </div>
                @endif
            </div>
            <div class="col-md-6">
                <div class="float-l">
                    @if($event->images->count())
                    <div class="thumbnail">
                       {!!Html::image('/'.$event->images->first()['image_path'])!!}
                    </div>
                    @endif
                </div>
            </div>
        </div> 
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('google_tag_manager_code', trans("Organiser.google_tag_manager_code"), ['class'=>'control-label']) !!}
                    {!!  Form::text('google_tag_manager_code', old('google_tag_manager_code'), [
                            'class'=>'form-control',
                            'placeholder' => trans("Organiser.google_tag_manager_code_placeholder"),
                        ])
                    !!}
                </div>
            </div>
        </div>--}}
    </div>

    <div class="col-md-12">
        <div class="panel-footer mt15 text-right">
           {!! Form::hidden('organiser_id', $event->organiser_id) !!}
           {!! Form::submit(trans("Event.save_changes"), ['class'=>"btn btn-success"]) !!}
        </div>
    </div>
    {!! Form::close() !!}
</div>
<script>
    jQuery('.btn-success').click(function() {
        if ((jQuery("#program").is(':checked')) || (jQuery("#Social_events").is(':checked')) || (jQuery("#Gala_dinner").is(':checked')) || (jQuery("#workshops").is(':checked'))) {
            jQuery(`#event_error`).text("");
            jQuery(".event_type").css("color", "#6f6f6f", "!important");
                
        } else {
            jQuery("#event_error").text("Please check event.");
            jQuery(".event_type").css("color", "#ED5466", "!important");
        }
    });

</script>

