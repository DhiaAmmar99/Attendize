<div role="dialog"  class="modal fade" style="display: none;">
    @include('ManageOrganiser.Partials.EventCreateAndEditJS');
    {!! Form::open(array('url' => route('createStream'), 'class' => 'ajax gf')) !!}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">
                    <i class="ico-code"></i>
                    Create Stream</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <input  type="hidden" name="organiser_id" value="{{ $organiser_id }}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('title', "title", array('class'=>'control-label required')) !!}
                                    {!!  Form::text('title', old('title'),array('class'=>'form-control','placeholder'=>'Enter title of your stream' , 'required' ))  !!}
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('color', "color", array('class'=>'control-label required')) !!}
                                    {!!  Form::color('couleur', old('title'),array('class'=>'form-control','placeholder'=>'Enter color of your stream' , 'required' ))  !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('icon', "icon (svg)", array('class'=>'control-label required')) !!}
                                    {{-- {!!  Form::file('icon', old('title'),array('class'=>'form-control','placeholder'=>'Upload your icon' ))  !!} --}}
                                    <input type="file" value="icon" name="icon" class="form-control" id="icon" required accept=".svg">
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
                
                {!! Form::submit("create Stream", ['class'=>"btn btn-success"]) !!}               

            </div>
        </div>
    </div>
</div>
<style>
    .hour a{
        pointer-events: none !important;
        cursor: default !important;
    }
    .hour input{
        pointer-events: none !important;
    }

    .minutes a{
        pointer-events: none !important;
        cursor: default !important;
    }
    .minutes input{
        pointer-events: none !important;
    }

</style>
