<aside class="sidebar sidebar-left sidebar-menu">
    <section class="content">
        <h5 class="heading">ORGANISER MENU</h5>

        <ul id="nav" class="topmenu">
            <li class="<?php echo e(Request::is('*dashboard*') ? 'active' : ''); ?>">
                <a href="<?php echo e(route('showOrganiserDashboard', array('organiser_id' => $organiser->id))); ?>">
                    <span class="figure"><i class="ico-home2"></i></span>
                    <span class="text">DASHBOARD</span>
                </a>
            </li>
            <li class="<?php echo e(Request::is('*events*') ? 'active' : ''); ?>">
                <a href="<?php echo e(route('showOrganiserEvents', array('organiser_id' => $organiser->id))); ?>">
                    <span class="figure"><i class="ico-calendar"></i></span>
                    <!-- <span class="text"><?php echo app('translator')->get("Organiser.event"); ?></span> -->
                    <span class="text">EVENT</span>
                </a>
            </li>

            

            <li class="<?php echo e(Request::is('*users*') ? 'active' : ''); ?>">
                <a href="<?php echo e(route('list', array('organiser_id' => $organiser->id))); ?>">
                    <span class="figure"><i class="ico-table"></i></span>
                    <span class="text">users registrations</span>
                </a>
            </li>
            
        </ul>
    </section>
</aside>
<?php /**PATH C:\wamp64\www\laravel\backoffice\resources\views/ManageOrganiser/Partials/Sidebar.blade.php ENDPATH**/ ?>