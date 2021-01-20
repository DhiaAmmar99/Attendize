<div role="dialog"  class="modal fade" style="display: none;">
    <?php echo $__env->make('ManageOrganiser.Partials.EventCreateAndEditJS', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
    <?php echo Form::open(array('url' => route('updateSponsor'), 'class' => 'ajax gf')); ?>

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">
                    <i class="ico-code"></i>
                    Update Sponsor</h3> 
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <input  type="hidden" name="organiser_id" value="<?php echo e($organiser_id); ?>">
                        <input  type="hidden" name="id" value="<?php echo e($sponsor->id); ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo Form::label('title', "title", array('class'=>'control-label required')); ?>

                                    <?php echo Form::text('title', $sponsor->title,array('class'=>'form-control','placeholder'=>'Enter title of your stream' )); ?>

                                </div>
                            </div>
                           
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo Form::label('image', "image", array('class'=>'control-label required')); ?>

                                    <?php echo Form::file('image', old('image'),array('class'=>'form-control','placeholder'=>'Upload your image' )); ?>

                                </div>
                            </div> 
                        </div>
                        <?php echo Form::label('description', "description", array('class'=>'control-label required')); ?>


                        <textarea  class="form-control  editable" name="description" rows="5" ><?php echo e($sponsor->description); ?></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <span class="uploadProgress"></span>
                <?php echo Form::button(trans("basic.cancel"), ['class'=>"btn modal-close btn-danger",'data-dismiss'=>'modal']); ?>

                <?php echo Form::submit("update Stream", ['class'=>"btn btn-success"]); ?>

            </div>
        </div>
    </div>
</div>


<?php /**PATH C:\wamp64\www\laravel\ica-backoffice\resources\views/ManageOrganiser/Modals/UpdateSponsor.blade.php ENDPATH**/ ?>