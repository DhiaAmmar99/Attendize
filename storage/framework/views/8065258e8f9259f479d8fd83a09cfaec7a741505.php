<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get("Installer.title"); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('head'); ?>
    <style>
        .modal-header {
            background-color: transparent !important;
            color: #666 !important;
            text-shadow: none !important;;
        }
        .alert-success {
            background-color: #dff0d8 !important;
            border-color: #d6e9c6  !important;
            color: #3c763d  !important;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-7 col-md-offset-2">
            <div class="panel">
                <div class="panel-body">
                    <div class="logo">
                        <?php echo Html::image('assets/images/Dark-Logo.png'); ?>

                    </div>

                    <h1><?php echo app('translator')->get("Installer.setup"); ?></h1>
                    <?php if(count($errors) > 0): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <?php endif; ?>

                    <h3><?php echo app('translator')->get("Installer.php_version_check"); ?></h3>
                    <?php if(version_compare(phpversion(), '7.1.3', '<')): ?>
                        <div class="alert alert-warning">
                            <?php echo @trans("Installer.php_too_low", ["requires"=>"7.1.3", "has"=>phpversion()]); ?>

                        </div>
                    <?php else: ?>
                        <div class="alert alert-success">
                            <?php echo @trans("Installer.php_enough", ["requires"=>"7.1.3", "has"=>phpversion()]); ?>

                        </div>
                    <?php endif; ?>

                    <h3><?php echo app('translator')->get("Installer.files_n_folders_check"); ?></h3>
                    <?php $__currentLoopData = $paths; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $path): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php if(!File::isWritable($path)): ?>
                            <div class="alert alert-danger">
                            <?php echo @trans("Installer.path_not_writable", ["path"=>$path]); ?>

                            </div>
                        <?php else: ?>
                            <div class="alert alert-success">
                            <?php echo @trans("Installer.path_writable", ["path"=> $path]); ?>

                            </div>
                        <?php endif; ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <h3><?php echo app('translator')->get("Installer.php_requirements_check"); ?></h3>
                    <?php $__currentLoopData = $requirements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $requirement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php if(!extension_loaded($requirement)): ?>
                            <div class="alert alert-danger">
                                <?php echo @trans("Installer.requirement_not_met", ["requirement"=>$requirement]); ?>

                            </div>
                        <?php else: ?>
                            <div class="alert alert-success">
                                <?php echo @trans("Installer.requirement_met", ["requirement"=>$requirement]); ?>

                            </div>
                        <?php endif; ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <h3><?php echo app('translator')->get("Installer.php_optional_requirements_check"); ?></h3>

                    <?php $__currentLoopData = $optional_requirements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optional_requirement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php if(!extension_loaded($optional_requirement)): ?>
                            <div class="alert alert-warning">
                                <?php echo @trans("Installer.optional_requirement_not_met", ["requirement"=>$optional_requirement]); ?>

                            </div>
                        <?php else: ?>
                            <div class="alert alert-success">
                                <?php echo @trans("Installer.requirement_met", ["requirement"=>$optional_requirement]); ?>

                            </div>
                        <?php endif; ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php echo Form::open(array('url' => route('postInstaller'), 'class' => 'installer_form')); ?>


                    <h3><?php echo app('translator')->get("Installer.app_settings"); ?></h3>

                    <div class="form-group">
                        <?php echo Form::label('app_url', trans("Installer.application_url"), array('class'=>'required control-label ')); ?>

                        <?php echo Form::text('app_url', old('app_url'),
                                    array(
                                    'class'=>'form-control',
                                    'placeholder' => 'http://www.myticketsite.com'
                                    )); ?>

                    </div>

                    <h3><?php echo app('translator')->get("Installer.database_settings"); ?></h3>
                    <p><?php echo app('translator')->get("Installer.database_message"); ?></p>

                    <div class="form-group">
                        <?php echo Form::label('database_type', trans("Installer.database_type"), array('class'=>'required control-label ')); ?>

                        <?php echo Form::select('database_type', array(
                                  'mysql' => "MySQL",
                                  'pgsql' => "Postgres",
                                    ), old('database_type'),
                                    array(
                                    'class'=>'form-control'
                                    )); ?>

                    </div>

                    <div class="form-group">
                        <?php echo Form::label('database_host', trans("Installer.database_host"), array('class'=>'control-label required')); ?>

                        <?php echo Form::text('database_host', $value = env("DB_HOST") ,
                                    array(
                                    'class'=>'form-control ',
                                    'placeholder'=>''
                                    )); ?>



                    </div>
                    <div class="form-group">
                        <?php echo Form::label('database_name', trans("Installer.database_name"), array('class'=>'required control-label required')); ?>

                        <?php echo Form::text('database_name', $value = env("DB_DATABASE") ,
                                    array(
                                    'class'=>'form-control'
                                    )); ?>

                    </div>

                    <div class="form-group">
                        <?php echo Form::label('database_username', trans("Installer.database_username"), array('class'=>'control-label required')); ?>

                        <?php echo Form::text('database_username', $value = env("DB_USERNAME"),
                                    array(
                                    'class'=>'form-control ',
                                    'placeholder'=>'',
                                    )); ?>

                    </div>
                    <div class="form-group">
                        <?php echo Form::label('database_password', trans("Installer.database_password"), array('class'=>'control-label required')); ?>

                        <?php echo Form::text('database_password', $value = env("DB_PASSWORD"),
                                    array(
                                    'class'=>'form-control ',
                                    'placeholder'=>'',
                                    )); ?>

                    </div>

                    <div class="form-group">
                        <script>
                            $(function () {
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-Token': "<?php echo e(csrf_token()); ?>"
                                    }
                                });

                                $('.test_db').on('click', function (e) {

                                    var url = $(this).attr('href');

                                    $.post(url, $(".installer_form").serialize(), function (data) {
                                        if (data.status === 'success') {
                                            alert('<?php echo app('translator')->get("Installer.database_test_connect_success"); ?>');
                                        } else {
                                            alert('<?php echo app('translator')->get("Installer.database_test_connect_failure"); ?>');
                                        }
                                    }, 'json').fail(function (data) {
                                        var returned = $.parseJSON(data.responseText);
                                        console.log(returned.error);
                                        alert('<?php echo app('translator')->get("Installer.database_test_connect_failure_message"); ?>\n\n' + '<?php echo app('translator')->get("Installer.database_test_connect_failure_error_type"); ?>: ' + returned.error.type + '\n' + '<?php echo app('translator')->get("Installer.database_test_connect_failure_error_message"); ?>: ' + returned.error.message);
                                    });

                                    e.preventDefault();
                                });
                            });
                        </script>

                        <a href="<?php echo e(route('postInstaller',['test' => 'db'])); ?>" class="test_db btn-block btn btn-success" style="color: white; font-weight: 300;">
                            <?php echo app('translator')->get("Installer.test_database_connection"); ?>
                        </a>
                    </div>

                    <h3><?php echo app('translator')->get("Installer.email_settings"); ?></h3>

                    <div class="form-group">
                        <?php echo Form::label('mail_from_address', trans("Installer.mail_from_address"), array('class'=>' control-label required')); ?>

                        <?php echo Form::text('mail_from_address', $value = env("MAIL_FROM_ADDRESS") ,
                                    array(
                                    'class'=>'form-control'
                                    )); ?>

                    </div>
                    <div class="form-group">
                        <?php echo Form::label('mail_from_name', trans("Installer.mail_from_name"), array('class'=>' control-label required')); ?>

                        <?php echo Form::text('mail_from_name', $value = env("MAIL_FROM_NAME") ,
                                    array(
                                    'class'=>'form-control'
                                    )); ?>

                    </div>
                    <div class="form-group">
                        <?php echo Form::label('mail_driver', trans("Installer.mail_from_address"), array('class'=>' control-label required')); ?>

                        <?php echo Form::text('mail_driver', $value = env("MAIL_DRIVER"),
                                    array(
                                    'class'=>'form-control ',
                                    'placeholder' => 'mail'
                                    )); ?>

                        <div class="help-block">
                           <?php echo @trans("Installer.mail_from_help"); ?>

                        </div>
                    </div>

                    <div class="form-group">
                        <?php echo Form::label('mail_port', trans("Installer.mail_port"), array('class'=>' control-label ')); ?>

                        <?php echo Form::text('mail_port', $value = env("MAIL_PORT"),
                                    array(
                                    'class'=>'form-control'
                                    )); ?>

                    </div>
                    <div class="form-group">
                        <?php echo Form::label('mail_encryption', trans("Installer.mail_encryption"), array('class'=>' control-label ')); ?>

                        <?php echo Form::text('mail_encryption', old('mail_encryption'),
                                    array(
                                    'class'=>'form-control',
                                    'placeholder' => "tls/ssl"
                                    )); ?>

                    </div>
                    <div class="form-group">
                        <?php echo Form::label('mail_host', trans("Installer.mail_host"), array('class'=>' control-label ')); ?>

                        <?php echo Form::text('mail_host', $value = env("MAIL_HOST"),
                                    array(
                                    'class'=>'form-control'
                                    )); ?>

                    </div>
                    <div class="form-group">
                        <?php echo Form::label('mail_username', trans("Installer.mail_username"), array('class'=>' control-label ')); ?>

                        <?php echo Form::text('mail_username', old('mail_username'),
                                    array(
                                    'class'=>'form-control'
                                    )); ?>

                    </div>
                    <div class="form-group">
                        <?php echo Form::label('mail_password', trans("Installer.mail_password"), array('class'=>' control-label ')); ?>

                        <?php echo Form::text('mail_password', old('mail_password'),
                                    array(
                                    'class'=>'form-control'
                                    )); ?>

                    </div>
                    <?php echo csrf_field(); ?>

                    <?php echo $__env->make("Installer.Partials.Footer", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php echo Form::submit(trans("Installer.install"), ['class'=>" btn-block btn btn-success"]); ?>

                    <?php echo Form::close(); ?>


                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Shared.Layouts.MasterWithoutMenus', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravel\ica-backoffice\resources\views/Installer/Installer.blade.php ENDPATH**/ ?>