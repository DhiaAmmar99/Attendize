

<?php $__env->startSection('title'); ?>
    ##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
    <?php echo app('translator')->get("Organiser.organiser_events"); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_title'); ?>
   <p> Sessions</p>
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
                <a href="#" data-modal-id="CreateEvent" data-href="<?php echo e(route('showCreateEvent', ['organiser_id' => @$organiser->id])); ?>" class="btn btn-success loadModal"><i class="ico-plus"></i> create Session</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <?php echo Form::open(array('url' => route('showOrganiserEvents', ['organiser_id'=>$organiser->id]), 'method' => 'get')); ?>

        <div class="input-group">
            <input name="q" value="<?php echo e($search['q'] or ''); ?>" placeholder="Search Session" type="text" class="form-control">
        <span class="input-group-btn">
            <button class="btn btn-default" type="submit"><i class="ico-search"></i></button>
        </span>
        </div>
        <input type="hidden" name='sort_by' value="<?php echo e($search['sort_by']); ?>"/>
        <?php echo Form::close(); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    

    <div class="row">
        <?php if($events->count()): ?>
            <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <?php echo $__env->make('ManageOrganiser.Partials.EventPanel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <?php if($search['q']): ?>
                <?php echo $__env->make('Shared.Partials.NoSearchResults', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php else: ?>
                <?php echo $__env->make('ManageOrganiser.Partials.EventsBlankSlate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php echo $events->appends(['q' =>$search['q'], 'past' => $search['showPast']])->render(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Shared.Layouts.Master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/myapp/ica-backoffice/resources/views/ManageOrganiser/Events.blade.php ENDPATH**/ ?>