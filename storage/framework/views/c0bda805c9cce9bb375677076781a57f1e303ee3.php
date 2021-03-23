<div class="panel panel-success event">
    <div class="panel-heading" data-style="background-color: red; background-size: cover;">
        <div class="event-date">
            
            
            <img src="<?php echo e($chair->image); ?> " alt="" class="img">
        </div>
        <ul class="event-meta">
            <li class="event-title">
                <h4>
                
                    <?php echo e(Str::limit($chair->firstname." ".$chair->lastname , $limit = 75, $end = '...')); ?>

                </h4>
            </li>
            
        </ul>

    </div>

    <div class="panel-body">
        <ul class="nav nav-section nav-justified mt5 mb5">
            <li>
                <div class="section">
                    <h4 class="nm">
                        <?php echo e($chair->email); ?> 
                    </h4>
                    <p class="nm text-muted">Email</p>
                </div>
            </li>
            <li>
                <div class="section">
                    <h4 class="nm">
                        <?php echo e($chair->organization); ?> 
                    </h4>
                    <p class="nm text-muted">Organization</p>
                </div>
            </li>
           
             
        </ul>
    </div>
    <div class="panel-footer">
        <ul class="nav nav-section nav-justified">
            <li>
                <a href="" data-modal-id="update" data-href="<?php echo e(route('showUpdateChair', ['organiser_id' => @$organiser->id, 'chair_id' => $chair->id  ])); ?>" class="loadModal" id="<?php echo e($chair->id); ?>"><i class="ico-edit"></i> <?php echo app('translator')->get("basic.edit"); ?></a>
            </li>
            <li>
                <a  data-modal-id="removeProgram"  id="<?php echo e($chair->id); ?>" onclick="popupRMV(<?php echo e($chair->id); ?>)"><i class="ico-remove"></i> Remove</a>
            </li>

             
        </ul>
    </div>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    function popupRMV(id){
       
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
                    type: "get",
                    url: window.location.origin+"/removeChair",
                    data: {"id": id},
                });

                swal("Poof! Your imaginary file has been deleted!", {
                icon: "success",
                buttons: false,
                });
                setTimeout(function(){ location.reload(); }, 1000);

            } 
            });
    }
</script>
<style>
    .img{
        width: 80%;
    }
</style>
<?php /**PATH /var/www/html/myapp/ica-backoffice/resources/views/ManageOrganiser/Partials/ChairPanel.blade.php ENDPATH**/ ?>