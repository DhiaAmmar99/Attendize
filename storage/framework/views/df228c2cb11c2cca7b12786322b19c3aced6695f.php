<div role="dialog"  class="modal fade" style="display: none;">

    <?php echo $__env->make('ManageOrganiser.Partials.EventCreateAndEditJS', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;

    <?php echo Form::open(array('url' => route('newEvent'), 'class' => 'ajax gf')); ?>

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">
                    <i class="ico-calendar"></i>
                    create Session</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group" id="group-check">
                        <?php echo Form::label('title', 'Session type', array('class'=>'control-label required event_type')); ?><br/>
                            <input type="checkbox" name="program" id="program" value="P">
                            <label for="program" class="checkEvent">Professional program </label>
                            <input type="checkbox" name="Social_events" id="Social_events" value="S">
                            <label for="Social_events" class="checkEvent">Social events  </label>
                            <input type="checkbox" name="Gala_dinner" id="Gala_dinner" value="G">
                            <label for="Gala_dinner" class="checkEvent">Gala dinner</label>
                            <input type="checkbox" name="workshops" id="workshops" value="W">
                            <label for="workshops" class="checkEvent">Workshops</label>  
                            <div id="event_error" style="color: #ED5466;"></div>  
                        </div>

                        



                        <div class="form-group">
                            <?php echo Form::label('title', "Session title", array('class'=>'control-label required')); ?>

                            <?php echo Form::text('title', old('title'),array('class'=>'form-control','placeholder'=>trans("Event.event_title_placeholder", ["name"=>Auth::user()->first_name]) )); ?>

                        </div>

                        <div class="form-group custom-theme">
                            <?php echo Form::label('description', "Session description", array('class'=>'control-label required')); ?>

                            <?php echo Form::textarea('description', old('description'),
                                        array(
                                        'class'=>'form-control  editable',
                                        'rows' => 5
                                        )); ?>

                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <?php echo Form::label('start_date', "Session start date", array('class'=>'required control-label')); ?>

                                    <?php echo Form::text('start_date', old('start_date'),
                                                        [
                                                    'class'=>'form-control start hasDatepicker ',
                                                    'data-field'=>'datetime',
                                                    'data-startend'=>'start',
                                                    'data-startendelem'=>'.end',
                                                    'readonly'=>''

                                                ]); ?>

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <?php echo Form::label('end_date', "Session end date",
                                                [
                                            'class'=>'required control-label '
                                        ]); ?>


                                    <?php echo Form::text('end_date', old('end_date'),
                                                [
                                            'class'=>'form-control end hasDatepicker ',
                                            'data-field'=>'datetime',
                                            'data-startend'=>'end',
                                            'data-startendelem'=>'.start',
                                            'readonly'=> ''
                                        ]); ?>

                                </div>
                            </div>
                        </div>
                        <div>
                            
                        </div>
                        

                        
                        
                        

                        
                            <?php echo Form::hidden('organiser_id', $organiser_id); ?>

                        
                             
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <span class="uploadProgress"></span>
                <?php echo Form::button(trans("basic.cancel"), ['class'=>"btn modal-close btn-danger",'data-dismiss'=>'modal']); ?>

                <?php echo Form::submit(trans("Event.create_event"), ['class'=>"btn btn-success"]); ?>

            </div>
        </div>
        <?php echo Form::close(); ?>

    </div>
</div>
<?php /**PATH C:\wamp64\www\laravel\ica-backoffice\resources\views/ManageOrganiser/Modals/CreateEvent.blade.php ENDPATH**/ ?>