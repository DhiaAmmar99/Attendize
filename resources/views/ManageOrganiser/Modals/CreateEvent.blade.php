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
                                    <input type="text" name="title" required class="form-control" placeholder="Enter your title session" required>
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
                                    <select class="form-control" required style="pointer-events: none;" id="SPselect">
                                        <option selected disabled value="">Select speakers</option>
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
                                    <select class="form-control" required style="pointer-events: none;" id="CHselect">
                                        <option selected disabled value="">Select chairs</option>
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
                        <div class="form-group custom-theme">
                            {!! Form::label('description', "Session description", array('class'=>'control-label required')) !!}
                            <textarea  class="form-control  w-100" name="description" rows="5" required></textarea> 

                           
                        </div>
                    

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

    $("input:checkbox[name='speaker[]']").change(function(){
        if($("input:checkbox[name='speaker[]']:checked").length > 0)
            $("#SPselect").removeAttr("required");
        else
        $("#SPselect").attr("required", "required");
    });
    $("input:checkbox[name='chair[]']").change(function(){
        if($("input:checkbox[name='chair[]']:checked").length > 0)
            $("#CHselect").removeAttr("required");
        else
        $("#CHselect").attr("required", "required");
    });
</script>
