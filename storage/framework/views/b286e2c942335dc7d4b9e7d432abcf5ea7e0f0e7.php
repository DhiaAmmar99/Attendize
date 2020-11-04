<!DOCTYPE html>
<html lang="<?php echo e(Lang::locale()); ?>">
<head>
    <!--
              _   _                 _ _
         /\  | | | |               | (_)
        /  \ | |_| |_ ___ _ __   __| |_ _______   ___ ___  _ __ ___
       / /\ \| __| __/ _ \ '_ \ / _` | |_  / _ \ / __/ _ \| '_ ` _ \
      / ____ \ |_| ||  __/ | | | (_| | |/ /  __/| (_| (_) | | | | | |
     /_/    \_\__|\__\___|_| |_|\__,_|_/___\___(_)___\___/|_| |_| |_|

    -->
    <title>
        <?php $__env->startSection('title'); ?>
            
        <?php echo $__env->yieldSection(); ?>
    </title>

    <?php echo $__env->make('Shared.Layouts.ViewJavascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!--Meta-->
    <?php echo $__env->make('Shared.Partials.GlobalMeta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <!--/Meta-->

    <!--JS-->
    <?php echo Html::script(config('attendize.cdn_url_static_assets').'/vendor/jquery/dist/jquery.min.js'); ?>

    <!--/JS-->

    <!--Style-->
    <?php echo Html::style(config('attendize.cdn_url_static_assets').'/assets/stylesheet/application.css'); ?>

    <!--/Style-->

<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>


<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css">

<script lang="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.4/xlsx.full.min.js"></script>
<script src="https://cdn.jsdelivr.net/g/filesaver.js"></script>

    <?php echo $__env->yieldContent('head'); ?>
</head>
<body class="attendize">
<?php echo $__env->yieldContent('pre_header'); ?>
<header id="header" class="navbar">

    <div class="navbar-header">
        <a class="navbar-brand" href="javascript:void(0);">
            <img style="width: 40px !important;" class="logo" alt="Attendize" src="<?php echo e(asset('assets/images/Light-Logo.png')); ?>"/>
        </a>
    </div>

    <div class="navbar-toolbar clearfix">
        <?php echo $__env->yieldContent('top_nav'); ?>

        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown profile">

                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="meta">
                        
                        <span class="arrow"></span>
                    </span>
                </a>


                <ul class="dropdown-menu" role="menu">
                    

                    
                    <li><a href="<?php echo e(route('logout')); ?>"><span class="icon ico-exit"></span><?php echo app('translator')->get("Top.sign_out"); ?></a></li>
                </ul>
            </li>
        </ul>
    </div>
</header>

<?php echo $__env->yieldContent('menu'); ?>

<!--Main Content-->
<section id="main" role="main">
    <div class="container-fluid">
        <div class="page-title">
            <h1 class="title"><?php echo $__env->yieldContent('page_title'); ?></h1>
        </div>
        <?php if(array_key_exists('page_header', View::getSections())): ?>
        <!--  header -->
        <div class="page-header page-header-block row">
            <div class="row">
                <?php echo $__env->yieldContent('page_header'); ?>
            </div>
        </div>
        <!--/  header -->
        <?php endif; ?>

        <!--Content-->
        <?php echo $__env->yieldContent('content'); ?>
        <!--/Content-->
    </div>

    <!--To The Top-->
    <a href="#" style="display:none;" class="totop"><i class="ico-angle-up"></i></a>
    <!--/To The Top-->

</section>
<!--/Main Content-->

<!--JS-->
<?php echo $__env->make("Shared.Partials.LangScript", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo Html::script('assets/javascript/backend.js'); ?>

<script>
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
    });

    <?php if(!Auth::user()->first_name): ?>
      setTimeout(function () {
        $('.editUserModal').click();
    }, 1000);
    <?php endif; ?>

</script>
<!--/JS-->
<?php echo $__env->yieldContent('foot'); ?>

<?php echo $__env->make('Shared.Partials.GlobalFooterJS', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>
</html>
<?php /**PATH C:\wamp64\www\laravel\ica-backoffice\resources\views/Shared/Layouts/Master.blade.php ENDPATH**/ ?>