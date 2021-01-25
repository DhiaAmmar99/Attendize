<div role="dialog"  class="modal fade" style="display: none;">

    <?php echo $__env->make('ManageOrganiser.Partials.EventCreateAndEditJS', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;

    <?php echo Form::open(array('url' => route('newEvent'), 'class' => 'ajax gf')); ?>

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">
                    <i class="ico-calendar"></i>
                    Create Session</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <?php echo Form::label('title', "Session title", array('class'=>'control-label required')); ?>

                                    
                                    <input type="text" name="title" required class="form-control" placeholder="Enter your title session">
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <?php echo Form::label("","program", array('class'=>'required control-label')); ?>

                                    <select class="form-control" name="program" id="program" required>
                                        <option value="" selected disabled>Select program</option>
                                        <?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            
                                            <option data="<?php echo e($p->date); ?>" value="<?php echo e($p->id); ?>"><?php echo e($p->day); ?> : <?php echo e(Str::limit($p->date, $limit = 10, $end = '')); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>


                            <input type="hidden" name="start_date" id="start_date" value="2021-01-07 00:00">
                            <input type="hidden" name="end_date" id="end_date"  value="2021-01-07 00:00">
                        
                        
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <?php echo Form::label('Session time', "Session time",['class'=>'required control-label']); ?>


                                    <select class="form-control" id="time" required disabled>
                                        <option value="" selected disabled>Select time</option>
                                        <option value="1">09:00 - 11:00</option>
                                        <option value="2">13:00 - 15:00</option>
                                        <option value="3">16:00 - 18:00</option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <?php echo Form::label("","language", array('class'=>'required control-label')); ?>

                                    
                                    <select class="form-control" name="language" required>
                                        <option value="" selected disabled>Select language</option>
                                        <option value="RU">RU</option>
                                        <option value="EN">EN</option>
                                        <option value="FR">FR</option>
                                        <option value="AR">AR</option>
                                        <option value="ES">ES</option>
                                    </select>
                                </div>
                            </div>
                        
                           
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <?php echo Form::label("","stream", array('class'=>'required control-label')); ?>

                                    <select class="form-control" name="stream" required>
                                        <option value="" selected disabled>Select stream</option>
                                        <?php $__currentLoopData = $streams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option  value="<?php echo e($s->id); ?>"><?php echo e($s->title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <?php echo Form::label("","TypeOfSession", array('class'=>'required control-label')); ?>

                                    <select class="form-control" name="TypeOfSession" required>
                                        <option value="" selected disabled>Select type of session</option>
                                        <?php $__currentLoopData = $tos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($t->id); ?>"><?php echo e($t->title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            
                            
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="nb_session" class="required control-label">NUMBER OF SESSION</label>
                                    <input type="number" required class="form-control" name="nb_session" min="1" max="20" id="nb_session" placeholder="Enter your nomber of session"/>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="room" class="required control-label">NUMBER OF room</label>
                                    <input  type="number" required class="form-control" name="room" id="room" min="1" max="20"  placeholder="Enter your nomber of room"/>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="nb_places" class="required control-label">NUMBER OF participate</label>
                                    <input  type="number" required class="form-control" name="nb_places" id="nb_places" min="1" max="20"  placeholder="Enter your nomber of room"/>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group" onclick="showCheckboxes('checkboxesSP')">
                                    <?php echo Form::label("","speakers", array('class'=>'required control-label')); ?>

                                    <select class="form-control" required style="pointer-events: none;" id="SPselect">
                                        <option selected disabled value="">Select speakers</option>
                                    </select>
                                    <div id="checkboxesSP" class="checkboxes">
                                        <?php $__currentLoopData = $speakers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <label for="sp-<?php echo e($sp->id); ?>" class="speaker">
                                                <input type="checkbox" id="sp-<?php echo e($sp->id); ?>" name="speaker[]"  value="<?php echo e($sp->id); ?>"/> &nbsp; <?php echo e($sp->firstname); ?> &nbsp; <?php echo e($sp->lastname); ?></label>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group" onclick="showCheckboxes('checkboxesCH')">
                                    <?php echo Form::label("","chairs", array('class'=>'control-label')); ?>

                                    <select class="form-control" required style="pointer-events: none;" id="CHselect">
                                        <option selected disabled value="">Select chairs</option>
                                    </select>
                                    <div id="checkboxesCH" class="checkboxes">
                                        <?php $__currentLoopData = $chairs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <label for="ch-<?php echo e($c->id); ?>" class="speaker">
                                                <input type="checkbox" id="ch-<?php echo e($c->id); ?>" name="chair[]" value="<?php echo e($c->id); ?>"/> &nbsp; <?php echo e($c->firstname); ?> &nbsp; <?php echo e($c->lastname); ?></label>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                       
                       
                        
                       


                        <div class="form-group custom-theme">
                            <?php echo Form::label('description', "Session description", array('class'=>'control-label required')); ?>

                            <textarea  class="form-control  w-100" name="description" rows="5" required></textarea> 

                           
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
        $SD = jQuery("#start_date").val();
        $ED = jQuery("#end_date").val();
        $date = $res.slice(0, 10);
        $("#time").removeAttr('disabled');
        $("#start_date").val($date+$SD.slice(10, 16));
        $("#end_date").val($date+$ED.slice(10, 16));
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

    $("input:checkbox[name='speaker[]']").change(function(){
        if($("input:checkbox[name='speaker[]']:checked").length > 0)
            $("#SPselect").removeAttr("required");
        else
        $("#SPselect").attr("required", "required");
    });
    $("input:checkbox[name='chair[]']").change(function(){
        if($("input:checkbox[name='chair[]']:checked").length > 0)
            $("#CHselect").removeAttr("required");
        else
        $("#CHselect").attr("required", "required");
    });
</script>
<?php /**PATH C:\wamp64\www\laravel\ica-backoffice\resources\views/ManageOrganiser/Modals/CreateEvent.blade.php ENDPATH**/ ?>