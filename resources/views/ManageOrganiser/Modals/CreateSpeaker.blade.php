<div role="dialog"  class="modal fade" style="display: none;">
    @include('ManageOrganiser.Partials.EventCreateAndEditJS');
    {!! Form::open(array('url' => route('createSpeaker'), 'class' => 'ajax gf')) !!}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">
                    <i class="ico-code"></i>
                    Create Speaker</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <input  type="hidden" name="organiser_id" value="{{ $organiser_id }}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('first name', "first name", array('class'=>'control-label required')) !!}
                                    {!!  Form::text('firstname', old('title'),array('class'=>'form-control','placeholder'=>'Enter your first name' ))  !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('last name', "last name", array('class'=>'control-label required')) !!}
                                    {!!  Form::text('lastname', old('title'),array('class'=>'form-control','placeholder'=>'Enter your last name' ))  !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('email', "email", array('class'=>'control-label required')) !!}
                                    {!!  Form::email('email', old('title'),array('class'=>'form-control','placeholder'=>'Enter your email' ))  !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('organization', "organization", array('class'=>'control-label required')) !!}
                                    {!!  Form::text('organization', old('title'),array('class'=>'form-control','placeholder'=>'Enter your organization' ))  !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('country', "country", array('class'=>'control-label required')) !!}
                                    {!!  Form::text('country', old('title'),array('class'=>'form-control','placeholder'=>'Enter your country' ))  !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('image', "image", array('class'=>'control-label required')) !!}
                                    {{-- {!!  Form::file('image', old('title'),array('class'=>'form-control','placeholder'=>'Upload your image' ))  !!} --}}
                                    <input type="file" value="image" name="image" class="form-control" id="picture">
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
                
                {!! Form::submit("create Speaker", ['class'=>"btn btn-success"]) !!}               

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
