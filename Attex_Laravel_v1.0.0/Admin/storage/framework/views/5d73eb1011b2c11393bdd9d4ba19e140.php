<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('layouts.shared/title-meta', ['title' => $page_title], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('css'); ?>
    <?php echo $__env->make('layouts.shared/head-css', ['mode' => $mode ?? '', 'demo' => $demo ?? ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo app('Illuminate\Foundation\Vite')(['resources/js/head.js']); ?>
</head>

<body>
    <div class="wrapper">

        <?php echo $__env->make('layouts.shared/topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('layouts.shared/left-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                <!-- Start Content-->
                <?php echo $__env->yieldContent('content'); ?>
            </div>
            <?php echo $__env->make('layouts.shared/footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>

    <?php echo $__env->make('layouts.shared/right-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('layouts.shared/footer-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/js/app.js', 'resources/js/layout.js']); ?>
    <?php echo $__env->yieldContent('script'); ?>

</body>

</html>
<?php /**PATH /home/denish/Desktop/Workspace/Internal/dk/attexlaravel/resources/views/layouts/vertical.blade.php ENDPATH**/ ?>