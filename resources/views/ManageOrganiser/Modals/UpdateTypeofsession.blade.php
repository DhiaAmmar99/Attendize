<div role="dialog"  class="modal fade" style="display: none;">
    @include('ManageOrganiser.Partials.EventCreateAndEditJS');
    {!! Form::open(array('url' => route('updateTos'), 'class' => 'ajax gf')) !!}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">
                    <i class="ico-code"></i>
                    Update Type of session</h3> 
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <input  type="hidden" name="organiser_id" value="{{ $organiser_id }}">
                        <input  type="hidden" name="id" value="{{ $tos->id }}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('title', "title", array('class'=>'control-label required')) !!}
                                    {!!  Form::text('title', $tos->title,array('class'=>'form-control','placeholder'=>'Enter title of your Typeofsession' ))  !!}
                                </div>
                            </div>
                            
                           
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('icon', "icon", array('class'=>'control-label required')) !!}
                                    {!!  Form::file('icon', old('title'),array('class'=>'form-control','placeholder'=>'Upload your icon' ))  !!}
                                </div>
                            </div> 
                        </div>
                        {!! Form::label('description', "description", array('class'=>'control-label required')) !!}

                        <textarea  class="form-control  w-100" name="description" rows="5" >{{$tos->description}}</textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <span class="uploadProgress"></span>
                {!! Form::button(trans("basic.cancel"), ['class'=>"btn modal-close btn-danger",'data-dismiss'=>'modal']) !!}
                {!! Form::submit("update tos", ['class'=>"btn btn-success success"]) !!}
            </div>
        </div>
    </div>
</div>