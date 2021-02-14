<div role="dialog"  class="modal fade" style="display: none;">
    @include('ManageOrganiser.Partials.EventCreateAndEditJS');
    {!! Form::open(array('url' => route('createAbstract'), 'class' => 'ajax gf')) !!}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">
                    <i class="ico-code"></i>
                    Create Abstract</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <input  type="hidden" name="organiser_id" value="{{ $organiser_id }}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('title', "title", array('class'=>'control-label required')) !!}
                                    {{-- {!!  Form::text('title', old('title'),array('class'=>'form-control','placeholder'=>'Enter title of your abstract' ))  !!} --}}
                                    <input type="text" class='form-control' id="title" name="title" placeholder='Enter title of your abstract' required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label("","speakers", array('class'=>'required control-label')) !!}
                                    <select class="form-control" name="id_speaker" id="speakers" required>
                                        <option value="" selected disabled>Select speaker</option>
                                        @foreach ($speakers as $sp)
                                            <option  value="{{$sp->id}}">{{$sp->firstname}} &nbsp; {{$sp->lastname}}</option>
                                        @endforeach
                                    </select>
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
                            {!! Form::label('description', "description", array('class'=>'control-label required')) !!}
                            <textarea  class="form-control  w-100" name="description" rows="5" required></textarea> 

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <span class="uploadProgress"></span>
                {!! Form::button(trans("basic.cancel"), ['class'=>"btn modal-close btn-danger",'data-dismiss'=>'modal']) !!}
                
                {!! Form::submit("create Abstract", ['class'=>"btn btn-success"]) !!}               

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

    $("input:checkbox[name='chair[]']").change(function(){
        if($("input:checkbox[name='chair[]']:checked").length > 0)
            $("#CHselect").removeAttr("required");
        else
        $("#CHselect").attr("required", "required");
    });
 
</script>