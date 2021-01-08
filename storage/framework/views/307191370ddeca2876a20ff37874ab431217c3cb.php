<?php echo Html::style(asset('assets/stylesheet/ticket.css')); ?>

<style>
    .ticket {
        border: 1px solid <?php echo e($event->ticket_border_color); ?>;
        background: <?php echo e($event->ticket_bg_color); ?> ;
        color: <?php echo e($event->ticket_sub_text_color); ?>;
        border-left-color: <?php echo e($event->ticket_border_color); ?> ;
    }
    .ticket h4 {color: <?php echo e($event->ticket_text_color); ?>;}
    .ticket .logo {
        border-left: 1px solid <?php echo e($event->ticket_border_color); ?>;
        border-bottom: 1px solid <?php echo e($event->ticket_border_color); ?>;

    }
</style>
<div class="ticket">
    <div class="logo">
        <?php echo Html::image(asset($image_path)); ?>

    </div>

    <div class="layout_even">
        <div class="event_details">
            <h4><?php echo app('translator')->get("Ticket.event"); ?></h4>
            <?php echo app('translator')->get("Ticket.demo_event"); ?>
            <h4><?php echo app('translator')->get("Ticket.organiser"); ?></h4>
            <?php echo app('translator')->get("Ticket.demo_organiser"); ?>
            <h4><?php echo app('translator')->get("Ticket.venue"); ?></h4>
            <?php echo app('translator')->get("Ticket.demo_venue"); ?>
            <h4><?php echo app('translator')->get("Ticket.start_date_time"); ?></h4>
            <?php echo app('translator')->get("Ticket.demo_start_date_time"); ?>
            <h4><?php echo app('translator')->get("Ticket.end_date_time"); ?></h4>
            <?php echo app('translator')->get("Ticket.demo_end_date_time"); ?>
        </div>

        <div class="attendee_details">
            <h4><?php echo app('translator')->get("Ticket.name"); ?></h4>
            <?php echo app('translator')->get("Ticket.demo_name"); ?>
            <h4><?php echo app('translator')->get("Ticket.ticket_type"); ?></h4>
            <?php echo app('translator')->get("Ticket.demo_ticket_type"); ?>
            <h4><?php echo app('translator')->get("Ticket.order_ref"); ?></h4>
            <?php echo app('translator')->get("Ticket.demo_order_ref"); ?>
            <h4><?php echo app('translator')->get("Ticket.attendee_ref"); ?></h4>
            <?php echo app('translator')->get("Ticket.demo_attendee_ref"); ?>
            <h4><?php echo app('translator')->get("Ticket.price"); ?></h4>
            <?php echo app('translator')->get("Ticket.demo_price"); ?>
        </div>
    </div>

    <div class="barcode">
		<?php $data='ICA : '.$event->id .' / ' .$event->title; ?>
        
        <?php echo DNS2D::getBarcodeSVG($data ,"QRCODE", 5, 5); ?>    
    </div>
    <?php if($event->is_1d_barcode_enabled): ?>
        <div class="barcode_vertical">
            <?php echo DNS1D::getBarcodeSVG(12211221, "C39+", 1, 50); ?>

        </div>
    <?php endif; ?>
    <div class="foot">
        <?php echo app('translator')->get("Ticket.footer"); ?>
    </div>
</div>
<?php /**PATH C:\wamp64\www\laravel\ica-backoffice\resources\views/ManageEvent/Partials/TicketDesignPreview.blade.php ENDPATH**/ ?>