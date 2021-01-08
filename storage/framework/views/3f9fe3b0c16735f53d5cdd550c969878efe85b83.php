<?php echo $__env->make('ManageOrganiser.Partials.EventCreateAndEditJS', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo Form::model($event, array('url' => route('postEditEvent', ['event_id' => $event->id]), 'class' => 'ajax gf')); ?>


<div class="row">
    <div class="col-md-12">
        <div class="form-group" id="group-check">
            
            


        
        <div class="form-group">
            <?php echo Form::label('title', trans("Event.event_title"), array('class'=>'control-label required')); ?>

            <?php echo Form::text('title', old('title'),
                                        array(
                                        'class'=>'form-control',
                                        'placeholder'=>trans("Event.event_title_placeholder", ["name"=>Auth::user()->first_name])
                                        )); ?>

        </div>

        <div class="form-group">
           <?php echo Form::label('description', trans("Event.event_description"), array('class'=>'control-label')); ?>

            <?php echo Form::textarea('description', old('description'),
                                        array(
                                        'class'=>'form-control editable',
                                        'rows' => 5
                                        )); ?>

        </div>

        

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <?php echo Form::label('start_date', trans("Event.event_start_date"), array('class'=>'required control-label')); ?>

                    <?php echo Form::text('start_date', $event->getFormattedDate('start_date'),
                                                [
                                                    'class'=>'form-control start hasDatepicker ',
                                                    'data-field'=>'datetime',
                                                    'data-startend'=>'start',
                                                    'data-startendelem'=>'.end',
                                                    'readonly'=>''
                                                ]); ?>

                </div>
            </div>

            <div class="col-sm-6 ">
                <div class="form-group">
                    <?php echo Form::label('end_date', trans("Event.event_end_date"),
                                        [
                                    'class'=>'required control-label '
                                ]); ?>

                    <?php echo Form::text('end_date', $event->getFormattedDate('end_date'),
                                        [
                                            'class'=>'form-control end hasDatepicker ',
                                            'data-field'=>'datetime',
                                            'data-startend'=>'end',
                                            'data-startendelem'=>'.start',
                                            'readonly'=>''
                                        ]); ?>

                </div>
            </div>
        </div>
        

        
    </div>

    <div class="col-md-12">
        <div class="panel-footer mt15 text-right">
           <?php echo Form::hidden('organiser_id', $event->organiser_id); ?>

           <?php echo Form::submit(trans("Event.save_changes"), ['class'=>"btn btn-success"]); ?>

        </div>
    </div>
    <?php echo Form::close(); ?>

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

<?php /**PATH C:\wamp64\www\laravel\ica-backoffice\resources\views/ManageEvent/Partials/EditEventForm.blade.php ENDPATH**/ ?>