<div class="panel panel-success event">
    <div class="panel-heading" data-style="background-color: red; background-size: cover;">
        
        <ul class="event-meta">
            <li class="event-title">
                <h4>
                
                    <?php echo e(Str::limit($program->title, $limit = 75, $end = '...')); ?>

                </h4>
            </li>
            
        </ul>

    </div>

    <div class="panel-body">
        <ul class="nav nav-section nav-justified mt5 mb5">
            <li>
                <div class="section">
                    <h4 class="nm">
                        <?php echo e($program->start_date); ?> 
                    </h4>
                    <p class="nm text-muted">Start date</p>
                </div>
            </li>
           
             <li>
                <div class="section">
                    <h4 class="nm">
                        <?php echo e($program->end_date); ?> 
                    </h4>
                    <p class="nm text-muted">End date</p>
                </div>
            </li> 
        </ul>
    </div>
    <div class="panel-footer">
        <ul class="nav nav-section nav-justified">
            <li>
                <a href="">
                    <i class="ico-edit"></i> <?php echo app('translator')->get("basic.edit"); ?>
                </a>
            </li>

             
        </ul>
    </div>
</div>
<?php /**PATH C:\wamp64\www\laravel\ica-backoffice\resources\views/ManageOrganiser/Partials/ProgramPanel.blade.php ENDPATH**/ ?>