<?php echo $__env->make('ManageOrganiser.Partials.EventCreateAndEditJS', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo Form::model($event, array('url' => route('postEditEvent', ['event_id' => $event->id]), 'class' => 'ajax gf')); ?>


<div class="row">
    <div class="col-md-12">
        <div class="form-group" id="group-check">
            
            <?php echo Form::label('title', 'event type', array('class'=>'control-label required event_type')); ?><br/>
         
            
                <?php if($event->program_event == 1): ?>
                <input type="checkbox" name="program" id="program" value="P" checked />
                <?php else: ?>
                <input type="checkbox" name="program" id="program" value="P" >
                <?php endif; ?>
                <label for="program" class="checkEvent">Professional program </label>

                <?php if($event->social_event == 1): ?>
                <input type="checkbox" name="Social_events" id="Social_events" value="S" checked />
                <?php else: ?>
                <input type="checkbox" name="Social_events" id="Social_events" value="S">
                <?php endif; ?>
                <label for="Social_events" class="checkEvent">Social events  </label>

                <?php if($event->gala_event == 1): ?>
                <input type="checkbox" name="Gala_dinner" id="Gala_dinner" value="G" checked />
                <?php else: ?>
                <input type="checkbox" name="Gala_dinner" id="Gala_dinner" value="G">
                <?php endif; ?>
                <label for="Gala_dinner" class="checkEvent">Gala dinner</label>

                <?php if($event->workshops_event == 1): ?>
                <input type="checkbox" name="workshops" id="workshops" value="W" checked />
                <?php else: ?>
                <input type="checkbox" name="workshops" id="workshops" value="W">
                <?php endif; ?>
                <label for="workshops" class="checkEvent">Workshops</label>  
                
                <div id="event_error" style="color: #ED5466;"></div>  
        </div>


        
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
        <div>
            <label for="fisrtName" class="required  control-label">Fisrt name</label>
            <input type="text" id="firstName" name="firstName" value="<?php echo e($speaker[0]->firstName); ?>" class="form-control" />

            <label for="lastName" class="required control-label">Last name</label>
            <input type="text" id="lastName" name="lastName" value="<?php echo e($speaker[0]->lastName); ?>" class="form-control"/>

            <label for="email" class="required control-label">Email</label>
            <input type="email" id="email" name="email" value="<?php echo e($speaker[0]->email); ?>" class="form-control"/>

            <label for="phone" class="required control-label">Phone</label>
            <input type="tel" pattern="[0-9]{8}" id="phone" name="phone" value="<?php echo e($speaker[0]->phone); ?>" class="form-control"/>

            <label for="desc" class="required control-label">Discription</label>
            
            <!-- <?php echo Form::textarea('desc', old('desc'),
                        array(
                        'class'=>'form-control  editable',
                        'rows' => 5
                        )); ?> -->

            <textarea class="form-control  editable" id="desc" name="desc"><?php echo e($speaker[0]->description); ?></textarea>
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

<?php /**PATH C:\wamp64\www\laravel\backoffice\resources\views/ManageEvent/Partials/EditEventForm.blade.php ENDPATH**/ ?>