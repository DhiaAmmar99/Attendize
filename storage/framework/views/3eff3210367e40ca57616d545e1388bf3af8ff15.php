<div class="panel panel-success event">
    <div class="panel-heading" data-style="background-color: red; background-size: cover;">
        <div class="event-date">

            
            <img src="<?php echo e($sponsor->image); ?> " alt="" class="img">
        </div>
        <ul class="event-meta">
            <li class="event-title">
                <h4>
                    <?php echo e(Str::limit($sponsor->title , $limit = 75, $end = '...')); ?>

                </h4>
            </li>

        </ul>

    </div>

    
    <div class="panel-footer">
        <ul class="nav nav-section nav-justified">
            <li>
                <a href="" data-modal-id="update" data-href="<?php echo e(route('showUpdateSponsor', ['organiser_id' => @$organiser->id, 'id_sponsor' => $sponsor->id  ])); ?>" class="loadModal" id="<?php echo e($sponsor->id); ?>"><i class="ico-edit"></i> <?php echo app('translator')->get("basic.edit"); ?></a>
            </li>
            <li>
                <a  data-modal-id="removeSponsor"  id="<?php echo e($sponsor->id); ?>" onclick="popupRMV(<?php echo e($sponsor->id); ?>)"><i class="ico-remove"></i> Remove</a>
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
                    url: window.location.origin+"/removeSponsor",
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
    .event .event-meta {

        margin-left: 100px !important;
    
    }
    .event .event-date {

        width: 80px !important;
        
    }
</style>
<?php /**PATH /usr/src/app/resources/views/ManageOrganiser/Partials/SponsorPanel.blade.php ENDPATH**/ ?>