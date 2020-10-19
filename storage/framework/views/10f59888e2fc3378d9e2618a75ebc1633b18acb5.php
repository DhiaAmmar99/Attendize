<aside class="sidebar sidebar-left sidebar-menu">
    <section class="content">
        <h5 class="heading"><?php echo app('translator')->get("basic.main_menu"); ?></h5>
        <ul id="nav_main" class="topmenu">
            <li>
                <a href="<?php echo e(route('showOrganiserDashboard', ['organiser_id' => $event->organiser->id])); ?>">
                    <span class="figure"><i class="ico-arrow-left"></i></span>
                    <span class="text"><?php echo app('translator')->get("back"); ?></span>
                </a>
            </li>
        </ul>
        <h5 class="heading"><?php echo app('translator')->get('basic.event_menu'); ?></h5>
        <ul id="nav_event" class="topmenu">
            
            <li class="<?php echo e(Request::is('*promote*') ? 'active' : ''); ?> hide">
                <a href="<?php echo e(route('showEventPromote', array('event_id' => $event->id))); ?>">
                    <span class="figure"><i class="ico-bullhorn"></i></span>
                    <span class="text"><?php echo app('translator')->get("basic.promote"); ?></span>
                </a>
            </li>
            <li class="<?php echo e(Request::is('*customize*') ? 'active' : ''); ?>">
                <a href="<?php echo e(route('showEventCustomize', array('event_id' => $event->id))); ?>">
                    <span class="figure"><i class="ico-cog"></i></span>
                    <span class="text"><?php echo app('translator')->get("basic.customize"); ?></span>
                </a>
            </li>
        </ul>
        
        </ul>
    </section>
</aside>
<?php /**PATH C:\wamp64\www\Attendize\resources\views/ManageEvent/Partials/Sidebar.blade.php ENDPATH**/ ?>