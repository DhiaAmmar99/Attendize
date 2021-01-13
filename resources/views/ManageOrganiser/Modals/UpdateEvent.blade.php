<div role="dialog"  class="modal fade" style="display: none;">
    @include('ManageOrganiser.Partials.EventCreateAndEditJS');
    {!! Form::open(array('url' => route('updateEvent'), 'class' => 'ajax gf')) !!}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">
                    <i class="ico-calendar"></i>
                    Update Session</h3> 
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <input  type="hidden" name="id" value="{{ $event->id }}">
                            <input  type="hidden" name="organiser_id" value="{{ $organiser_id }}">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('title', "Session title", array('class'=>'control-label required')) !!}
                                    {!!  Form::text('title', $event->title ,array('class'=>'form-control','placeholder'=>"Enter your title session " ))  !!}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label("","program", array('class'=>'required control-label')) !!}
                                    <select class="form-control" name="program" id="program">
                                        <option  disabled>Select program</option>
                                         @foreach ($programs as $p)
                                            @if($p->id == $event->id_program)
                                                <option selected data="{{$p->date}}" value="{{$p->id}}">{{$p->day}}</option>
                                            @else
                                                <option data="{{$p->date}}" value="{{$p->id}}">{{$p->day}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div> 


                            <input type="hidden" name="start_date" id="start_date" value="2021-01-07 00:00">
                            <input type="hidden" name="end_date" id="end_date"  value="2021-01-07 00:00">
                        

                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!!  Form::label('Session time', "Session time",['class'=>'required control-label'])  !!}

                                    <select class="form-control" id="time">
                                        <option  disabled>Select time</option>
                                        @if($event->start_date->format('H') == '09')
                                            <option selected value="1">09:00 - 11:00</option>
                                        @else 
                                            <option  value="1">09:00 - 11:00</option>
                                        @endif
                                        @if($event->start_date->format('H') == '13')
                                            <option selected value="2">13:00 - 15:00</option>
                                        @else 
                                            <option value="2">13:00 - 15:00</option>
                                        @endif
                                        @if($event->start_date->format('H') == '16')
                                            <option selected value="3">16:00 - 18:00</option>
                                        @else 
                                            <option value="3">16:00 - 18:00</option>
                                        @endif
                                    </select>

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label("","language", array('class'=>'required control-label')) !!}
                                    
                                    <select class="form-control" name="language" id="selectLang">
                                        <option  disabled>Select language</option>
                                        @if ($event->language == 'RU')
                                            <option selected value="RU">RU</option>
                                        @else
                                            <option value="RU">RU</option>
                                        @endif
                                        @if ($event->language == 'EN')
                                            <option selected value="EN">EN</option>
                                        @else
                                            <option value="EN">EN</option>
                                        @endif
                                        @if ($event->language == 'FR')
                                            <option selected value="FR">FR</option>
                                        @else
                                            <option value="FR">FR</option>
                                        @endif
                                        @if ($event->language == 'AR')
                                            <option selected value="AR">AR</option>
                                        @else
                                            <option value="AR">AR</option>
                                        @endif
                                        @if ($event->language == 'ES')
                                            <option selected value="ES">ES</option>
                                        @else
                                            <option value="ES">ES</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nb_session" class="required control-label">NUMBER OF SESSION</label>
                                    <input type="number" class="form-control" name="nb_session" value="{{$event->nb_session}}" min="1" max="20" id="nb_session" placeholder="Enter your nomber of session"/>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="room" class="required control-label">NUMBER OF room</label>
                                    <input  type="number" class="form-control" name="room" value="{{$event->room}}" id="room" min="1" max="20"  placeholder="Enter your nomber of room"//>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label("","stream", array('class'=>'required control-label')) !!}
                                    <select class="form-control" name="stream">
                                        <option  disabled>Select stream</option>
                                         @foreach ($streams as $s)
                                            @if($s->id == $event->id_stream)
                                                <option selected value="{{$s->id}}">{{$s->title}}</option>
                                            @else
                                                <option  value="{{$s->id}}">{{$s->title}}</option>
                                            @endif
                                        @endforeach 
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label("","TypeOfSession", array('class'=>'required control-label')) !!}
                                    <select class="form-control" name="TypeOfSession">
                                        <option  disabled>Select type of session</option>
                                         @foreach ($tos as $t)
                                         @if($t->id == $event->id_TOS)
                                            <option selected value="{{$t->id}}">{{$t->title}}</option>
                                        @else
                                            <option value="{{$t->id}}">{{$t->title}}</option>
                                        @endif
                                       
                                        @endforeach 
                                    </select>
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
                                        @foreach ($sessionSpeaker as $sp)
                                            <script>
                                                var val = <?php echo json_encode($sp->speaker_id); ?>;
                                                $(`#sp-${val}`).attr('checked', 'checked');
                                            </script>
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
                                            <input type="checkbox"  id="ch-{{$c->id}}" name="chair[]" value="{{$c->id}}"/> &nbsp; {{$c->firstname}} &nbsp; {{$c->lastname}}</label>
                                        @endforeach
                                        @foreach ($sessionChair as $sc)
                                            <script>
                                                var val = <?php echo json_encode($sc->chair_id); ?>;
                                                $(`#ch-${val}`).attr('checked', 'checked');
                                            </script>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                           
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-group custom-theme">
                                        {{--{!! Form::label('description', "Session description", array('class'=>'control-label required')) !!}
                                        {!!  Form::textarea('description', $event->description,
                                                    array(
                                                    'class'=>'form-control  editable',
                                                    'rows' => 5
                                                    ))  !!}}}
                                                    --}}
                                         <textarea  class="form-control  editable" name="description" rows="5" >{{$event->description}}</textarea> 
                                    </div>
                                </div>
                            </div>        
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <span class="uploadProgress"></span>
                {!! Form::button(trans("basic.cancel"), ['class'=>"btn modal-close btn-danger",'data-dismiss'=>'modal']) !!}
                {!! Form::submit("update event", ['class'=>"btn btn-success"]) !!}
            </div>
        </div>
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
        $date = $res.slice(0, 10);
                                    
        
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

