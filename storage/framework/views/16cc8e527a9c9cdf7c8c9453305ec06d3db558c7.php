<?php $__env->startSection('title'); ?>
    ##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
    <?php echo app('translator')->get("Organiser.dashboard"); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('top_nav'); ?>
    <?php echo $__env->make('ManageOrganiser.Partials.TopNav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_title'); ?>
   <p>Dashboard</p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('menu'); ?>
    <?php echo $__env->make('ManageOrganiser.Partials.Sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('head'); ?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css" integrity="sha256-szHusaozbQctTn4FX+3l5E0A5zoxz7+ne4fr8NgWJlw=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.4/raphael-min.js" integrity="sha256-Gk+dzc4kV2rqAZMkyy3gcfW6Xd66BhGYjVWa/FjPu+s=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js" integrity="sha256-0rg2VtfJo3VUij/UY9X0HJP7NET6tgAY98aMOfwP0P8=" crossorigin="anonymous"></script>

    <?php echo Html::script('https://maps.googleapis.com/maps/api/js?libraries=places&key='.config("attendize.google_maps_geocoding_key")); ?>

    <?php echo Html::script('vendor/geocomplete/jquery.geocomplete.min.js'); ?>

    <?php echo Html::script('vendor/moment/moment.js'); ?>

    <?php echo Html::script('vendor/fullcalendar/dist/fullcalendar.min.js'); ?>

    <?php
    if(Lang::locale()!="en")
        echo Html::script('vendor/fullcalendar/dist/lang/'.Lang::locale().'.js');
    ?>
    <?php echo Html::style('vendor/fullcalendar/dist/fullcalendar.css'); ?>


    <script>
        $(function() {
            $('#calendar').fullCalendar({
                locale: '<?php echo e(Lang::locale()); ?>',
                events: <?php echo $calendar_events; ?>,
                header: {
                    left:   'prev,',
                    center: 'title',
                    right:  'next'
                },
                dayClick: function(date, jsEvent, view) {

                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-6">
            <div class="stat-box">
                <h3>
                    <?php echo e($organiser->events->count()); ?>

                </h3>
            <span>
                <?php echo app('translator')->get("Organiser.events"); ?>
            </span>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="stat-box">
                <h3>
                    

                    <?php $guest = 0; $guestDEL = 0; ?>
                    <?php $__currentLoopData = $dataGuest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   
                        <?php if($d->guests =='yes'): ?>
                        <?php $guest += 1; ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $delegateGuest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($d->guests =='yes'): ?>
                            <?php $guestDEL += 1; ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php $attendees = count($delegateGuest) + count($dataGuest) + $guest + $guestDEL ?>
                    <?php echo e($attendees); ?>


                </h3>  
            <span>
                <?php echo app('translator')->get("Attendees"); ?>
            </span>
            </div>
        </div>
    </div> 

    <div class="row">

        <div class="col-md-8">

            <h4 style="margin-bottom: 25px;margin-top: 20px;"><?php echo app('translator')->get("Organiser.event_calendar"); ?></h4>
            <div id="calendar"></div>


            
        </div>
        
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Shared.Layouts.Master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravel\ica-backoffice\resources\views/ManageOrganiser/Dashboard.blade.php ENDPATH**/ ?>