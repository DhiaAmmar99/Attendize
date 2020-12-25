<div role="dialog"  class="modal fade" style="display: none;">

    <?php echo $__env->make('ManageOrganiser.Partials.EventCreateAndEditJS', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;

    <?php echo Form::open(array('url' => route('createProgram'), 'class' => 'ajax gf')); ?>

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">
                    <i class="ico-code"></i>
                    Create Program</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        

                        



                        <div class="form-group">
                            <?php echo Form::label('DAY', "DAY", array('class'=>'control-label required')); ?>

                            <?php echo Form::text('DAY', old('title'),array('class'=>'form-control','placeholder'=>trans("Event.event_title_placeholder", ["name"=>Auth::user()->first_name]) )); ?>

                        </div>

                        <div class="form-group custom-theme">
                            <?php echo Form::label('description', "Program description", array('class'=>'control-label required')); ?>

                            <?php echo Form::textarea('description', old('description'),
                                        array(
                                        'class'=>'form-control  editable',
                                        'rows' => 5
                                        )); ?>

                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <?php echo Form::label('start_date', "Program start date", array('class'=>'required control-label')); ?>

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
                                    <?php echo Form::label('end_date', "Program end date",
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


                        
                        
                        

                        
                            <?php echo Form::hidden('organiser_id', $organiser_id); ?>

                        
                             
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <span class="uploadProgress"></span>
                <?php echo Form::button(trans("basic.cancel"), ['class'=>"btn modal-close btn-danger",'data-dismiss'=>'modal']); ?>

                
                <?php echo Form::submit("create program", ['class'=>"btn btn-success"]); ?>

                
                

            </div>
        </div>
        
    </div>
</div>
<?php /**PATH C:\wamp64\www\laravel\ica-backoffice\resources\views/ManageOrganiser/Modals/CreateProgram.blade.php ENDPATH**/ ?>