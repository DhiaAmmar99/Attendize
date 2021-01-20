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
            <li class="<?php echo e(Request::is('*streams*') ? 'active' : ''); ?>">
                <a href="<?php echo e(route('streams', array('organiser_id' => $organiser->id))); ?>">
                    <span class="figure"><i class="ico-calendar"></i></span>
                    <span class="text">Streams</span>
                </a>
            </li>
            <li class="<?php echo e(Request::is('*typeofsessions*') ? 'active' : ''); ?>">
                <a href="<?php echo e(route('typeofsessions', array('organiser_id' => $organiser->id))); ?>">
                    <span class="figure"><i class="ico-calendar"></i></span>
                    <span class="text">type of sessions</span>
                </a>
            </li>
            <li class="<?php echo e(Request::is('*Session*') ? 'active' : ''); ?>">
                <a href="<?php echo e(route('showOrganiserEvents', array('organiser_id' => $organiser->id))); ?>">
                    <span class="figure"><i class="ico-calendar"></i></span>
                    <span class="text">Sessions</span>
                </a>
            </li>

            

            <li class="<?php echo e(Request::is('*program*') ? 'active' : ''); ?>">
                <a href="<?php echo e(route('programs', array('organiser_id' => $organiser->id))); ?>">
                    <span class="figure"><i class="ico-code"></i></span>
                    <span class="text">Programs</span>
                </a>
            </li>
            <li class="<?php echo e(Request::is('*speaker*') ? 'active' : ''); ?>">
                <a href="<?php echo e(route('speakers', array('organiser_id' => $organiser->id))); ?>">
                    <span class="figure"><i class="ico-cog"></i></span>
                    <span class="text">speakers</span>
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
<?php /**PATH C:\wamp64\www\laravel\ica-backoffice\resources\views/ManageOrganiser/Partials/Sidebar.blade.php ENDPATH**/ ?>