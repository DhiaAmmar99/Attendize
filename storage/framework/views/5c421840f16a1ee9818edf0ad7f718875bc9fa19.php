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
                            <?php echo Form::label(' PROGRAM title', "PROGRAM title", array('class'=>'control-label required')); ?>

                            <?php echo Form::text('day', old('title'),array('class'=>'form-control','placeholder'=>'Enter your title program' )); ?>

                        </div>

                        
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <?php echo Form::label('date', "Program date", array('class'=>'required control-label')); ?>

                                    <?php echo Form::text('date', old('date'),
                                                        [
                                                    'class'=>'form-control start hasDatepicker ',
                                                    'data-field'=>'datetime',
                                                ]); ?>

                                </div>
                            </div>
                        </div>
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
<?php /**PATH C:\wamp64\www\laravel\ica-backoffice\resources\views/ManageOrganiser/Modals/CreateProgram.blade.php ENDPATH**/ ?>