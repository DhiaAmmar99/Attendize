<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get("User.sign_up"); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-7 col-md-offset-2">
            <?php echo Form::open(array('url' => route("showSignup"), 'class' => 'panel')); ?>

            <div class="panel-body">
                <div class="logo">
                   <?php echo Html::image('assets/images/Dark-Logo.png'); ?>

                </div>
                <h2><?php echo app('translator')->get("User.sign_up"); ?></h2>

                <?php if(Request::input('first_run')): ?>
                    <div class="alert alert-info">
                        <?php echo app('translator')->get("User.sign_up_first_run"); ?>
                    </div>
                <?php endif; ?>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group <?php echo e(($errors->has('first_name')) ? 'has-error' : ''); ?>">
                            <?php echo Form::label('first_name', trans("User.first_name"), ['class' => 'control-label required']); ?>

                            <?php echo Form::text('first_name', null, ['class' => 'form-control']); ?>

                            <?php if($errors->has('first_name')): ?>
                                <p class="help-block"><?php echo e($errors->first('first_name')); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group <?php echo e(($errors->has('last_name')) ? 'has-error' : ''); ?>">
                            <?php echo Form::label('last_name', trans("User.last_name"), ['class' => 'control-label']); ?>

                            <?php echo Form::text('last_name', null, ['class' => 'form-control']); ?>

                            <?php if($errors->has('last_name')): ?>
                                <p class="help-block"><?php echo e($errors->first('last_name')); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="form-group <?php echo e(($errors->has('email')) ? 'has-error' : ''); ?>">
                    <?php echo Form::label('email', trans("User.email"), ['class' => 'control-label required']); ?>

                    <?php echo Form::text('email', null, ['class' => 'form-control']); ?>

                    <?php if($errors->has('email')): ?>
                        <p class="help-block"><?php echo e($errors->first('email')); ?></p>
                    <?php endif; ?>
                </div>
                <div class="form-group <?php echo e(($errors->has('password')) ? 'has-error' : ''); ?>">
                    <?php echo Form::label('password', trans("User.password"), ['class' => 'control-label required']); ?>

                    <?php echo Form::password('password',  ['class' => 'form-control']); ?>

                    <?php if($errors->has('password')): ?>
                        <p class="help-block"><?php echo e($errors->first('password')); ?></p>
                    <?php endif; ?>
                </div>
                <div class="form-group <?php echo e(($errors->has('password_confirmation')) ? 'has-error' : ''); ?>">
                    <?php echo Form::label('password_confirmation', 'Password again', ['class' => 'control-label required']); ?>

                    <?php echo Form::password('password_confirmation',  ['class' => 'form-control']); ?>

                    <?php if($errors->has('password_confirmation')): ?>
                        <p class="help-block"><?php echo e($errors->first('password_confirmation')); ?></p>
                    <?php endif; ?>
                </div>

                <?php if(Utils::isAttendize()): ?>
                <div class="form-group <?php echo e(($errors->has('terms_agreed')) ? 'has-error' : ''); ?>">
                    <div class="checkbox custom-checkbox">
                        <?php echo Form::checkbox('terms_agreed', old('terms_agreed'), false, ['id' => 'terms_agreed']); ?>

                        <?php echo Form::rawLabel('terms_agreed', trans("User.terms_and_conditions", ["url"=>route('termsAndConditions')])); ?>

                        <?php if($errors->has('terms_agreed')): ?>
                            <p class="help-block"><?php echo e($errors->first('terms_agreed')); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endif; ?>

                <div class="form-group ">
                   <?php echo Form::submit(trans("User.sign_up"), array('class'=>"btn btn-block btn-success")); ?>

                </div>
                    <div class="signup">
                        <span><?php echo @trans("User.already_have_account", ["url"=>route("login")]); ?></span>
                    </div>
            </div>
            <?php echo Form::close(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Shared.Layouts.MasterWithoutMenus', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Attendize\resources\views/Public/LoginAndRegister/Signup.blade.php ENDPATH**/ ?>