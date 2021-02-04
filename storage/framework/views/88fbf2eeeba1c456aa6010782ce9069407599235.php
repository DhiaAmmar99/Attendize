<div role="dialog"  class="modal fade" style="display: none;">
    <?php echo $__env->make('ManageOrganiser.Partials.EventCreateAndEditJS', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
    <?php echo Form::open(array('url' => route('updateAbstract'), 'class' => 'ajax gf')); ?>

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">
                    <i class="ico-code"></i>
                    Update Abstract</h3> 
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <input  type="hidden" name="organiser_id" value="<?php echo e($organiser_id); ?>">
                        <input  type="hidden" name="id" value="<?php echo e($abstract->id); ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo Form::label('title', "title", array('class'=>'control-label required')); ?>

                                    <?php echo Form::text('title', $abstract->title,array('class'=>'form-control','placeholder'=>'Enter title of your stream' )); ?>

                                </div>
                            </div>
                           
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <?php echo Form::label("","speakers", array('class'=>'required control-label')); ?>

                                    <select class="form-control" name="speaker_id" id="speakers" required>
                                        <option value="" selected disabled>Select speaker</option>
                                        <?php $__currentLoopData = $speakers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($sp->id == $speaker->id): ?>
                                            <option selected value="<?php echo e($sp->id); ?>"><?php echo e($sp->firstname); ?> &nbsp; <?php echo e($sp->lastname); ?></option>
                                        <?php else: ?>
                                            <option  value="<?php echo e($sp->id); ?>"><?php echo e($sp->firstname); ?> &nbsp; <?php echo e($sp->lastname); ?></option>
                                        <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group" onclick="showCheckboxes('checkboxesCH')">
                                    <?php echo Form::label("","chairs", array('class'=>'control-label')); ?>

                                    <select class="form-control"  style="pointer-events: none;" id="CHselect">
                                        <option selected disabled  value="">Select chairs</option>
                                    </select>
                                    <div id="checkboxesCH" class="checkboxes" style="display: block;">
                                        <?php $__currentLoopData = $chairs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <label for="ch-<?php echo e($c->id); ?>" class="speaker">
                                            <input type="checkbox"  id="ch-<?php echo e($c->id); ?>" name="chair[]" value="<?php echo e($c->id); ?>"/> &nbsp; <?php echo e($c->firstname); ?> &nbsp; <?php echo e($c->lastname); ?></label>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php $__currentLoopData = $abstractChair; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <script>
                                                var val = <?php echo json_encode($sc->chair_id); ?>;
                                                $(`#ch-${val}`).attr('checked', 'checked');
                                            </script>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo Form::label('description', "description", array('class'=>'control-label required')); ?>


                        <textarea  class="form-control  w-100" name="description" rows="5" ><?php echo e($abstract->description); ?></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <span class="uploadProgress"></span>
                <?php echo Form::button(trans("basic.cancel"), ['class'=>"btn modal-close btn-danger",'data-dismiss'=>'modal']); ?>

                <?php echo Form::submit("update Stream", ['class'=>"btn btn-success success"]); ?>

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
 
</script><?php /**PATH C:\wamp64\www\laravel\ica-backoffice\resources\views/ManageOrganiser/Modals/UpdateAbstract.blade.php ENDPATH**/ ?>