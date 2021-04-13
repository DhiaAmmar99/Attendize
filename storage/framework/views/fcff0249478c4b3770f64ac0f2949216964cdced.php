<div class="panel panel-success event">
    <div class="panel-heading" data-style="background-color: red; background-size: cover;">
        
        <ul class="event-meta">
            <li class="event-title">
                <h4>
                
                    <?php echo e(Str::limit($program->day, $limit = 75, $end = '...')); ?>

                </h4>
            </li>
            
        </ul>

    </div>

    <div class="panel-body">
        <ul class="nav nav-section nav-justified mt5 mb5">
            <li>
                <div class="section">
                    <h4 class="nm">
                        <?php echo e($program->date); ?> 
                    </h4>
                    <p class="nm text-muted">Date of program</p>
                </div>
            </li>
           
             
        </ul>
    </div>
    <div class="panel-footer">
        <ul class="nav nav-section nav-justified">
            <li>
                <a href="" data-modal-id="updateProgram" data-href="<?php echo e(route('showUpdateProgram', ['organiser_id' => @$organiser->id, 'prog_id' => $program->id  ])); ?>" class="loadModal" id="<?php echo e($program->id); ?>"><i class="ico-edit"></i> <?php echo app('translator')->get("basic.edit"); ?></a>
            </li>
            <li>
                
                <a  data-modal-id="removeProgram"  id="<?php echo e($program->id); ?>" onclick="popupRMV(<?php echo e($program->id); ?>)"><i class="ico-remove"></i> Remove</a>
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
                    url: window.location.origin+"/removeProgram",
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
<?php /**PATH /usr/src/app/resources/views/ManageOrganiser/Partials/ProgramPanel.blade.php ENDPATH**/ ?>