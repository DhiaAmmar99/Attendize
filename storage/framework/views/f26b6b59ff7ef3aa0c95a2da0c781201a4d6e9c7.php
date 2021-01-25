<div role="dialog"  class="modal fade" style="display: none;">
    <?php echo $__env->make('ManageOrganiser.Partials.EventCreateAndEditJS', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
    <?php echo Form::open(array('url' => route('createChair'), 'class' => 'ajax gf')); ?>

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">
                    <i class="ico-code"></i>
                    Create Chair</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <input  type="hidden" name="organiser_id" value="<?php echo e($organiser_id); ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo Form::label('first name', "first name", array('class'=>'control-label required')); ?>

                                    <?php echo Form::text('firstname', old('title'),array('class'=>'form-control','placeholder'=>'Enter your first name' )); ?>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo Form::label('last name', "last name", array('class'=>'control-label required')); ?>

                                    <?php echo Form::text('lastname', old('title'),array('class'=>'form-control','placeholder'=>'Enter your last name' )); ?>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo Form::label('email', "email", array('class'=>'control-label required')); ?>

                                    <?php echo Form::email('email', old('title'),array('class'=>'form-control','placeholder'=>'Enter your email' )); ?>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo Form::label('organization', "organization", array('class'=>'control-label required')); ?>

                                    <?php echo Form::text('organization', old('title'),array('class'=>'form-control','placeholder'=>'Enter your organization' )); ?>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo Form::label('country', "country", array('class'=>'control-label required')); ?>

                                    <?php echo Form::text('country', old('title'),array('class'=>'form-control','placeholder'=>'Enter your country' )); ?>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo Form::label('image', "image", array('class'=>'control-label required')); ?>

                                    <?php echo Form::file('image', old('title'),array('class'=>'form-control','placeholder'=>'Upload your image' )); ?>

                                </div>
                            </div>

                            
                        
                           
                        </div>
                        <div class="form-group custom-theme">
                            <?php echo Form::label('description', "description", array('class'=>'control-label required')); ?>

                            <textarea  class="form-control  w-100" name="description" rows="5" required></textarea> 

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <span class="uploadProgress"></span>
                <?php echo Form::button(trans("basic.cancel"), ['class'=>"btn modal-close btn-danger",'data-dismiss'=>'modal']); ?>

                
                <?php echo Form::submit("create Chair", ['class'=>"btn btn-success"]); ?>               

            </div>
        </div>
    </div>
</div>
<style>
    .hour a{
        pointer-events: none !important;
        cursor: default !important;
    }
    .hour input{
        pointer-events: none !important;
    }

    .minutes a{
        pointer-events: none !important;
        cursor: default !important;
    }
    .minutes input{
        pointer-events: none !important;
    }

</style>
<?php /**PATH C:\wamp64\www\laravel\ica-backoffice\resources\views/ManageOrganiser/Modals/CreateChair.blade.php ENDPATH**/ ?>