<?php $__env->startSection('title'); ?>
Speakers
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_title'); ?>
   <p> Speakers</p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('top_nav'); ?>
    <?php echo $__env->make('ManageOrganiser.Partials.TopNav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('head'); ?>
    <?php echo Html::script('https://maps.googleapis.com/maps/api/js?libraries=places&key='.config("attendize.google_maps_geocoding_key")); ?>

    <?php echo Html::script('vendor/geocomplete/jquery.geocomplete.min.js'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('menu'); ?>
    <?php echo $__env->make('ManageOrganiser.Partials.Sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_header'); ?>
    <div class="col-md-9">
        <div class="btn-toolbar">
            <div class="btn-group btn-group-responsive">
                <a href="#" data-modal-id="CreateSpeaker" data-href="<?php echo e(route('showCreateSpeaker', ['organiser_id' => @$organiser->id])); ?>" class="btn btn-success loadModal"><i class="ico-plus"></i> create speaker</a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <?php if($speakers->count()): ?>
            <?php $__currentLoopData = $speakers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $speaker): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <?php echo $__env->make('ManageOrganiser.Partials.SpeakerPanel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Shared.Layouts.Master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravel\ica-backoffice\resources\views/ManageOrganiser/Speakers.blade.php ENDPATH**/ ?>