<div class="panel panel-success event">
    <div class="panel-heading" data-style="background-color: <?php echo e($event->bg_color); ?>;background-image: url(<?php echo e($event->bg_image_url); ?>); background-size: cover;">
        <div class="event-date">
            <div class="month">
                <?php echo e(strtoupper(explode("|", trans("basic.months_short"))[$event->start_date->format('n')])); ?>

            </div>
            <div class="day">
                <?php echo e($event->start_date->format('d')); ?>

            </div>
        </div>
        <ul class="event-meta">
            <li class="event-title">
                <h4 title="<?php echo e($event->title); ?>" href="<?php echo e(route('showEventDashboard', ['event_id'=>$event->id])); ?>">
                    <?php echo e(Str::limit($event->title, $limit = 75, $end = '...')); ?>

                </h4>
            </li>
            
        </ul>

    </div>

    <div class="panel-body">
        <ul class="nav nav-section nav-justified mt5 mb5">
            <li>
                <div class="section">
                    <h4 class="nm">
                        <?php echo e($event->nb_session); ?>

                    </h4>
                    <p class="nm text-muted">Number of session</p>
                </div>
            </li>
           
            <li>
                <div class="section">
                    <h4 class="nm"><?php echo e($event->language); ?></h4>
                    <p class="nm text-muted">Language</p>
                </div>
            </li>
        </ul>
    </div>
    <div class="panel-footer">
        <ul class="nav nav-section nav-justified">
            <li>
                <a   data-modal-id="updateEvent" data-href="<?php echo e(route('updateEvent', ['organiser_id' => @$organiser->id, 'event_id' => $event->id])); ?>" class="loadModal" ><i class="ico-edit"></i> <?php echo app('translator')->get("basic.edit"); ?></a>

            </li>
            <li>
                <a data-modal-id="removeSession"  class="rmv"  id="<?php echo e($event->id); ?>" onclick="popup(<?php echo e($event->id); ?>)"><i class="ico-remove"></i> Remove</a>
            </li>
        </ul>
    </div>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    function popup(id){
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                jQuery.ajax({
                    type: "post",
                    url: window.location.origin+"/removeSession",
                    data: {"id": id},
                });
                // jQuery(`#${id}`).remove();
                

                swal("Poof! Your imaginary file has been deleted!", {
                icon: "success",
                buttons: false,
                });
                setTimeout(function(){ location.reload(); }, 1000);
            } 
            });
    }
</script>
<?php /**PATH /usr/src/app/resources/views/ManageOrganiser/Partials/EventPanel.blade.php ENDPATH**/ ?>