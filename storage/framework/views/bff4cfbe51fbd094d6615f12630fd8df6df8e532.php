<!DOCTYPE html>
<html lang="en">
    <head>
        <!--
                  _   _                 _ _
             /\  | | | |               | (_)
            /  \ | |_| |_ ___ _ __   __| |_ _______   ___ ___  _ __ ___
           / /\ \| __| __/ _ \ '_ \ / _` | |_  / _ \ / __/ _ \| '_ ` _ \
          / ____ \ |_| ||  __/ | | | (_| | |/ /  __/| (_| (_) | | | | | |
         /_/    \_\__|\__\___|_| |_|\__,_|_/___\___(_)___\___/|_| |_| |_|

        -->
        <title><?php echo e($event->title); ?> - Attendize.com</title>


        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0" />
        <link rel="canonical" href="<?php echo e($event->event_url); ?>" />


        <!-- Open Graph data -->
        <meta property="og:title" content="<?php echo e($event->title); ?>" />
        <meta property="og:type" content="article" />
        <meta property="og:url" content="<?php echo e($event->event_url); ?>?utm_source=fb" />
        <?php if($event->images->count()): ?>
        <meta property="og:image" content="<?php echo e(config('attendize.cdn_url_user_assets').'/'.$event->images->first()['image_path']); ?>" />
        <?php endif; ?>
        <meta property="og:description" content="<?php echo e(Str::words(strip_tags(Markdown::convertToHtml($event->description))), 20); ?>" />
        <meta property="og:site_name" content="Attendize.com" />
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <?php echo $__env->yieldContent('head'); ?>

       <?php echo Html::style(config('attendize.cdn_url_static_assets').'/assets/stylesheet/frontend.css'); ?>


        <!--Bootstrap placeholder fix-->
        <style>
            ::-webkit-input-placeholder { /* WebKit browsers */
                color:    #ccc !important;
            }
            :-moz-placeholder { /* Mozilla Firefox 4 to 18 */
                color:    #ccc !important;
                opacity:  1;
            }
            ::-moz-placeholder { /* Mozilla Firefox 19+ */
                color:    #ccc !important;
                opacity:  1;
            }
            :-ms-input-placeholder { /* Internet Explorer 10+ */
                color:    #ccc !important;
            }

            input, select {
                color: #999 !important;
            }

            .btn {
                color: #fff !important;
            }

        </style>
        <?php if($event->bg_type == 'color' || Request::input('bg_color_preview')): ?>
            <style>body {background-color: <?php echo e((Request::input('bg_color_preview') ? '#'.Request::input('bg_color_preview') : $event->bg_color)); ?> !important; }</style>
        <?php endif; ?>

        <?php if(($event->bg_type == 'image' || $event->bg_type == 'custom_image' || Request::input('bg_img_preview')) && !Request::input('bg_color_preview')): ?>
            <style>
                body {
                    background: url(<?php echo e((Request::input('bg_img_preview') ? URL::to(Request::input('bg_img_preview')) :  asset(config('attendize.cdn_url_static_assets').'/'.$event->bg_image_path))); ?>) no-repeat center center fixed;
                    background-size: cover;
                }
            </style>
        <?php endif; ?>

    </head>
    <body class="attendize">
        <div id="event_page_wrap" vocab="http://schema.org/" typeof="Event">
            <?php echo $__env->yieldContent('content'); ?>

            
            <?php echo $__env->yieldPushContent('footer'); ?>
        </div>

        
        <?php echo $__env->yieldContent('footer'); ?>

        <a href="#intro" style="display:none;" class="totop"><i class="ico-angle-up"></i>
            <span style="font-size:11px;"><?php echo app('translator')->get("basic.TOP"); ?></span></a>

        <?php echo $__env->make("Shared.Partials.LangScript", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo Html::script(config('attendize.cdn_url_static_assets').'/assets/javascript/frontend.js'); ?>



        <?php if(isset($secondsToExpire)): ?>
        <script>if($('#countdown')) {setCountdown($('#countdown'), <?php echo e($secondsToExpire); ?>);}</script>
        <?php endif; ?>

        <?php echo $__env->make('Shared.Partials.GlobalFooterJS', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </body>
</html>
<?php /**PATH C:\wamp64\www\laravel\ica-backoffice\resources\views/Public/ViewEvent/Layouts/EventPage.blade.php ENDPATH**/ ?>