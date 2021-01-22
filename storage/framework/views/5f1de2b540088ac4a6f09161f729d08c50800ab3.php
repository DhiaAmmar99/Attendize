<div role="dialog"  class="modal fade" style="display: none;">
    <?php echo $__env->make('ManageOrganiser.Partials.EventCreateAndEditJS', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
    <?php echo Form::open(array('url' => route('create'), 'class' => 'ajax gf')); ?>

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">
                    <i class="ico-code"></i>
                    Create Stream</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <input  type="hidden" name="organiser_id" value="<?php echo e($organiser_id); ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo Form::label('title', "title", array('class'=>'control-label required')); ?>

                                    <?php echo Form::text('title', old('title'),array('class'=>'form-control','placeholder'=>'Enter title of your stream' )); ?>

                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo Form::label('color', "color", array('class'=>'control-label required')); ?>

                                    <?php echo Form::text('couleur', old('title'),array('class'=>'form-control','placeholder'=>'Enter color of your stream' )); ?>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo Form::label('icon', "icon", array('class'=>'control-label required')); ?>

                                    <?php echo Form::file('icon', old('title'),array('class'=>'form-control','placeholder'=>'Upload your icon' )); ?>

                                </div>
                            </div> 
                        </div>
                        <div class="form-group custom-theme">
                            <?php echo Form::label('description', "description", array('class'=>'control-label required')); ?>

                            <?php echo Form::textarea('description', old('description'),
                                        array(
                                        'class'=>'form-control  editable',
                                        'rows' => 5
                                        )); ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <span class="uploadProgress"></span>
                <?php echo Form::button(trans("basic.cancel"), ['class'=>"btn modal-close btn-danger",'data-dismiss'=>'modal']); ?>

                
                <?php echo Form::submit("create Stream", ['class'=>"btn btn-success"]); ?>               

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
<?php /**PATH C:\wamp64\www\laravel\ica-backoffice\resources\views/ManageOrganiser/Modals/CreateStream.blade.php ENDPATH**/ ?>