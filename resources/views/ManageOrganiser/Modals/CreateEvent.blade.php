<div role="dialog"  class="modal fade" style="display: none;">

    @include('ManageOrganiser.Partials.EventCreateAndEditJS');

    {!! Form::open(array('url' => route('newEvent'), 'class' => 'ajax gf')) !!}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">
                    <i class="ico-calendar"></i>
                    Create Session</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('title', "Session title", array('class'=>'control-label required')) !!}
                                    {{-- {!!  Form::text('title', old('title'),array('class'=>'form-control','placeholder'=>"Enter your title session " ))  !!} --}}
                                    <input type="text" name="title" required class="form-control" placeholder="Enter your title session">
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label("","program", array('class'=>'required control-label')) !!}
                                    <select class="form-control" name="program" id="program" required>
                                        <option value="" selected disabled>Select program</option>
                                        @foreach ($programs as $p)
                                            
                                            <option data="{{$p->date}}" value="{{$p->id}}">{{$p->day}} : {{Str::limit($p->date, $limit = 10, $end = '')}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <input type="hidden" name="start_date" id="start_date" value="2021-01-07 00:00">
                            <input type="hidden" name="end_date" id="end_date"  value="2021-01-07 00:00">
                        
                        
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!!  Form::label('Session time', "Session time",['class'=>'required control-label'])  !!}

                                    <select class="form-control" id="time" required disabled>
                                        <option value="" selected disabled>Select time</option>
                                        <option value="1">09:00 - 11:00</option>
                                        <option value="2">13:00 - 15:00</option>
                                        <option value="3">16:00 - 18:00</option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label("","language", array('class'=>'required control-label')) !!}
                                    
                                    <select class="form-control" name="language" required>
                                        <option value="" selected disabled>Select language</option>
                                        <option value="RU">RU</option>
                                        <option value="EN">EN</option>
                                        <option value="FR">FR</option>
                                        <option value="AR">AR</option>
                                        <option value="ES">ES</option>
                                    </select>
                                </div>
                            </div>
                        
                           
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label("","stream", array('class'=>'required control-label')) !!}
                                    <select class="form-control" name="stream" required>
                                        <option value="" selected disabled>Select stream</option>
                                        @foreach ($streams as $s)
                                            <option  value="{{$s->id}}">{{$s->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label("","TypeOfSession", array('class'=>'required control-label')) !!}
                                    <select class="form-control" name="TypeOfSession" required>
                                        <option value="" selected disabled>Select type of session</option>
                                        @foreach ($tos as $t)
                                            <option value="{{$t->id}}">{{$t->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="nb_session" class="required control-label">NUMBER OF SESSION</label>
                                    <input type="number" required class="form-control" name="nb_session" min="1" max="20" id="nb_session" placeholder="Enter your nomber of session"/>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="room" class="required control-label">NUMBER OF room</label>
                                    <input  type="number" required class="form-control" name="room" id="room" min="1" max="20"  placeholder="Enter your nomber of room"/>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="nb_places" class="required control-label">NUMBER OF participate</label>
                                    <input  type="number" required class="form-control" name="nb_places" id="nb_places" min="1" max="20"  placeholder="Enter your nomber of room"/>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group" onclick="showCheckboxes('checkboxesSP')">
                                    {!! Form::label("","speakers", array('class'=>'required control-label')) !!}
                                    <select class="form-control"  style="pointer-events: none;">
                                        <option selected disabled>Select speakers</option>
                                    </select>
                                    <div id="checkboxesSP" class="checkboxes">
                                        @foreach ($speakers as $sp)
                                            <label for="sp-{{$sp->id}}" class="speaker">
                                                <input type="checkbox" id="sp-{{$sp->id}}" name="speaker[]"  value="{{$sp->id}}"/> &nbsp; {{$sp->firstname}} &nbsp; {{$sp->lastname}}</label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group" onclick="showCheckboxes('checkboxesCH')">
                                    {!! Form::label("","chairs", array('class'=>'control-label')) !!}
                                    <select class="form-control"  style="pointer-events: none;">
                                        <option selected disabled>Select chairs</option>
                                    </select>
                                    <div id="checkboxesCH" class="checkboxes">
                                        @foreach ($chairs as $c)
                                            <label for="ch-{{$c->id}}" class="speaker">
                                                <input type="checkbox" id="ch-{{$c->id}}" name="chair[]" value="{{$c->id}}"/> &nbsp; {{$c->firstname}} &nbsp; {{$c->lastname}}</label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                        </div>
                       
                       
                        {{-- <script>
                            direction='http://127.0.0.1:8000'
                            $('.btn-success').click(function() {
                                var speakers = [];
                                $('#checkboxesSP input:checked').each(function() {
                                    speakers.push(this.name);
                                });
                               
                                var chairs = [];
                                $('#checkboxesCH input:checked').each(function() {
                                    chairs.push(this.name);
                                });
                                
                                console.log('sp', speakers);
                                console.log('ch', chairs);
                                speakers.forEach(element => 
                                
                                function addSp(element, idS);
                                
                                );

                                function addSp(idsp, idS){
                                    jQuery.ajax({
                                        type: "post",
                                        url: direction + "/api/SessionSpeaker",
                                        data: {"session_id": idS,"speaker_id": idsp},
                                    });
                                }
                            });
                        </script> --}}
                       


                        <div class="form-group custom-theme">
                            {!! Form::label('description', "Session description", array('class'=>'control-label required')) !!}
                            <textarea  class="form-control  w-100" name="description" rows="5" required></textarea> 

                           
                        </div>
                        {{-- <div>
                            <label for="fisrtName" class="required  control-label">Fisrt name</label>
                            <input type="text" id="fisrtName" name="fisrtName" class="form-control" />

                            <label for="lastName" class="required control-label">Last name</label>
                            <input type="text" id="lastName" name="lastName" class="form-control"/>

                            <label for="email" class="required control-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control"/>

                            <label for="phone" class="required control-label">Phone</label>
                            <input type="tel" pattern="[0-9]{8}" id="phone" name="phone" class="form-control"/>

                            <label for="desc" class="required control-label">Discription</label>
                            
                            {!!  Form::textarea('desc', old('desc'),
                                        array(
                                        'class'=>'form-control  editable',
                                        'rows' => 5
                                        ))  !!}
                        </div> --}}

                        {{-- <div class="form-group">
                            {!! Form::label('event_image', trans("Event.event_image"), array('class'=>'control-label ')) !!}
                            {!! Form::styledFile('event_image') !!}

                        </div> --}}
                        {{-- @if(!empty(config("attendize.google_maps_geocoding_key")))
                        <div class="form-group address-automatic">
                            {!! Form::label('name', trans("Event.venue_name"), array('class'=>'control-label required ')) !!}
                            {!!  Form::text('venue_name_full', old('venue_name_full'),
                                        array(
                                        'class'=>'form-control geocomplete location_field',
                                        'placeholder'=>trans("Event.venue_name_placeholder")
                                        ))  !!}

                                    <!--These are populated with the Google places info-->
                            <div>
                                {!! Form::hidden('formatted_address', '', ['class' => 'location_field']) !!}
                                {!! Form::hidden('street_number', '', ['class' => 'location_field']) !!}
                                {!! Form::hidden('country', '', ['class' => 'location_field']) !!}
                                {!! Form::hidden('country_short', '', ['class' => 'location_field']) !!}
                                {!! Form::hidden('place_id', '', ['class' => 'location_field']) !!}
                                {!! Form::hidden('name', '', ['class' => 'location_field']) !!}
                                {!! Form::hidden('location', '', ['class' => 'location_field']) !!}
                                {!! Form::hidden('postal_code', '', ['class' => 'location_field']) !!}
                                {!! Form::hidden('route', '', ['class' => 'location_field']) !!}
                                {!! Form::hidden('lat', '', ['class' => 'location_field']) !!}
                                {!! Form::hidden('lng', '', ['class' => 'location_field']) !!}
                                {!! Form::hidden('administrative_area_level_1', '', ['class' => 'location_field']) !!}
                                {!! Form::hidden('sublocality', '', ['class' => 'location_field']) !!}
                                {!! Form::hidden('locality', '', ['class' => 'location_field']) !!}
                            </div>
                            <!-- /These are populated with the Google places info-->
                        </div> 

                        <div class="address-manual" style="display:none;">
                            <h5>
                                @lang("Event.address_details")
                            </h5>

                            <div class="form-group">
                                {!! Form::label('location_venue_name', trans("Event.venue_name"), array('class'=>'control-label required ')) !!}
                                {!!  Form::text('location_venue_name', old('location_venue_name'), [
                                        'class'=>'form-control location_field',
                                        'placeholder'=>trans("Event.venue_name_placeholder")
                                        ])  !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('location_address_line_1', trans("Event.address_line_1"), array('class'=>'control-label')) !!}
                                {!!  Form::text('location_address_line_1', old('location_address_line_1'), [
                                        'class'=>'form-control location_field',
                                        'placeholder'=>trans("Event.address_line_1_placeholder")
                                        ])  !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('location_address_line_2', trans("Event.address_line_2"), array('class'=>'control-label')) !!}
                                {!!  Form::text('location_address_line_2', old('location_address_line_2'), [
                                        'class'=>'form-control location_field',
                                        'placeholder'=>trans("Event.address_line_2_placeholder")
                                        ])  !!}
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('location_state', trans("Event.city"), array('class'=>'control-label')) !!}
                                        {!!  Form::text('location_state', old('location_state'), [
                                                'class'=>'form-control location_field',
                                                'placeholder'=>trans("Event.city_placeholder")
                                                ])  !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('location_post_code', trans("Event.post_code"), array('class'=>'control-label')) !!}
                                        {!!  Form::text('location_post_code', old('location_post_code'), [
                                                'class'=>'form-control location_field',
                                                'placeholder'=>trans("Event.post_code_placeholder")
                                                ])  !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <span>
                            <a data-clear-field=".location_field"
                               data-toggle-class=".address-automatic, .address-manual"
                               data-show-less-text="@lang("Event.or(manual/existing_venue)") <b>@lang("Event.enter_existing")</b>" href="javascript:void(0);"
                               class="in-form-link show-more-options clear_location">
                            @lang("Event.or(manual/existing_venue)") <b>@lang("Event.enter_manual")</b>
                            </a>
                        </span>
                        @else--}}
                        {{-- <div class="address-manual">
                            <h5>
                                @lang("Event.address_details")
                            </h5>

                            <div class="form-group">
                                {!! Form::label('location_venue_name', trans("Event.venue_name"), array('class'=>'control-label required ')) !!}
                                {!!  Form::text('location_venue_name', old('location_venue_name'), [
                                        'class'=>'form-control location_field',
                                        'placeholder'=>trans("Event.venue_name_placeholder")
                                        ])  !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('location_address_line_1', trans("Event.address_line_1"), array('class'=>'control-label')) !!}
                                {!!  Form::text('location_address_line_1', old('location_address_line_1'), [
                                        'class'=>'form-control location_field',
                                        'placeholder'=>trans("Event.address_line_1_placeholder")
                                        ])  !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('location_address_line_2', trans("Event.address_line_2"), array('class'=>'control-label')) !!}
                                {!!  Form::text('location_address_line_2', old('location_address_line_2'), [
                                        'class'=>'form-control location_field',
                                        'placeholder'=>trans("Event.address_line_2_placeholder")
                                        ])  !!}
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('location_state', trans("Event.city"), array('class'=>'control-label')) !!}
                                        {!!  Form::text('location_state', old('location_state'), [
                                                'class'=>'form-control location_field',
                                                'placeholder'=>trans("Event.city_placeholder")
                                                ])  !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('location_post_code', trans("Event.post_code"), array('class'=>'control-label')) !!}
                                        {!!  Form::text('location_post_code', old('location_post_code'), [
                                                'class'=>'form-control location_field',
                                                'placeholder'=>trans("Event.post_code_placeholder")
                                                ])  !!}
                                    </div>
                                </div>
                            </div>
                        </div> 
                        @endif--}}

                        {{-- @if($organiser_id) --}}
                            
                        {{-- @else --}}
                             {{--<div class="create_organiser" style="{{$organisers->isEmpty() ? '' : 'display:none;'}}">
                                <h5>
                                    @lang("Organiser.organiser_details")
                                </h5>

                                <div class="form-group">
                                    {!! Form::label('organiser_name', trans("Organiser.organiser_name"), array('class'=>'required control-label ')) !!}
                                    {!!  Form::text('organiser_name', old('organiser_name'),
                                                array(
                                                'class'=>'form-control',
                                                'placeholder'=>trans("Organiser.organiser_name_placeholder")
                                                ))  !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('organiser_email', trans("Organiser.organiser_email"), array('class'=>'control-label required')) !!}
                                    {!!  Form::text('organiser_email', old('organiser_email'),
                                                array(
                                                'class'=>'form-control ',
                                                'placeholder'=>trans("Organiser.organiser_email_placeholder")
                                                ))  !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('organiser_about', trans("Organiser.organiser_description"), array('class'=>'control-label ')) !!}
                                    {!!  Form::textarea('organiser_about', old('organiser_about'),
                                                array(
                                                'class'=>'form-control editable2',
                                                'placeholder'=>trans("Organiser.organiser_description_placeholder"),
                                                'rows' => 4
                                                ))  !!}
                                </div>
                                <div class="form-group more-options">
                                    {!! Form::label('organiser_logo', trans("Organiser.organiser_logo"), array('class'=>'control-label ')) !!}
                                    {!! Form::styledFile('organiser_logo') !!}
                                </div>
                                <div class="row more-options">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('organiser_facebook', trans("Organiser.organiser_facebook"), array('class'=>'control-label ')) !!}
                                            {!!  Form::text('organiser_facebook', old('organiser_facebook'),
                                                array(
                                                'class'=>'form-control ',
                                                'placeholder'=>trans("Organiser.organiser_facebook_placeholder")
                                                ))  !!}

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('organiser_twitter', trans("Organiser.organiser_twitter"), array('class'=>'control-label ')) !!}
                                            {!!  Form::text('organiser_twitter', old('organiser_twitter'),
                                                array(
                                                'class'=>'form-control ',
                                                'placeholder'=>trans("Organiser.organiser_twitter_placeholder")
                                                ))  !!}

                                        </div>
                                    </div>
                                </div>

                                <a data-show-less-text="@lang("Organiser.hide_additional_organiser_options")" href="javascript:void(0);"
                                   class="in-form-link show-more-options">
                                    @lang("Organiser.additional_organiser_options")
                                </a>
                            </div> 

                             @if(!$organisers->isEmpty()) 
                                 <div class="form-group select_organiser" style="{{$organisers ? '' : 'display:none;'}}">

                                    {!! Form::label('organiser_id', trans("Organiser.select_organiser"), array('class'=>'control-label ')) !!}
                                    {!! Form::select('organiser_id', $organisers, $organiser_id, ['class' => 'form-control']) !!}

                                </div>
                                <span class="">
                                    @lang("Organiser.or") <a data-toggle-class=".select_organiser, .create_organiser"
                                       data-show-less-text="<b>@lang("Organiser.select_an_organiser")</b>" href="javascript:void(0);"
                                       class="in-form-link show-more-options">
                                        <b>@lang("Organiser.create_an_organiser")</b>
                                    </a>
                                </span> 
                            @endif
                        @endif--}}

                        {!! Form::hidden('organiser_id', $organiser_id) !!}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <span class="uploadProgress"></span>
                {!! Form::button(trans("basic.cancel"), ['class'=>"btn modal-close btn-danger",'data-dismiss'=>'modal']) !!}
                {!! Form::submit(trans("Event.create_event"), ['class'=>"btn btn-success"]) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
<style>
                                
    .checkboxes {
    display: none;
    border: 1px #dadada solid;
    padding: 10px 0;
    }

    .checkboxes label {
    display: block;
    }

    .checkboxes label:hover {
    background-color: #e0e0e0;
    }
    .checkboxes label {
        padding: 0 10px;
    }
</style>
<script>
    var expanded = false;

    function showCheckboxes(id) {
    var checkboxes = document.getElementById(id);
    if (!expanded) {
        checkboxes.style.display = "block";
        expanded = true;
    } else {
        checkboxes.style.display = "none";
        expanded = false;
    }
    }

    /* date input */
    $date = '';
    $("#program").change(function(){
        $res = jQuery("#program option:selected").attr("data");
        $SD = jQuery("#start_date").val();
        $ED = jQuery("#end_date").val();
        $date = $res.slice(0, 10);
        $("#time").removeAttr('disabled');
        $("#start_date").val($date+$SD.slice(10, 16));
        $("#end_date").val($date+$ED.slice(10, 16));
    });
    $("#time").change(function(){
        $time = jQuery("#time option:selected").attr("value");
                
        if ($time == 1){
            $("#start_date").val($date +" "+ "09:00");
            $("#end_date").val($date +" "+"11:00");
        }else if($time == 2){
            $("#start_date").val($date +" "+ "13:00");
            $("#end_date").val($date +" "+"15:00");
        }else if($time == 3){
            $("#start_date").val($date +" "+ "16:00");
            $("#end_date").val($date +" "+"18:00");
        }
    });
</script>
