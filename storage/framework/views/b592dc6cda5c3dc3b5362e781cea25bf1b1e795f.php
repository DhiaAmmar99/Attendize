<div role="dialog"  class="modal fade" style="display: none;">
    <?php echo $__env->make('ManageOrganiser.Partials.EventCreateAndEditJS', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
    <?php echo Form::open(array('url' => route('updateStream'), 'class' => 'ajax gf')); ?>

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">
                    <i class="ico-code"></i>
                    Update Stream</h3> 
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <input  type="hidden" name="organiser_id" value="<?php echo e($organiser_id); ?>">
                        <input  type="hidden" name="id" value="<?php echo e($stream->id); ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo Form::label('title', "title", array('class'=>'control-label required')); ?>

                                    <?php echo Form::text('title', $stream->title,array('class'=>'form-control','placeholder'=>'Enter title of your stream', 'required')); ?>

                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo Form::label('color', "color", array('class'=>'control-label required')); ?>

                                    <?php echo Form::color('couleur', $stream->couleur,array('class'=>'form-control','placeholder'=>'Enter color of your stream', 'required' )); ?>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo Form::label('icon', "icon (svg)", array('class'=>'control-label required')); ?>

                                    <input type="file" value="icon" name="icon" class="form-control" id="icon" accept=".svg">
                                </div>
                            </div> 
                        </div>
                        <?php echo Form::label('description', "description", array('class'=>'control-label required')); ?>


                        <textarea  class="form-control  w-100"  required name="description" rows="5" ><?php echo e($stream->description); ?></textarea>
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

<?php /**PATH C:\wamp64\www\laravel\ica-backoffice\resources\views/ManageOrganiser/Modals/UpdateStream.blade.php ENDPATH**/ ?>