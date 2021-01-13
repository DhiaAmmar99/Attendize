<div role="dialog"  class="modal fade" style="display: none;">
    <?php echo $__env->make('ManageOrganiser.Partials.EventCreateAndEditJS', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
    <?php echo Form::open(array('url' => route('updateEvent'), 'class' => 'ajax gf')); ?>

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">
                    <i class="ico-calendar"></i>
                    Update Event</h3> 
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <input  type="hidden" name="id" value="<?php echo e($event->id); ?>">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <?php echo Form::label('title', "Session title", array('class'=>'control-label required')); ?>

                                    <?php echo Form::text('title', $event->title ,array('class'=>'form-control','placeholder'=>"Enter your title session " )); ?>

                                    
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <?php echo Form::label("","program", array('class'=>'required control-label')); ?>

                                    <select class="form-control" name="program" id="program">
                                        <option  disabled>Select program</option>
                                         <?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($p->id == $event->id_program): ?>
                                                <option selected data="<?php echo e($p->date); ?>" value="<?php echo e($p->id); ?>"><?php echo e($p->day); ?></option>
                                            <?php else: ?>
                                                <option data="<?php echo e($p->date); ?>" value="<?php echo e($p->id); ?>"><?php echo e($p->day); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div> 


                            <input type="hidden" name="start_date" id="start_date" value="2021-01-07 00:00">
                            <input type="hidden" name="end_date" id="end_date"  value="2021-01-07 00:00">
                        

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <?php echo Form::label('Session time', "Session time",['class'=>'required control-label']); ?>


                                    <select class="form-control" id="time">
                                        <option  disabled>Select time</option>
                                        <?php if($event->start_date->format('H') == '09'): ?>
                                            <option selected value="1">09:00 - 11:00</option>
                                        <?php else: ?> 
                                            <option  value="1">09:00 - 11:00</option>
                                        <?php endif; ?>
                                        <?php if($event->start_date->format('H') == '13'): ?>
                                            <option selected value="2">13:00 - 15:00</option>
                                        <?php else: ?> 
                                            <option value="2">13:00 - 15:00</option>
                                        <?php endif; ?>
                                        <?php if($event->start_date->format('H') == '16'): ?>
                                            <option selected value="3">16:00 - 18:00</option>
                                        <?php else: ?> 
                                            <option value="3">16:00 - 18:00</option>
                                        <?php endif; ?>
                                        
                                        
                                    </select>

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <?php echo Form::label("","language", array('class'=>'required control-label')); ?>

                                    
                                    <select class="form-control" name="language" id="selectLang">
                                        <option  disabled>Select language</option>
                                        <?php if($event->language == 'RU'): ?>
                                            <option selected value="RU">RU</option>
                                        <?php else: ?>
                                            <option value="RU">RU</option>
                                        <?php endif; ?>
                                        <?php if($event->language == 'EN'): ?>
                                            <option selected value="EN">EN</option>
                                        <?php else: ?>
                                            <option value="EN">EN</option>
                                        <?php endif; ?>
                                        <?php if($event->language == 'FR'): ?>
                                            <option selected value="FR">FR</option>
                                        <?php else: ?>
                                            <option value="FR">FR</option>
                                        <?php endif; ?>
                                        <?php if($event->language == 'AR'): ?>
                                            <option selected value="AR">AR</option>
                                        <?php else: ?>
                                            <option value="AR">AR</option>
                                        <?php endif; ?>
                                        <?php if($event->language == 'ES'): ?>
                                            <option selected value="ES">ES</option>
                                        <?php else: ?>
                                            <option value="ES">ES</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                        
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nb_session" class="required control-label">NUMBER OF SESSION</label>
                                    <input type="number" class="form-control" name="nb_session" value="<?php echo e($event->nb_session); ?>" min="1" max="20" id="nb_session" placeholder="Enter your nomber of session"/>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="room" class="required control-label">NUMBER OF room</label>
                                    <input  type="number" class="form-control" name="room" value="<?php echo e($event->room); ?>" id="room" min="1" max="20"  placeholder="Enter your nomber of room"//>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <?php echo Form::label("","stream", array('class'=>'required control-label')); ?>

                                    <select class="form-control" name="stream">
                                        <option  disabled>Select stream</option>
                                         <?php $__currentLoopData = $streams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($s->id == $event->id_stream): ?>
                                                <option selected value="<?php echo e($s->id); ?>"><?php echo e($s->title); ?></option>
                                            <?php else: ?>
                                                <option  value="<?php echo e($s->id); ?>"><?php echo e($s->title); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <?php echo Form::label("","TypeOfSession", array('class'=>'required control-label')); ?>

                                    <select class="form-control" name="TypeOfSession">
                                        <option  disabled>Select type of session</option>
                                         <?php $__currentLoopData = $tos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                         <?php if($t->id == $event->id_TOS): ?>
                                            <option selected value="<?php echo e($t->id); ?>"><?php echo e($t->title); ?></option>
                                        <?php else: ?>
                                            <option value="<?php echo e($t->id); ?>"><?php echo e($t->title); ?></option>
                                        <?php endif; ?>
                                       
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group" onclick="showCheckboxes('checkboxesSP')">
                                    <?php echo Form::label("","speakers", array('class'=>'required control-label')); ?>

                                    <select class="form-control"  style="pointer-events: none;">
                                        <option selected disabled>Select speakers</option>
                                    </select>
                                    <div id="checkboxesSP" class="checkboxes">
                                         <?php $__currentLoopData = $speakers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <label for="sp-<?php echo e($sp->id); ?>" class="speaker">
                                                <input type="checkbox" id="sp-<?php echo e($sp->id); ?>" name="speaker[]"  value="<?php echo e($sp->id); ?>"/> &nbsp; <?php echo e($sp->firstname); ?> &nbsp; <?php echo e($sp->lastname); ?></label>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php $__currentLoopData = $sessionSpeaker; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <script>
                                                var val = <?php echo json_encode($sp->speaker_id); ?>;
                                                $(`#sp-${val}`).attr('checked', 'checked');
                                            </script>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group" onclick="showCheckboxes('checkboxesCH')">
                                    <?php echo Form::label("","chairs", array('class'=>'control-label')); ?>

                                    <select class="form-control"  style="pointer-events: none;">
                                        <option selected disabled>Select chairs</option>
                                    </select>
                                    <div id="checkboxesCH" class="checkboxes">
                                        <?php $__currentLoopData = $chairs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <label for="ch-<?php echo e($c->id); ?>" class="speaker">
                                            <input type="checkbox"  id="ch-<?php echo e($c->id); ?>" name="chair[]" value="<?php echo e($c->id); ?>"/> &nbsp; <?php echo e($c->firstname); ?> &nbsp; <?php echo e($c->lastname); ?></label>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php $__currentLoopData = $sessionChair; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <script>
                                                var val = <?php echo json_encode($sc->chair_id); ?>;
                                                $(`#ch-${val}`).attr('checked', 'checked');
                                            </script>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-group custom-theme">
                                        <?php echo Form::label('description', "Session description", array('class'=>'control-label required')); ?>

                                        <?php echo Form::textarea('description', $event->description,
                                                    array(
                                                    'class'=>'form-control  editable',
                                                    'rows' => 5
                                                    )); ?>

                                        
                                    </div>
                                </div>
                            </div>        
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <span class="uploadProgress"></span>
                <?php echo Form::button(trans("basic.cancel"), ['class'=>"btn modal-close btn-danger",'data-dismiss'=>'modal']); ?>

                <?php echo Form::submit("update event", ['class'=>"btn btn-success"]); ?>

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

<?php /**PATH C:\wamp64\www\laravel\ica-backoffice\resources\views/ManageOrganiser/Modals/updateEvent.blade.php ENDPATH**/ ?>